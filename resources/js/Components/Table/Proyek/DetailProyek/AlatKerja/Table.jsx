import { columns } from "./Column.jsx";
import { DataTable } from "./DataTable.jsx";
import {useEffect, useState} from "react";
export default function Table({data,project,role}) {

    return (

            <DataTable columns={columns} data={data} project={project} role={role}/>
    );
}
