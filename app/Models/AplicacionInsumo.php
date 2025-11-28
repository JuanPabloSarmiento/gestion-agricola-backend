<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplicacionInsumo extends Model
{
    use HasFactory;

    protected $table = 'aplicaciones_insumos';

    protected $fillable = [
        'cultivo_id',
        'animal_id',
        'fecha',
        'producto',
        'dosis'
    ];

    public function cultivo()
    {
        return $this->belongsTo(Cultivo::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
