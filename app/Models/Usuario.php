<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'telefono',
        'ciudad',
        'pais',
        'password', // Renombrado para coincidir con el backend
        'terminos' // Campo para aceptar términos
    ];
    public function compras()
    {
        return $this->hasMany(Compra::class); 
    }


    
    //
}