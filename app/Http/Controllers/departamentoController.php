<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departamentoController extends Controller
{
    //
    public function mostrar($id)
    {
        $peticion = DB::select('select ciudades.id, ciudades.nombreCiudad, ciudades.departamento_id, departamentos.nombre as departamentoNombre
        from ciudades
        inner join departamentos on ciudades.departamento_id = departamentos.id where departamentos.id = ?', [$id]);
        return $peticion;
    }
}
