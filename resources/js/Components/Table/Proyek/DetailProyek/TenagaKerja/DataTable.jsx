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
import {DataTableToolbar} from "@/Components/Table/DataTableToolbar.jsx";
import {TambahProyekDialog} from "@/Components/Table/Proyek/TambahProyekDialog.jsx";
import {TambahAlatKerjaDialog} from "@/Components/Table/AlatKerja/TambahAlatKerjaDialog.jsx";
import {TambahTenagaKerjaDialog} from "@/Components/Table/TenagaKerja/TambahTenagaKerjaDialog.jsx";
import {router} from "@inertiajs/react";
import {EditProyekDialog} from "@/Components/Table/Proyek/EditProyekDialog.jsx";
import {DeleteProyekDialog} from "@/Components/Table/Proyek/DeleteProyekDialog.jsx";
import {EditTenagaKerjaDialog} from "@/Components/Table/TenagaKerja/EditTenagaKerjaDialog.jsx";
import {DeleteTenagaKerjaDialog} from "@/Components/Table/TenagaKerja/DeleteTenagaKerjaDialog.jsx";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger
} from "@/Components/ui/dropdown-menu.jsx";
import * as XLSX from "xlsx";
import jsPDF from "jspdf";
import autoTable from "jspdf-autotable";

export function DataTable({columns, data,project, projects, role}) {
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
        a.setAttribute('download', `Data Tenaga Kerja Proyek ${project.nama_pekerjaan} PLN Nusa Daya Maluku - ${currentDate}.csv`);
        a.click();
    };

    const downloadExcel = (data) => {

        const dataArray = Array.isArray(data) ? data : [data];

        if (!Array.isArray(dataArray)) {
            console.error('Error: dataArray is not an array!');
            return;
        }

        // Tentukan urutan kolom yang diinginkan
        const columnOrder = [
            // 'ID',
            // 'Project ID',
            'Nama',
            'Unit PLN',
            'Penempatan',
            'No SPK',
            'NIP',
            'Jabatan',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Usia',
            'Sisa Masa Pensiun',
            'Kelompok',
            'Region',
            'Cabang',
            'Kategori',
            'Status',
            'Tanggal Masuk',
            'Tanggal Mulai Bekerja',
            'Tanggal Berhenti',
            'No Kontrak',
            'Tanggal Awal Kontrak',
            'Tanggal Akhir Kontrak',
            'Jenis Kelamin',
            'Pendidikan',
            'Agama',
            'Golongan Darah',
            'Status Kawin',
            'Telepon',
            'Email',
            'Alamat KTP',
            'Alamat Domisili',
            'No KTP',
            'No KK',
            'NPWP',
            'No BPJS Kesehatan',
            'VA BPJS Kesehatan',
            'Status BPJS Kesehatan',
            'Keterangan BPJS Kesehatan',
            'No BPJS TK',
            'VA BPJS TK',
            'Status BPJS TK',
            'Keterangan BPJS TK',
            'Wajib Sertifikasi',
            'Jurusan',
            'Arsip Kontrak',
            'Dibuat Pada',
            'Diperbarui Pada',
        ];

        const mappings = {
            // id: "ID",
            // project_id: "Project ID",
            nama: "Nama",
            unit_pln: "Unit PLN",
            penempatan: "Penempatan",
            no_spk: "No SPK",
            nip: "NIP",
            jabatan: "Jabatan",
            tempat_lahir: "Tempat Lahir",
            tanggal_lahir: "Tanggal Lahir",
            usia: "Usia",
            sisa_masa_pensiun: "Sisa Masa Pensiun",
            kelompok: "Kelompok",
            region: "Region",
            cabang: "Cabang",
            kategori: "Kategori",
            status: "Status",
            tgl_masuk: "Tanggal Masuk",
            tgl_mulai_bekerja: "Tanggal Mulai Bekerja",
            tgl_berhenti: "Tanggal Berhenti",
            no_kontrak: "No Kontrak",
            tgl_awal_kontrak: "Tanggal Awal Kontrak",
            tgl_akhir_kontrak: "Tanggal Akhir Kontrak",
            jenis_kelamin: "Jenis Kelamin",
            pendidikan: "Pendidikan",
            agama: "Agama",
            gol_darah: "Golongan Darah",
            status_kawin: "Status Kawin",
            telepon: "Telepon",
            email: "Email",
            alamat_ktp: "Alamat KTP",
            alamat_domisili: "Alamat Domisili",
            no_ktp: "No KTP",
            no_kk: "No KK",
            npwp: "NPWP",
            no_bpjs_kes: "No BPJS Kesehatan",
            va_bpjs_kes: "VA BPJS Kesehatan",
            status_bpjs_kes: "Status BPJS Kesehatan",
            ket_bpjs_kes: "Keterangan BPJS Kesehatan",
            no_bpjs_tk: "No BPJS TK",
            va_bpjs_tk: "VA BPJS TK",
            status_bpjs_tk: "Status BPJS TK",
            ket_bpjs_tk: "Keterangan BPJS TK",
            wajib_sertifikasi: "Wajib Sertifikasi",
            jurusan: "Jurusan",
            arsip_kontrak: "Arsip Kontrak",
            created_at: "Dibuat Pada",
            updated_at: "Diperbarui Pada",
        };

        const transformedData = dataArray.map(item => {
            const result = {};

            for (const key in item) {
                if (mappings[key]) {
                    if (key === 'sisa_masa_pensiun') {
                        const totalMonths = item[key];
                        const years = Math.floor(totalMonths / 12);
                        const months = totalMonths % 12;
                        result[mappings[key]] = `${years} tahun ${months} bulan`;
                    } else {
                        result[mappings[key]] = item[key];
                    }
                }
            }
            return result;
        });
        // Reorder the data based on the columnOrder
        const reorderedData = transformedData.map(item => {
            const reorderedItem = {};
            columnOrder.forEach(col => {
                if (item[col] !== undefined) {
                    reorderedItem[col] = item[col];
                } else {
                    reorderedItem[col] = ''; // Empty if no value
                }
            });
            return reorderedItem;
        });

        // Membuat worksheet
        const worksheet = XLSX.utils.json_to_sheet(reorderedData);

        // Menentukan lebar kolom
        worksheet['!cols'] = columnOrder.map(() => ({ wch: 25 }));

        // Membuat workbook
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Data');

        // Menentukan nama file
        const currentDate = new Date().toLocaleDateString('id-ID').replace(/\//g, '-');
        const fileName = project && project.nama_pekerjaan
            ? `Data Tenaga Kerja Proyek ${project.nama_pekerjaan} PLN Nusa Daya Maluku - ${currentDate}.xlsx`
            : `Data Tenaga Kerja PT PLN Nusa Daya Maluku - ${currentDate}.xlsx`;


        // Mengunduh file Excel
        XLSX.writeFile(workbook, fileName);
    };




    const generatePDF = (data) => {
        // console.log(data); // Memeriksa data yang diterima
        const doc = new jsPDF({orientation: "landscape"});

        const columns = [
            { header: 'ID', dataKey: 'id' },
            { header: 'Project ID', dataKey: 'project_id' },
            { header: 'Unit PLN', dataKey: 'unit_pln' },
            { header: 'Penempatan', dataKey: 'penempatan' },
            { header: 'No SPK', dataKey: 'no_spk' },
            { header: 'NIP', dataKey: 'nip' },
            { header: 'Nama', dataKey: 'nama' },
            { header: 'Jabatan', dataKey: 'jabatan' },
            { header: 'Tempat Lahir', dataKey: 'tempat_lahir' },
            { header: 'Tanggal Lahir', dataKey: 'tanggal_lahir' },
            { header: 'Usia', dataKey: 'usia' },
            { header: 'Sisa Masa Pensiun', dataKey: 'sisa_masa_pensiun' },
            { header: 'Kelompok', dataKey: 'kelompok' },
            { header: 'Region', dataKey: 'region' },
            { header: 'Cabang', dataKey: 'cabang' },
            { header: 'Kategori', dataKey: 'kategori' },
            { header: 'Status', dataKey: 'status' },
            { header: 'Tgl Masuk', dataKey: 'tgl_masuk' },
            { header: 'Tgl Mulai Bekerja', dataKey: 'tgl_mulai_bekerja' },
            { header: 'No Kontrak', dataKey: 'no_kontrak' },
            { header: 'Tgl Awal Kontrak', dataKey: 'tgl_awal_kontrak' },
            { header: 'Tgl Akhir Kontrak', dataKey: 'tgl_akhir_kontrak' },
            { header: 'Jenis Kelamin', dataKey: 'jenis_kelamin' },
            { header: 'Pendidikan', dataKey: 'pendidikan' },
            { header: 'Agama', dataKey: 'agama' },
            { header: 'Gol Darah', dataKey: 'gol_darah' },
            { header: 'Status Kawin', dataKey: 'status_kawin' },
            { header: 'Telepon', dataKey: 'telepon' },
            { header: 'Email', dataKey: 'email' },
            { header: 'Alamat KTP', dataKey: 'alamat_ktp' },
            { header: 'Alamat Domisili', dataKey: 'alamat_domisili' },
            { header: 'No KTP', dataKey: 'no_ktp' },
            { header: 'No KK', dataKey: 'no_kk' },
            { header: 'NPWP', dataKey: 'npwp' },
            { header: 'No BPJS Kes', dataKey: 'no_bpjs_kes' },
            { header: 'Status BPJS Kes', dataKey: 'status_bpjs_kes' },
            { header: 'No BPJS TK', dataKey: 'no_bpjs_tk' },
            { header: 'VA BPJS TK', dataKey: 'va_bpjs_tk' },
            { header: 'Wajib Sertifikasi', dataKey: 'wajib_sertifikasi' },
            { header: 'Jurusan', dataKey: 'jurusan' },
            { header: 'Arsip Kontrak', dataKey: 'arsip_kontrak' },
        ];

        const formatRupiah = (value) => {
            return `Rp ${parseInt(value, 10).toLocaleString('id-ID')}`;
        };

        const tableData = data.map((item, index) => ([
            index + 1,
            item.nama_alat || "-",
            // item.category?.label || "-", // Menggunakan label dari category
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
        doc.save(`Data Tenaga Kerja Proyek ${project.nama_pekerjaan} PLN Nusa Daya Maluku - ${currentDate}.pdf`);
    };

    return (
        <div className="rounded-md py-8">
            <Card className={"rounded-xl"}>
                <CardHeader className={""}>
                    <div className={"grid grid-cols-2 "}>
                        <div>
                            <div className="flex items-center py-4 gap-2">
                                <Input
                                    placeholder="Cari Nama..."
                                    value={(table.getColumn("nama")?.getFilterValue() ?? "")}
                                    onChange={(event) =>
                                        table.getColumn("nama")?.setFilterValue(event.target.value)
                                    }
                                    className="max-w-sm"
                                />
                                <DataTableToolbar table={table}/>
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
                                    <TambahTenagaKerjaDialog projects={projects}/>
                                )
                            }
                            <DropdownMenu>
                                <DropdownMenuTrigger asChild>
                                    <Button variant="outline">Download Data</Button>
                                </DropdownMenuTrigger>
                                <DropdownMenuContent className="w-fit grid gap-2">
                                    <DropdownMenuLabel>Format File</DropdownMenuLabel>
                                    <DropdownMenuSeparator/>
                                    {/*<Button variant={"outline"} onClick={() => downloadCSV(data)}>CSV</Button>*/}
                                    <Button variant={"outline"}
                                            onClick={() => downloadExcel(data)}>Excel</Button>
                                    {/*<Button variant={"outline"} onClick={() => generatePDF(data)}>PDF</Button>*/}
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
                                                className="sticky sm:right-0 bg-fountain-blue-300 text-white"
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
                                    // Cek apakah dokumen ada dan log hasilnya

                                    // Pastikan data `documents` tersedia dan cek apakah panjangnya lebih dari 0
                                    const documentsAvailable = row.original.documents && row.original.documents.length > 0;

                                    return (
                                        <TableRow
                                            key={row.id}
                                            data-state={row.getIsSelected() && "selected"}
                                            onClick={() => router.get(`/admin/monitoring/tenagakerja/${row.original.id}`)}
                                            className={`${
                                                documentsAvailable ? "hover:bg-green-100" : "hover:bg-red-100"
                                            } cursor-pointer`}
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
                                                        className="sm:sticky right-0 bg-white flex gap-2"
                                                        style={{zIndex: 1}}
                                                        onClick={(e) => e.stopPropagation()}
                                                    >
                                                        <EditTenagaKerjaDialog dataTK={row.original} projects={projects}/>
                                                        <DeleteTenagaKerjaDialog data={row}/>
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
