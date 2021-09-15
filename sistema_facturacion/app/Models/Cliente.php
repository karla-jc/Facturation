<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombres',
        'apellidos',
        'numero_cedula',
        'direccion',
        'telefono',
        'correo'
    ];

  
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cliente_id');
    }

}