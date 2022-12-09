<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\evento;
use App\Models\comentarioevento;
use App\Models\departamento;
use App\Models\lugaresturisticos_eventos;
use App\Models\lugarturistico;
use App\Models\subEvento;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class EventoController extends Controller
{

    public function buscar(Request $request)
    {

        $name = $request->get('nombre');
        $eventos = evento::where('nombre','like',"%".$name."%")->paginate(1);
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        $subEventos = subEvento::all();
        return view('eventos.buscar',compact(['eventos','departamentos','ciudades','subEventos']));
    }

    public function actualizarEvento(Request $request){
        $request->validate([
            'nombreUpdate' => 'required',
            'fechaInicioUpdate' => 'required|date',
            'fechaFinUpdate' => 'required|date',
            'descripcionUpdate' => 'required',
        ]);
        $evento = evento::find($request->idEvento);

        if($request->has('ciudadesNuevoUpdate'))
        {
            if($request->has('departamentoNuevo'))
            {
                $evento->departamento_id = $request->departamentoNuevo;
            }
            $evento->ciudad_id = $request->ciudadesNuevoUpdate;
        }
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $evento->imagen = $nombreimagen;
        }
        if($request->has('LugarNuevoUpdate'))
        {
            DB::select('update lugaresturisticos_eventos set lugarturistico_id = ? where evento_id = ?',[$request->LugarNuevoUpdate,$evento->id]);
        }
        $evento->nombre = $request->nombreUpdate;
        $evento->fechaInicio = $request->fechaInicioUpdate;
        $evento->fechaFin = $request->fechaFinUpdate;
        $evento->descripcion = $request->descripcionUpdate;

        $evento->save();
        Alert::info('Evento Actualizado','el evento  |'.$evento->nombre. '| fue actualizado');
        return Redirect::to(URL::previous() . "#formActualizado")->with('actualizado','Evento Actualizado');
    }

    public function obtener($id){
        $evento = evento::find($id);
        return ['evento' => $evento,'lugar' => $evento->lugarturisticos];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = DB::table('eventos')->simplePaginate(1);
        $opiniones = DB::select("select comentarioeventos.* ,users.name , users.rol  from comentarioeventos inner JOIN
        users on comentarioeventos.idUsuarioComentario = users.id order by comentarioeventos.created_at desc");
        $puntuacion  = DB::select('select * from comentarioeventos ');
        $eventos2 = evento::all();
        $lugares2 = lugarturistico::all();
        $ciudades = ciudades::all();
        $lugarEvento = lugaresturisticos_eventos::all();
        $ubicacion = DB::select('SELECT lugarturisticos.*, asText(ubicacion) as geo FROM `lugarturisticos`;');

            return view('eventos.muchos',['eventos2' => $eventos2 , 'lugares2' => $lugares2,'ciudades2' => $ciudades,'ubicacion2' => $ubicacion,'lugarEvento' => $lugarEvento ]);
            // return view('eventos.plantilla',  ['eventos' => $eventos, 'opiniones' => $opiniones, 'puntuacion' => $puntuacion]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'imagen' => 'required',
            'descripcion' => 'required',
            'ciudades' => 'required',
            'SelectDepartamento'=> 'required',
            'idLugarTuristico' => 'required'
        ]);


        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

        }



       $evento = evento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreimagen,
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'departamento_id' => $request->SelectDepartamento,
            'ciudad_id' => $request->ciudades
        ]);

        lugaresturisticos_eventos::create([
            'evento_id' => $evento->id,
            'lugarturistico_id' => $request->idLugarTuristico
        ]);
        Alert::success('Evento Creado','el evento  |'.$evento->nombre. '| fue Creado');
        return Redirect::to(URL::previous() . "#formCreado")->with('creado','Evento Actualizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evento $evento)
    {
        //
    }
    public function eliminar(Request $request){
        $request->validate([
            'idEvento' => 'required'
        ]);
        $evento = evento::find($request->idEvento);
        Alert::warning('Evento Eliminado','El evento |'. $evento->nombre .'| fue eliminado');
        $evento->delete();
        return Redirect::to(URL::previous() . "#formEliminado")->with('eliminado','Evento Eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(evento $evento)
    {
        //
    }

    public function gestionar() {
        $lugares = lugarturistico::all();
        $eventos = evento::all();
        $ciudades = ciudades::all();
        $departamentos = departamento::all();
        return view('eventos.index', compact(['eventos' , 'ciudades' , 'lugares','departamentos' ]));
    }
}
