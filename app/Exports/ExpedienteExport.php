<?php

namespace App\Exports;

use App\Models\Expediente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
//use Maatwebsite\Excel\Concerns\ShouldAutoSize;//pone tamaño automatico
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;//para el logo

class ExpedienteExport implements FromCollection, WithCustomStartCell, Responsable, WithMapping, WithColumnFormatting, WithHeadings, WithColumnWidths, WithDrawings //ShouldAutoSize
{
    use Exportable;
    private $filters;
    private $fileName = 'invoices.xlsx';
    private $writerType = Excel::XLSX;


    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        //return Expediente::all();
        return Expediente::filter($this->filters)->get();
    }

    public function startCell(): string
    {
        return 'A10';
    }

    public function map($expediente): array
    {
        return [
            $expediente->awkicliente_id,
            $expediente->awkicliente->nombres,
            $expediente->awkitienda->name,
            $expediente->tipodedocumento->nombre,
            $expediente->numdocumento,
            $expediente->fechaventa,
            //Date::dateTimeToExcel($expediente->fechaventa),
            Date::dateTimeToExcel($expediente->created_at),
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F'=>'dd/mm/yyyy',
            'G'=>'dd/mm/yyyy',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombres',
            'Tienda',
            'Documento',
            'Numero',
            'Fecha venta',
            'Fecha Creación',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 30,
            'D' => 10,
            'E' => 10,
            'F' => 25,
            'G' => 25,
        ];
    }

    public function drawings()
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName("Awki");
        $drawing->setDescription("Awki");
        $drawing->setPath(public_path('images/logo/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

}
