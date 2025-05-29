<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'talla',
        'color',
        'precio',
        'cantidad',
        'imagen',
        'categoria',
    ];
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
    

}
