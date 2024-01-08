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
            $expediente->awkicliente->nombres ?? null,
            $expediente->awkitienda->name ?? null,
            $expediente->awkizona->name ?? null,
            $expediente->tipodedocumento->nombre ?? null,
            $expediente->numdocumento ?? null,
            $expediente->fechaventa ?? null,
            $expediente->fecharecepcion ?? null,
            $expediente->pagoadministrativo ?? null,
            $expediente->tipodeventa->nombre ?? null,
            //Date::dateTimeToExcel($expediente->fechaventa),
            //Date::dateTimeToExcel($expediente->created_at),
            $expediente->montodelacompra ?? null,
            $expediente->marca->nombre ?? null,
            $expediente->modello->nombre ?? null,
            $expediente->chasis ?? null,
            $expediente->motor ?? null,

            $expediente->color->nombre ?? null,
            $expediente->anio->nombre ?? null,
            $expediente->categoria->nombre ?? null,

            $expediente->dua ?? null,
            $expediente->item ?? null,
            $expediente->certificado ?? null,


            $expediente->oficinaregistral->nombre ?? null,
            $expediente->fechaingreso ?? null,
            $expediente->titulo ?? null,
            $expediente->codigodeverificacion ?? null,
            $expediente->recibo ?? null,
            $expediente->importe ?? null,

            $expediente->statussunarp->nombre ?? null,
            $expediente->tarjetadepropiedad ?? null,
            $expediente->cargoenvio ?? null,

            $expediente->numerodeplaca ?? null,
            $expediente->fechadeenvio ?? null,
            $expediente->guiaderemision ?? null,
            $expediente->statusfinal ?? null,
            $expediente->fechaderevision ?? null,
            $expediente->confirmaciondeplaca ?? null,
            $expediente->placa ?? null,
            $expediente->codigoplaca ?? null,
            $expediente->monto ?? null,
            $expediente->fechadepago ?? null,
            $expediente->facturaapp ?? null,

            $expediente->confirmaciondeenvio ?? null,
            $expediente->confirmaciondecobro ?? null,
            $expediente->confirmarfindetramite ?? null,
            $expediente->factura ?? null,
            $expediente->fechadefacturacion ?? null,

            $expediente->statusfinal->nombre ?? null,







            $expediente->observacion ?? null,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G'=>'dd/mm/yyyy',
            'H'=>'dd/mm/yyyy',
            'W'=>'dd/mm/yyyy',
            'AF'=>'dd/mm/yyyy',
            'AI'=>'dd/mm/yyyy',
            'AN'=>'dd/mm/yyyy',
            'AT'=>'dd/mm/yyyy',

        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombres',
            'Tienda',
            'Zona',
            'Documento',
            'Numero',
            'Fecha venta',
            //'Fecha Creación',
            'Fecha Recepcion',
            'Pago Administrativo',
            'Tipo de venta',
            'Monto de compra',
            'Marca',
            'Modelo',
            'Chasis',
            'Motor',

            'Color',
            'Año',
            'Categoria',

            'Dua',
            'Item',
            'Certificado',

            'oficinaregistral',
            'fechaingreso',
            'titulo',
            'codigodeverificacion',
            'recibo',
            'importe',

            'statussunarp',
            'tarjetadepropiedad',
            'cargoenvio',


            'numerodeplaca',
            'fechadeenvio',
            'guiaderemision',
            'statusfinal',
            'fechaderevision',
            'confirmaciondeplaca',
            'placa',
            'codigoplaca',
            'monto',
            'fechadepago',
            'facturaapp',


            'confirmaciondeenvio',
            'confirmaciondecobro',
            'confirmarfindetramite',
            'factura',
            'fechadefacturacion',
            'Status Final',



            'Observacion',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 30,
            'D' => 20,
            'E' => 15,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 20,
            'K' => 30,
            'L' => 20,
            'M' => 20,
            'N' => 20,
            'O' => 20,
            'P' => 20,//color
            'Q' => 20,//año
            'R' => 20,//categoria
            'S' => 20,
            'T' => 20,
            'U' => 20,
            'V' => 20,
            'W' => 20,
            'X' => 20,
            'Y' => 20,
            'Z' => 20,
            'AA' => 20,
            'AB' => 20,
            'AC' => 20,
            'AD' => 20,
            'AE' => 20,
            'AF' => 20,
            'AG' => 20,
            'AH' => 20,
            'AI' => 20,
            'AJ' => 20,
            'AK' => 20,
            'AL' => 20,
            'AM' => 20,
            'AN' => 20,
            'AO' => 20,
            'AP' => 20,
            'AQ' => 20,
            'AR' => 20,
            'AS' => 20,
            'AT' => 20,
            'AU' => 20,

            'AV' => 35,
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
