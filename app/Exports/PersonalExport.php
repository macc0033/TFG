<?php

namespace App\Exports;

use App\Models\Personal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonalExport implements FromCollection //, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Personal::all();
    }

    //Añadir cabecera
    /* public function headings(): array
    {
        return [
            'nombre',
            'apellidos',
        ];
    }

    //seleccionar que columnas exportar
    public function map($personal): array 
    {
        return [
            $personal->nombre,
            $personal->apellidos,
            //Date::dateTimeToExcel($personal->created_at),
        ];
    }*/
}
