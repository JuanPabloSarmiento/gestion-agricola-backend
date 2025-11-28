<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cultivo;
use App\Models\Animal;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Generar PDF de todos los cultivos.
     */
    public function cultivosPdf()
    {
        $cultivos = Cultivo::with('aplicaciones')->get();


        $pdf = Pdf::loadView('reports.cultivos', compact('cultivos'));
        return $pdf->stream('cultivos.pdf'); // descarga inline
    }

    /**
     * Generar PDF de todos los animales.
     */
    public function animalesPdf()
    {
        $animales = Animal::all();

        $pdf = Pdf::loadView('reports.animales', compact('animales'));
        return $pdf->stream('animales.pdf'); // descarga inline
    }
}
