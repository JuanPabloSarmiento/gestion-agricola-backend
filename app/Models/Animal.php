<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    protected $fillable = [
        'arete',
        'especie',
        'raza',
        'sexo',
        'fecha_nacimiento',
        'peso',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'peso' => 'float',
    ];
}
