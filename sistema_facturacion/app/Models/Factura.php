<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_factura';

    protected $fillable = [
        'forma_pago',
        'observacion',
        'totalFactura',
        'subtotal',
        'descuento_Total',
        'fecha',
        'anulado',
        'cliente_id',
        'medico_id',
        'account_id'
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }  

    public function medicos()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }  

    public function accounts()
    {
        return $this->belongsTo(Account::class, 'account_id');
    } 

    public function detalle()
    {
        return $this->hasMany(Detalle::class, 'factura_id');
    }

}
