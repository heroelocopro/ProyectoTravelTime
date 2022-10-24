<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\evento;
use App\Models\comentarioevento;
use App\Models\lugaresturisticos_eventos;
use App\Models\lugarturistico;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{

    public function actualizarEvento(Request $request){
        $request->validate([
            'nombre' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'descripcion' => 'required',
            'ciudades' => 'required'
        ]);
        $evento = evento::find($request->idEvento);
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $evento->imagen = $nombreimagen;
        }
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->descripcion = $request->descripcion;
        $evento->mapa = $request->mapa;

        $evento->save();

        
        return redirect()->route('gestionarEventos')->with('success','Evento Actualizado');

        
    }

    public function obtener($id){
        $evento = evento::find($id);
        
        return $evento;
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
            return view('eventos.plantilla',  ['eventos' => $eventos, 'opiniones' => $opiniones, 'puntuacion' => $puntuacion]);

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
            'ciudades' => 'required'
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
            'fechaInicio' => $request->fechaInicio,
            'fechaFin' => $request->fechaFin,
            'imagen' => $nombreimagen,
            'descripcion' => $request->descripcion,
            'ciudades' => $request->ciudades
        ]);

        lugaresturisticos_eventos::create([
            'idEvento' => $evento->id,
            'idLugarTuristico' => $request->idLugarTuristico
        ]);

        return redirect()->route('gestionarEventos')->with('success','Evento creado');
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
        $evento->delete();
        return redirect()->back()->with('success','evento eliminado');
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
        return view('eventos.index', ['eventos' => $eventos, 'ciudades' => $ciudades, 'lugares' => $lugares]);
    }
}
