<?php

namespace App\Http\Controllers;

use App\Models\evento;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{

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
            return view('eventos.eventos',  ['eventos' => $eventos]);

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
            'fecha' => 'required|date',
            'imagen' => 'required',
            'descripcion' => 'required',
            'mapa' => 'required'
        ]);

        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

        }

        $rutanormal = '<iframe src="https://www.google.com/maps/embed?pb=!4v1663599736207!6m8!1m7!1saCokeKEzdg-HEa3nwE6nqQ!2m2!1d4.305038921804285!2d-74.8028797108409!3f37.56!4f-4.560000000000002!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';


            $cadena_de_texto = $request->mapa;
            $cadena_buscada   = 'src" ';
            $posicion_coincidencia = strrpos($cadena_de_texto, $cadena_buscada);


        evento::create([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'imagen' => $nombreimagen,
            'descripcion' => $request->descripcion,
            'mapa' => $request->mapa
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
        $eventos = evento::all();
        return view('eventos.index', ['eventos' => $eventos]);
    }
}
