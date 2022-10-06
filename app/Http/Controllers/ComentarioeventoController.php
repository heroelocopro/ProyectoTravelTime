<?php

namespace App\Http\Controllers;

use App\Models\comentarioevento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class ComentarioeventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'comentario' => 'required|max:420',
            'idUser' => 'required',
            'idEvento' => 'required',
            'puntuacion' => 'required'
        ]);



        comentarioevento::create([
            'idEventoComentario' => $request->idEvento,
            'idUsuarioComentario' => $request->idUser,
            'comentario' => $request->comentario,
            'puntuacion' => $request->puntuacion
        ]);
        
        return Redirect::to(URL::previous() . "#opiniones")->with('success','Comentario Creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comentarioevento  $comentarioevento
     * @return \Illuminate\Http\Response
     */
    public function show(comentarioevento $comentarioevento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comentarioevento  $comentarioevento
     * @return \Illuminate\Http\Response
     */
    public function edit(comentarioevento $comentarioevento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comentarioevento  $comentarioevento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentarioevento $comentarioevento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comentarioevento  $comentarioevento
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentarioevento $comentarioevento)
    {
        //
    }
}
