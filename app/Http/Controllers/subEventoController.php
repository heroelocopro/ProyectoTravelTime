<?php

namespace App\Http\Controllers;

use App\Models\evento;
use App\Models\lugarturistico;
use App\Models\subEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class subEventoController extends Controller
{
    public function gestionar()
    {
        // mandando cosas
        $eventos = evento::all();
        $lugares = lugarturistico::all();
        $subEventos = subEvento::all();
        return view('subEventos.gestionar', compact(['eventos','lugares','subEventos']));
    }

    public function crear(Request $request)
    {
        // validando
       $validacion = $request->validate(
            [
                'evento_id' => 'required',
                'lugar_id' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
                'dia' => 'required',
                'horaInicio' => 'required',
                'horaFinal' => 'required',
            ]
            );

            $subEvento = new subEvento();
            $subEvento->nombre = $request->nombre;
            $subEvento->descripcion = $request->descripcion;
            $subEvento->dia = $request->dia;
            $subEvento->horaInicio = $request->horaInicio;
            $subEvento->horaFinal = $request->horaFinal;
            $subEvento->idEvento = $request->evento_id;
            $subEvento->idLugar = $request->lugar_id;
            if($request->hasFile("foto")){

                $imagen = $request->file("foto");
                $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
                $ruta = public_path("img/");
    
                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);
                $subEvento->foto = $nombreimagen;
            }
            $subEvento->save();

            return Redirect::to(URL::previous() . "#formRegistrar")->with('creado','Evento Creado');
    }

    public function Actualizar(Request $request)
    {
          $request->validate(
            [
                'subEvento_id' => 'required',
                'evento_idActual' => 'required',
                'lugar_idActual' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
                'dia' => 'required',
                'horaInicio' => 'required',
                'horaFinal' => 'required',
            ]);
            $subEvento = subEvento::find($request->subEvento_id);
            $subEvento->nombre = $request->nombre;
            $subEvento->descripcion = $request->descripcion;
            $subEvento->dia = $request->dia;
            $subEvento->horaInicio = $request->horaInicio;
            $subEvento->horaFinal = $request->horaFinal;
            $subEvento->idEvento = $request->evento_idActual;
            $subEvento->idLugar = $request->lugar_idActual;
            if($request->evento_id != "")
            {
                $subEvento->idEvento = $request->evento_id;
            }
            if($request->lugar_id != "")
            {
                $subEvento->idLugar = $request->lugar_id;
            }
            if($request->hasFile('foto'))
            {
                $imagen = $request->file("foto");
                $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
                $ruta = public_path("img/");
    
                //$imagen->move($ruta,$nombreimagen);
                copy($imagen->getRealPath(),$ruta.$nombreimagen);
                $subEvento->foto = $nombreimagen;
            }
            
            
            $subEvento->save();

            return Redirect::to(URL::previous() . "#formActualizado")->with('actualizado','Evento Actualizado');

    }

    public function mostrar($id)
    {
        return subEvento::find($id);
    }

    public function eliminar(Request $request)
    {
        $request->validate(['id' => 'required']);
        subEvento::find($request->id)->delete();
        return Redirect::to(URL::previous() . "#formEliminar")->with('eliminado','Evento eliminado');
    }

}
