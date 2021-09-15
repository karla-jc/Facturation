<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_inventario';

    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'fecha_ingreso',
        'fecha_revision',
        'observacion'
    ];
}
