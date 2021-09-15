<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detalle';

    protected $fillable = [
        'cantidad',
        'descripcion',
        'descuento_unitario',
        'precio_unitario',
        'total',
        'factura_id',
        'servicio_id'
    ];
    
    public function facturas()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    } 

    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    } 
}