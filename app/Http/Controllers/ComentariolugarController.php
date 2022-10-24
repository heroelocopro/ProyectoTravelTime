<?php

namespace App\Http\Controllers;

use App\Models\comentariolugar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class ComentariolugarController extends Controller
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
        //
        $request->validate([
            'comentario' => 'required|max:420',
            'idUsuarioLugar' => 'required',
            'idLugarComentario' => 'required',
            'puntuacion' => 'required'
        ]);



        comentariolugar::create([
            'idLugarComentario' => $request->idLugarComentario,
            'idUsuarioLugar' => $request->idUsuarioLugar,
            'comentario' => $request->comentario,
            'puntuacion' => $request->puntuacion
        ]);
        
        return Redirect::to(URL::previous() . "#opiniones")->with('success','Comentario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comentariolugar  $comentariolugar
     * @return \Illuminate\Http\Response
     */
    public function show(comentariolugar $comentariolugar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comentariolugar  $comentariolugar
     * @return \Illuminate\Http\Response
     */
    public function edit(comentariolugar $comentariolugar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comentariolugar  $comentariolugar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentariolugar $comentariolugar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comentariolugar  $comentariolugar
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentariolugar $comentariolugar)
    {
        //
    }
}
