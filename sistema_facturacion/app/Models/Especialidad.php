<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_especialidad';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'especialidad_id');
    }

           
}
