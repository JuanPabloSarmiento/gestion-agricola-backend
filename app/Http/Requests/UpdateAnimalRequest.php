<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'arete' => 'sometimes|string|max:20|unique:animales,arete,' . $this->id,
            'especie' => 'sometimes|string|max:50',
            'raza' => 'sometimes|nullable|string|max:50',
            'sexo' => 'sometimes|in:macho,hembra',
            'fecha_nacimiento' => 'sometimes|date',
            'peso' => 'sometimes|numeric|min:0',
        ];
    }
}
