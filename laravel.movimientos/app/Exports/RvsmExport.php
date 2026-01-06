<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class RvsmExport implements FromArray, WithHeadings, WithEvents
{
    protected $datos;
    protected $desde;
    protected $hasta;

    public function __construct(array $datos, $desde, $hasta)
    {
        $this->datos = $datos;
        $this->desde = $desde;
        $this->hasta = $hasta;
    }

    public function array(): array
    {
        return $this->datos;
    }

    public function headings(): array
    {
        return [
            'CLAVE',
            'FECHA',
            'VUELO',
            'MATRICULA',
            'MODELO',
            'ORIGEN',
            'DESTINO',
            'ENTRADA',
            'CONTROL ENTRADA',
            'FL ENTRADA',
            'AEROVIA FIJO ENTRADA',
            'SALIDA',
            'CONTROL SALIDA',
            'FL SALIDA',
            'FIJO 1',
            'HORA FIJO 1',
            'FL FIJO 1',
            'FIJO 2',
            'HORA FIJO 2',
            'FL FIJO 2',
            'FIJO 3',
            'HORA FIJO 3',
            'FL FIJO 3',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Encabezado institucional
                $sheet->insertNewRowBefore(1, 6);
                $sheet->mergeCells('A1:W1');
                $sheet->mergeCells('A2:W2');
                $sheet->mergeCells('A3:W3');
                $sheet->mergeCells('A4:W4');
                $sheet->mergeCells('A5:W5');
                $sheet->mergeCells('A6:W6');
 
                $sheet->setCellValue('A1', 'Centro Control de Área Regional La Paz');
                $sheet->setCellValue('A2', 'Tránsito Aéreo NAABOL');
                $sheet->setCellValue('A4', 'Reporte Separación Mínima Vertical Reducida (RVSM)');
                $sheet->setCellValue('A5', 'Rango de Fechas del ' . date('d/m/Y', strtotime($this->desde)) . ' al ' . date('d/m/Y', strtotime($this->hasta)));

                for ($i = 1; $i <= 6; $i++) {
                    $sheet->getStyle("A{$i}")->getAlignment()->setHorizontal('center');
                    $sheet->getStyle("A{$i}")->getFont()->setBold(true);
                }

                // Estilo encabezado tabla
                $sheet->getStyle('A7:W7')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => 'DDDDDD']
                    ],
                    'alignment' => ['horizontal' => 'center'],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        ]
                    ]
                ]);

                // Estilo de los datos
                $ultimaFila = count($this->datos) + 7;
                $sheet->getStyle("A8:W{$ultimaFila}")->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        ]
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center',
                    ],
                ]);

                // Ajustar ancho automático
                foreach (range('A', 'W') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}
