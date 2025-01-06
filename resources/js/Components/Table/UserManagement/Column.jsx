"use client";

import { DataTableColumnHeader } from "@/Components/Table/DataTableColumnHeader.jsx";
import {Badge} from "@/Components/ui/badge.jsx";
import {
    CheckCircledIcon,
    CircleIcon,
    CrossCircledIcon,
    QuestionMarkCircledIcon,
    StopwatchIcon
} from "@radix-ui/react-icons";

export const columns = [
    {
        title: "No",
        accessorKey: "no",
        id: "no",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="No" className={"text-center justify-center"} />
        ),
        cell: ({ row }) => (
            <div className="flex justify-center">{row.index + 1}</div> // Centered content
        ),
    },
    {
        title: "Nama",
        accessorKey: "name",
        id: "name",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="Nama" className={"w-[200px]"} />
        ),
        cell: ({ getValue }) => (
            <div className="flex justify-center text-center">{getValue()}</div> // Centered content
        ),
    },
    {
        title: "Username",
        id: "username",
        accessorKey: "username",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="Username" className={"w-[200px]"} />
        ),
        cell: ({ getValue }) => (
            <div className="flex justify-center text-center">{getValue()}</div> // Centered content
        ),
    },
    {
        title: "Email",
        accessorKey: "email",
        id: "email",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="Email" className={"w-[200px]"} />
        ),
        cell: ({ getValue }) => (
            <div className="flex justify-center text-center">{getValue()}</div> // Centered content
        ),
    },
    {
        title: "Role",
        accessorKey: "role",
        id: "role",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="Role" className={"w-[200px]"} />
        ),
        cell: ({ getValue }) => (
            <div className="flex justify-center">{getValue().toUpperCase()}</div> // Centered content
        ),
        filterFn: (row, id, value) => {
            return value.includes(row.getValue(id));
        },
    },
    {
        title: "Dibuat Pada",
        accessorKey: "created_at",
        id: "created_at",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="Dibuat Pada" className={"w-[200px]"} />
        ),
        cell: ({ getValue }) => (
            <div className="flex justify-center">{getValue()}</div> // Centered content
        ),
    },
    {
        title: "Terakhir diperbarui pada",
        accessorKey: "sisa_masa_pakai",
        id: "sisa_masa_pakai",
        header: ({ column }) => (
            <DataTableColumnHeader column={column} title="Terakhir diperbarui pada" className={"w-[200px]"} />
        ),
        cell: ({ getValue }) => (
            <div className="flex justify-center">{getValue()}</div> // Centered content
        ),
    },
    // {
    //     title: "Keterangan",
    //     accessorKey: "keterangan",
    //     id: "keterangan",
    //     header: ({ column }) => (
    //         <DataTableColumnHeader column={column} title="Keterangan" className={"w-[200px]"} />
    //     ),
    //     cell: ({ getValue }) => {
    //         const status = getValue() || 'N/A';
    //
    //         // Tentukan warna Badge berdasarkan status
    //         const badgeColor = (status) => {
    //             switch (status.toLowerCase()) {
    //                 case 'normal':
    //                     return 'bg-green-500 text-white'; // Hijau
    //                 case 'kritis':
    //                     return 'bg-orange-500 text-white'; // Jingga
    //                 case 'kronis':
    //                     return 'bg-red-500 text-white'; // Merah
    //                 default:
    //                     return 'bg-gray-500 text-white'; // Default/N/A
    //             }
    //         };
    //
    //         return (
    //             <div className="flex justify-center text-center">
    //                 <Badge className={badgeColor(status)}>
    //                     {status}
    //                 </Badge>
    //             </div> // Centered content
    //         );
    //     },
    // },
];



