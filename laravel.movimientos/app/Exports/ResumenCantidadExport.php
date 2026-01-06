<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ResumenCantidadExport implements FromArray, WithHeadings, WithEvents
{
    protected $datos;
    protected $desde;
    protected $hasta;
    protected $estado;

    public function __construct(array $datos, $desde, $hasta, $estado)
    {
        $this->datos = $datos;
        $this->desde = $desde;
        $this->hasta = $hasta;
        $this->estado = ucfirst($estado);
    }

    public function array(): array
    {
        return $this->datos;
    }

    public function headings(): array
    {
        return ['COD CLI', 'RAZÓN SOCIAL', 'CANTIDAD'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Insertar filas para encabezado institucional
                $sheet->insertNewRowBefore(1, 5);
                $sheet->mergeCells('A1:C1');
                $sheet->mergeCells('A2:C2');
                $sheet->mergeCells('A3:C3');
                $sheet->mergeCells('A4:C4');
                $sheet->mergeCells('A5:C5');

                $sheet->setCellValue('A1', 'Centro Control de Área Regional La Paz');
                $sheet->setCellValue('A2', 'Tránsito Aéreo NAABOL');
                $sheet->setCellValue('A3', 'RESUMEN DE SOBREVUELOS REGISTRADOS');
                $sheet->setCellValue('A4', 'Rango de Fechas de ' . date('d/m/Y', strtotime($this->desde)) . ' al ' . date('d/m/Y', strtotime($this->hasta)));
                $sheet->setCellValue('A5', 'Estado: ' . $this->estado);

                // Centrar y poner en negrita encabezado institucional
                for ($i = 1; $i <= 5; $i++) {
                    $sheet->getStyle("A{$i}")->getAlignment()->setHorizontal('center');
                    $sheet->getStyle("A{$i}")->getFont()->setBold(true);
                }

                // Estilo del encabezado de la tabla
                $sheet->getStyle('A6:C6')->applyFromArray([
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

                // Estilo de toda la tabla (datos)
                $ultimaFila = count($this->datos) + 6;
                $sheet->getStyle("A6:C{$ultimaFila}")->applyFromArray([
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

                // Ajustar ancho de columnas
                foreach (['A', 'B', 'C'] as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}
