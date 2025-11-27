<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permitir por ahora
    }

    public function rules(): array
    {
        return [
            'arete' => 'required|string|max:20|unique:animales,arete',
            'especie' => 'required|string|max:50',
            'raza' => 'nullable|string|max:50',
            'sexo' => 'required|in:macho,hembra,macho,hembra',
            'fecha_nacimiento' => 'required|date',
            'peso' => 'required|numeric|min:0',
        ];
    }
}
