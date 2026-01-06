<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class PorFechaExport implements FromArray, WithHeadings, WithEvents
{
    protected $datos;
    protected $desde;
    protected $hasta;
    protected $estado;
    protected $razonSocial;

    public function __construct(array $datos, $desde, $hasta, $estado, $razonSocial)
    {
        $this->datos = $datos;
        $this->desde = $desde;
        $this->hasta = $hasta;
        $this->estado = ucfirst($estado);
        $this->razonSocial = $razonSocial;
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
            'CLIENTE',
            'MATRÍCULA',
            'MODELO',
            'MTOW-TON',
            'VUELO',
            'ORIGEN',
            'DESTINO',
            'HR INICIO',
            'HR SALIDA',
            'RUTA',
            'NUM DGAC',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Insertar filas para encabezado institucional
                $sheet->insertNewRowBefore(1, 7);
                $sheet->mergeCells('A1:M1');
                $sheet->mergeCells('A2:M2');
                $sheet->mergeCells('A3:M3');
                $sheet->mergeCells('A4:M4');
                $sheet->mergeCells('A5:M5');
                $sheet->mergeCells('A6:M6');
                $sheet->mergeCells('A7:M7');

                $sheet->setCellValue('A1', 'Centro Control de Área Regional La Paz');
                $sheet->setCellValue('A2', 'Tránsito Aéreo NAABOL');
                $sheet->setCellValue('A3', '');
                $sheet->setCellValue('A4', 'REPORTE DE OPERACIONES AÉREAS');
                $sheet->setCellValue('A5', 'Rango de Fechas del ' . date('d/m/Y', strtotime($this->desde)) . ' al ' . date('d/m/Y', strtotime($this->hasta)));
                $sheet->setCellValue('A6', 'Estado: ' . $this->estado);
                $sheet->setCellValue('A7', 'Cliente: ' . $this->razonSocial);

                // Centrar y poner en negrita encabezado institucional
                for ($i = 1; $i <= 7; $i++) {
                    $sheet->getStyle("A{$i}")->getAlignment()->setHorizontal('center');
                    $sheet->getStyle("A{$i}")->getFont()->setBold(true);
                }

                // Estilo del encabezado de la tabla
                $sheet->getStyle('A8:M8')->applyFromArray([
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
                $ultimaFila = count($this->datos) + 8;
                $sheet->getStyle("A8:M{$ultimaFila}")->applyFromArray([
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
