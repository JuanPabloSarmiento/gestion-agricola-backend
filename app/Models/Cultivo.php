<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;

    protected $table = 'cultivos'; // opcional si la tabla se llama igual

    protected $fillable = [
        'nombre',
        'tipo',
        'fecha_siembra',
        'estado'
    ];

    public function aplicaciones()
{
    return $this->hasMany(AplicacionInsumo::class);
}

}
