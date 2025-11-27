<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Mostrar lista de animales.
     */
    public function index()
    {
        return response()->json(Animal::all(), 200);
    }

    /**
     * Crear un nuevo registro de animal.
     */
 public function store(\App\Http\Requests\StoreAnimalRequest $request)
{
    $animal = Animal::create($request->validated());
    return response()->json($animal, 201);
}


    /**
     * Mostrar un animal por ID.
     */
    public function show($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }

        return response()->json($animal, 200);
    }

    /**
     * Actualizar un registro.
     */
public function update(\App\Http\Requests\UpdateAnimalRequest $request, $id)
{
    $animal = Animal::find($id);

    if (!$animal) {
        return response()->json(['error' => 'Animal no encontrado'], 404);
    }

    $animal->update($request->validated());

    return response()->json($animal, 200);
}


    /**
     * Eliminar un animal.
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }

        $animal->delete();

        return response()->json(['message' => 'Animal eliminado'], 200);
    }
}
