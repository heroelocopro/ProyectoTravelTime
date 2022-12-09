<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\departamento;
use App\Models\evento;
use App\Models\lugarturistico;
use App\Models\subEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class RelacionController extends Controller
{
    public function index()
    {
        try{
            $eventos = evento::where('fechaInicio','!=', now())->paginate(1);
            // $eventos = DB::select('select * from eventos')->paginate(1);
            $subEventos = subEvento::all();
            $ciudades = ciudades::all();
            $departamentos = departamento::all();
            return view('eventos.eventos', ['eventos' => $eventos,'ciudades' => $ciudades,'subEventos' => $subEventos,'departamentos' => $departamentos]);
        }catch (Throwable $e){
            return view('https.500');
        }
    }
}
