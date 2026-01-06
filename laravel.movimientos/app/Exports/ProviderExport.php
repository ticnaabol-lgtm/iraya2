<?php

namespace App\Exports;

use App\Models\Proveedor;
use App\Models\ProveedorContacto;
use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProviderExport implements FromView,WithHeadings,ShouldAutoSize,WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $proveedores = DB::table('proveedors as p')
            ->join('parametrica_descripcions as pd', 'p.fkp_ubicacion_agencia_principal', '=', 'pd.pk_id_parametrica_descripcion')
            ->join('parametrica_descripcions as pd1', 'p.fkp_tipo_sociedad', '=', 'pd1.pk_id_parametrica_descripcion')
            ->join('parametrica_descripcions as pd2', 'p.fkp_rubro_proveedor', '=', 'pd2.pk_id_parametrica_descripcion')
            ->select('p.pk_id_proveedor', 'p.nombre_empresa', 'pd.descripcion as ubicacion_agencia_principal', 'pd1.descripcion as tipo_sociedad', 'pd2.descripcion as rubro', 'p.fkp_ubicacion_agencia_principal', 'p.fkp_tipo_sociedad', 'p.fkp_rubro_proveedor', 'p.nombre_representante_legal', 'p.nit', 'p.activo', 'p.nombre', 'p.email', 'p.direccion', 'numero_telefono')
            ->where('p.activo', 1)
            ->orderBy('p.pk_id_proveedor', 'DESC')
            ->get();

        return view('proveedores.proveedores_reporte_excel', compact('proveedores'));
    }
    public function headings(): array
    {
        return [
            'Nro', 'Nombre Empresa', 'Ubicación Agencia', 'Tipo de Sociedad', 'Tipo de Rubro', 'Representante Legal','Nit','Nombre del Contacto','Telefono','Correo Electronico','Direccion'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
            'A1:P1'  => ['font' => ['size' => 12]],
        ];
    }

}
