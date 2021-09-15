<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Medico;
use App\Models\Detalle;
use App\Models\Especialidad;

use Illuminate\Http\Request;
use  PDF;

class PDFController extends Controller
{
    //
    public function PDF(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');
    }


    public function PDFInventario(){
        $inventarios = Inventario::all();

        $pdf = PDF::loadView('inventario.reporte', compact('inventarios'));
        return $pdf->stream('reporteInventario.pdf');

    }


    public function PDFFactura($id_factura){

        $facturas = Factura::where('id_factura', $id_factura)->get();
        
        $clientes = Cliente::select(['id_cliente','nombres','apellidos','numero_cedula','direccion','telefono','correo'])->get();
        $medicos = Medico::select(['id_medico','nombres','apellidos','observacion','especialidad_id'])->get();
        $especialidades = Especialidad::select(['id_especialidad','nombre','descripcion','estado'])->get();
        $detalles = Detalle::select(['id_detalle','cantidad','descripcion','descuento_unitario','precio_unitario','total','factura_id'])->get();
        
        $pdf = PDF::loadView('factura.imprimir.formato', ['facturas' =>$facturas, 'clientes' =>$clientes, 'medicos' =>$medicos, 'especialidades' =>$especialidades, 'detalles'=>$detalles]);
        return $pdf->stream('Factura-'.$id_factura.'.pdf');
        }
}
