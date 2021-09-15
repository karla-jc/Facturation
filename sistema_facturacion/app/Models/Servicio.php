<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_servicio';

    protected $fillable = [
        'nombre',
        'descripcion',
        'valor',
        'estado',
        'iva'
    ];

    public function detalle_factura()
    {
        return $this->hasMany(Detalle::class, 'servicio_id');
    }
}
