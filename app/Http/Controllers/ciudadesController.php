<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ciudadesController extends Controller
{
    public function index($id)
    {
        $departamento = departamento::find($id);
        $peticion = DB::select('select ciudades.id, ciudades.nombreCiudad, ciudades.departamento_id, departamentos.nombre
        from ciudades
        inner join departamentos on ciudades.departamento_id = departamentos.id where departamentos.id = ?', [$id]);
        return $departamento;
    }

    public function ciudad($id)
    {
        $ciudad = ciudades::find($id);
        $peticion = DB::select('select ciudades.id, ciudades.nombreCiudad, ciudades.departamento_id, departamentos.nombre
        from ciudades
        inner join departamentos on ciudades.departamento_id = departamentos.id where ciudades.id = ?', [$id]);
        return $peticion;
    }
}
