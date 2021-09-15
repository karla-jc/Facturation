<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_medico';

    protected $fillable = [
        'nombres',
        'apellidos',
        'observacion',
        'especialidad_id'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }  

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'medico_id');
    }


}