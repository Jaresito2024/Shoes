<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Compra extends Model
{

    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'zapato_id',
        'precio'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function zapato()
    {
        return $this->belongsTo(Zapato::class);
    }
    
}
