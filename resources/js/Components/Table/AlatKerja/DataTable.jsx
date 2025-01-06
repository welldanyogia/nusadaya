"use client";

import {
    flexRender,
    getCoreRowModel,
    getFacetedRowModel,
    getFacetedUniqueValues,
    getFilteredRowModel,
    getPaginationRowModel,
    getSortedRowModel,
    useReactTable,
} from "@tanstack/react-table";

import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/Components/ui/table";
import {Button} from "@/Components/ui/button.jsx";
import {DataTablePagination} from "@/Components/Table/DataTablePagination.jsx";
import {Card, CardContent, CardFooter, CardHeader} from "@/Components/ui/card.jsx";
import {DataTableViewOptions} from "@/Components/Table/DataTableViewOption.jsx";
import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue} from "@/Components/ui/select.jsx";
import {useEffect, useState} from "react";
import {Input} from "@/Components/ui/input.jsx";
import {DataTableFacetedFilter} from "@/Components/Table/DataTableFacetedFilter.jsx";
import {getData} from "./Data.js"
import {TambahProyekDialog} from "@/Components/Table/Proyek/TambahProyekDialog.jsx";
import {TambahAlatKerjaDialog} from "@/Components/Table/AlatKerja/TambahAlatKerjaDialog.jsx";
import {DataTableToolbar} from "@/Components/Table/AlatKerja/DataTableToolbar.jsx";
import {EditAlatKerjaDialog} from "@/Components/Table/AlatKerja/EditAlatKerjaDialog.jsx";
import {DeleteAlatKerjaDialog} from "@/Components/Table/AlatKerja/DeleteAlatKerjaDialog.jsx";
import {router} from "@inertiajs/react";
import * as XLSX from "xlsx";
import jsPDF from "jspdf";
import autoTable from "jspdf-autotable";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger
} from "@/Components/ui/dropdown-menu.jsx";

export function DataTable({columns, data, projects, role}) {
    const [rowSelection, setRowSelection] = useState({})
    const [columnVisibility, setColumnVisibility] = useState({})
    const [columnFilters, setColumnFilters] = useState([])
    const [sorting, setSorting] = useState([])

    const table = useReactTable({
        data,
        columns,
        state: {
            sorting,
            columnVisibility,
            rowSelection,
            columnFilters,
        },
        enableRowSelection: true,
        onRowSelectionChange: setRowSelection,
        onSortingChange: setSorting,
        onColumnFiltersChange: setColumnFilters,
        onColumnVisibilityChange: setColumnVisibility,
        getCoreRowModel: getCoreRowModel(),
        getFilteredRowModel: getFilteredRowModel(),
        getPaginationRowModel: getPaginationRowModel(),
        getSortedRowModel: getSortedRowModel(),
        getFacetedRowModel: getFacetedRowModel(),
        getFacetedUniqueValues: getFacetedUniqueValues(),
    })

    const downloadCSV = (data) => {
        const csvRows = [];
        // Get headers
        const headers = Object.keys(data[0]);
        csvRows.push(headers.join(','));

        // Format each row
        for (const row of data) {
            const values = headers.map(header => {
                const escaped = ('' + row[header]).replace(/"/g, '\\"');
                return `"${escaped}"`;
            });
            csvRows.push(values.join(','));
        }
        const currentDate = new Date().toLocaleDateString('id-ID').replace(/\//g, '-');

        // Create a Blob and download it
        const blob = new Blob([csvRows.join('\n')], {type: 'text/csv;charset=utf-8;'});
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.setAttribute('href', url);
        a.setAttribute('download', `Data Alat Kerja PT PLN Nusa Daya Maluku - ${currentDate}.csv`);
        a.click();
    };

    const downloadExcel = (data) => {

        const dataArray = Object.values(data);

        if (!Array.isArray(dataArray)) {
            console.error('Error: dataArray is not an array!');
            return;
        }

        // Tentukan urutan kolom yang diinginkan
        const columnOrder = [
            'Nama Alat',
            'Proyek',
            'Tanggal Kontrak',
            'Tanggal Akhir Kontrak',
            'Masa Pakai (Bulan)',
            'Masa Pakai Saat ini (Bulan)',
            'Sisa Masa Pakai (Bulan)',
            'Keterangan',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];

        const mappings = {
            nama_alat: "Nama Alat",
            project: "Proyek",
            tgl_kontrak: "Tanggal Kontrak",
            tgl_akhir_kontrak: "Tanggal Akhir Kontrak",
            masa_pakai: "Masa Pakai (Bulan)",
            masa_pakai_saat_ini: "Masa Pakai Saat ini (Bulan)",
            sisa_masa_pakai: "Sisa Masa Pakai (Bulan)",
            keterangan: "Keterangan",
            created_at: "Dibuat Pada",
            updated_at: "Diperbarui Pada",
            category_name: "Kategori",
        };

        const transformedData = dataArray.map(item => {
            const result = {};
            for (const key in item) {
                if (mappings[key]) {
                    result[mappings[key]] = item[key];
                }
            }
            if (item.project && item.project.nama_pekerjaan) {
                result["Proyek"] = item.project.nama_pekerjaan;
            }
            return result;
        });

        // Reorder the data based on the columnOrder
        const reorderedData = transformedData.map(item => {
            const reorderedItem = {};
            columnOrder.forEach(col => {
                const key = Object.keys(mappings).find(k => mappings[k] === col);
                if (key) {
                    reorderedItem[col] = item[mappings[key]];
                }
            });
            return reorderedItem;
        });

        // Membuat worksheet
        const worksheet = XLSX.utils.json_to_sheet(reorderedData);

        // Menambahkan styling pada header
        const headerRange = XLSX.utils.decode_range(worksheet['!ref']);
        for (let C = headerRange.s.c; C <= headerRange.e.c; ++C) {
            const cellAddress = XLSX.utils.encode_cell({ r: 0, c: C });
            const cell = worksheet[cellAddress];
            if (cell) {
                cell.s = {
                    font: { bold: true, color: { rgb: "FFFFFF" }, sz: 12 },
                    fill: { fgColor: { rgb: "4F81BD" } }, // Background color
                    alignment: { horizontal: "center", vertical: "center" },
                };
            }
        }

        // Menentukan lebar kolom
        worksheet['!cols'] = columnOrder.map(() => ({ wch: 20 }));

        // Membuat workbook
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Data');

        // Menentukan nama file
        const currentDate = new Date().toLocaleDateString('id-ID').replace(/\//g, '-');
        const fileName = `Data Alat Kerja PT PLN Nusa Daya Maluku - ${currentDate}.xlsx`;

        // Mengunduh file Excel
        XLSX.writeFile(workbook, fileName);
    };


    const generatePDF = (data) => {
        // console.log(data); // Memeriksa data yang diterima
        const doc = new jsPDF({orientation: "landscape"});

        const columns = [
            {header: 'No', dataKey: 'no'},
            {header: 'Nama Alat', dataKey: 'nama_alat'},
            {header: 'Proyek', dataKey: 'project'},
            {header: 'Tanggal Kontrak', dataKey: 'tgl_kontrak'},
            {header: 'Tanggal Akhir Kontrak', dataKey: 'tgl_akhir_kontrak'},
            {header: 'Masa Pakai (Bulan)', dataKey: 'masa_pakai'},
            {header: 'Masa Pakai Saat ini (Bulan)', dataKey: 'masa_pakai_saat_ini'},
            {header: 'Keterangan', dataKey: 'keterangan'},
        ];

        const formatRupiah = (value) => {
            return `Rp ${parseInt(value, 10).toLocaleString('id-ID')}`;
        };

        const tableData = data.map((item, index) => ([
            index + 1,
            item.nama_alat || "-",
            item.project?.nama_pekerjaan || "-", // Menggunakan label dari category
            item.tgl_kontrak || "-",
            item.tgl_akhir_kontrak ? item.tgl_akhir_kontrak : "-",
            item.masa_pakai || 0,
            item.masa_pakai_saat_ini || 0,
            item.sisa_masa_pakai || 0,
            item.keterangan || "-",
        ]));

        // console.log(tableData); // Memeriksa tableData yang akan ditampilkan

        autoTable(doc, {
            head: [columns.map(col => col.header)],
            body: tableData,
            theme: 'grid',
        });

        // Mendapatkan tanggal saat ini dalam format dd-mm-yyyy
        const currentDate = new Date().toLocaleDateString('id-ID').replace(/\//g, '-');

        // Menyimpan dokumen dengan nama yang diinginkan
        doc.save(`Data Alat Kerja PT PLN Nusa Daya Maluku - ${currentDate}.pdf`);
    };

    return (
        <div className="rounded-md">
            <Card className={"rounded-xl"}>
                <CardHeader className={""}>
                    <div className={"grid grid-cols-2 "}>
                        <div>
                            <div className="flex items-center py-4 gap-2 max-sm:grid">
                                <Input
                                    placeholder="Cari Alat..."
                                    value={(table.getColumn("nama_alat")?.getFilterValue() ?? "")}
                                    onChange={(event) =>
                                        table.getColumn("nama_alat")?.setFilterValue(event.target.value)
                                    }
                                    className="max-w-sm"
                                />
                                <DataTableToolbar table={table} projects={projects}/>
                            </div>
                        </div>

                        <DataTableViewOptions table={table}/>
                    </div>
                </CardHeader>
                <CardContent className={"rounded-xl"}>
                    <div className={"flex justify-between max-sm:grid"}>
                        <div className="flex items-center space-x-2 mb-3 w-fit">
                            <p className="text-sm font-medium">Rows per page</p>
                            <Select
                                value={`${table.getState().pagination.pageSize}`}
                                onValueChange={(value) => {
                                    table.setPageSize(Number(value));
                                }}
                            >
                                <SelectTrigger className="h-8 w-[70px]">
                                    <SelectValue placeholder={table.getState().pagination.pageSize}/>
                                </SelectTrigger>
                                <SelectContent side="top">
                                    {[10, 20, 30, 40, 50].map((pageSize) => (
                                        <SelectItem key={pageSize} value={`${pageSize}`}>
                                            {pageSize}
                                        </SelectItem>
                                    ))}
                                </SelectContent>
                            </Select>
                        </div>
                        <div className="flex items-center space-x-2 mb-3 w-fit">
                            {
                                role !== 'user' && (
                                    <TambahAlatKerjaDialog projects={projects}/>
                                )
                            }
                            <DropdownMenu>
                                <DropdownMenuTrigger asChild>
                                    <Button variant="outline">Download Data</Button>
                                </DropdownMenuTrigger>
                                <DropdownMenuContent className="w-fit grid gap-2">
                                    <DropdownMenuLabel>Format File</DropdownMenuLabel>
                                    <DropdownMenuSeparator/>
                                    <Button variant={"outline"} onClick={() => downloadCSV(data)}>CSV</Button>
                                    <Button variant={"outline"}
                                            onClick={() => downloadExcel(data)}>Excel</Button>
                                    <Button variant={"outline"} onClick={() => generatePDF(data)}>PDF</Button>
                                </DropdownMenuContent>
                            </DropdownMenu>
                        </div>
                    </div>
                    <Table className={"rounded-xl"}>
                        <TableHeader className={"bg-fountain-blue-300"}>
                            {table.getHeaderGroups().map((headerGroup) => (
                                <TableRow key={headerGroup.id}>
                                    {headerGroup.headers.map((header) => {
                                        return (
                                            <TableHead
                                                key={header.id}
                                                className="text-white"
                                            >
                                                {header.isPlaceholder
                                                    ? null
                                                    : flexRender(
                                                        header.column.columnDef.header,
                                                        header.getContext()
                                                    )}
                                            </TableHead>
                                        );
                                    })}
                                    {
                                        role !== 'user' && (
                                            <TableHead
                                                className="sticky sm:right-0 bg-fountain-blue-300 text-white text-center"
                                                style={{zIndex: 1}}
                                            >
                                                Aksi
                                            </TableHead>
                                        )
                                    }
                                </TableRow>
                            ))}
                        </TableHeader>
                        <TableBody>
                            {table.getRowModel().rows?.length ? (
                                table.getRowModel().rows.map((row) => {
                                    // Ambil nilai keterangan dari baris saat ini (misalnya, dari kolom "keterangan")
                                    const keterangan = row.getValue('keterangan');

                                    // Tentukan warna hover berdasarkan nilai keterangan
                                    const hoverColor = (keterangan) => {
                                        switch (keterangan?.toLowerCase()) {
                                            case 'normal':
                                                return 'hover:bg-green-200';
                                            case 'kritis':
                                                return 'hover:bg-orange-200';
                                            case 'kronis':
                                                return 'hover:bg-red-200';
                                            default:
                                                return 'hover:bg-gray-200'; // Default color
                                        }
                                    };

                                    return (
                                        <TableRow
                                            key={row.id}
                                            data-state={row.getIsSelected() && "selected"}
                                            onClick={() => {
                                                router.get(`/admin/monitoring/alat-kerja/${row.original.id}`)
                                            }}
                                            className={`${hoverColor(keterangan)}`} // Apply hover color dynamically
                                        >
                                            {row.getVisibleCells().map((cell) => (
                                                <TableCell key={cell.id}>
                                                    {flexRender(cell.column.columnDef.cell, cell.getContext())}
                                                </TableCell>
                                            ))}
                                            {/* Kolom terakhir dengan posisi sticky */}
                                            {
                                                role !== 'user' && (
                                                    <TableCell
                                                        className="sticky sm:right-0 bg-white flex gap-2"
                                                        style={{zIndex: 1}}
                                                        onClick={(e) => e.stopPropagation()}
                                                    >
                                                        <EditAlatKerjaDialog data={row.original} projects={projects}/>
                                                        <DeleteAlatKerjaDialog data={row}/>
                                                    </TableCell>
                                                )
                                            }
                                        </TableRow>
                                    );
                                })
                            ) : (
                                <TableRow>
                                    <TableCell colSpan={columns.length} className="h-24 text-center">
                                        No results.
                                    </TableCell>
                                </TableRow>
                            )}
                        </TableBody>

                    </Table>
                </CardContent>
                <CardFooter>
                    <DataTablePagination table={table}/>
                </CardFooter>
            </Card>
            {/*<div className="flex items-center justify-end space-x-2 py-4">*/}
            {/*    <Button*/}
            {/*        variant="outline"*/}
            {/*        size="sm"*/}
            {/*        onClick={() => table.previousPage()}*/}
            {/*        disabled={!table.getCanPreviousPage()}*/}
            {/*    >*/}
            {/*        Previous*/}
            {/*    </Button>*/}
            {/*    <Button*/}
            {/*        variant="outline"*/}
            {/*        size="sm"*/}
            {/*        onClick={() => table.nextPage()}*/}
            {/*        disabled={!table.getCanNextPage()}*/}
            {/*    >*/}
            {/*        Next*/}
            {/*    </Button>*/}
            {/*</div>*/}
        </div>
    )
        ;
}
