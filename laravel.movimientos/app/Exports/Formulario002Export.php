<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class Formulario002Export implements FromArray, WithHeadings, WithEvents
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
        return [
            'No.',
            'FECHA',
            'VUELO',
            'MATRÍCULA',
            'MODELO',
            'VERSIÓN',
            'ORIGEN',
            'DESTINO',
            'HR INICIO',
            'HR SALIDA',
            'RUTA',
            'NUM DGAC',
            'RESP'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Insertar filas para encabezado institucional
                $sheet->insertNewRowBefore(1, 6);
                $sheet->mergeCells('A1:M1');
                $sheet->mergeCells('A2:M2');
                $sheet->mergeCells('A3:M3');
                $sheet->mergeCells('A4:M4');
                $sheet->mergeCells('A5:M5');
                $sheet->mergeCells('A6:M6');

                $sheet->setCellValue('A1', 'Centro Control de Área Regional La Paz');
                $sheet->setCellValue('A2', 'Tránsito Aéreo NAABOL');
                $sheet->setCellValue('A3', 'FORMULARIO ATC-002');
                $sheet->setCellValue('A4', 'RESUMEN DE SOBREVUELOS REGISTRADOS');
                $sheet->setCellValue('A5', 'Rango de Fechas de ' . date('d/m/Y', strtotime($this->desde)) . ' al ' . date('d/m/Y', strtotime($this->hasta)));
                $sheet->setCellValue('A6', 'Estado: ' . $this->estado);

                // Centrar y poner en negrita encabezado institucional
                for ($i = 1; $i <= 7; $i++) {
                    $sheet->getStyle("A{$i}")->getAlignment()->setHorizontal('center');
                    $sheet->getStyle("A{$i}")->getFont()->setBold(true);
                }

                // Estilo del encabezado de la tabla
                $sheet->getStyle('A7:M7')->applyFromArray([
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
                $ultimaFila = count($this->datos) + 7;
                $sheet->getStyle("A7:M{$ultimaFila}")->applyFromArray([
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
                foreach (range('A', 'M') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }
}
