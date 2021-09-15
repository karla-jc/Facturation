<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_account';


    protected $fillable = [
        'name',
        'email',
        'estado',
    ];

    protected $hidden = [
        'password',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id_role');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'account_id');
    }

    
}
