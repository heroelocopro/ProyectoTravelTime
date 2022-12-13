<?php

namespace App\Http\Controllers;

use App\Models\ciudades;
use App\Models\departamento;
use App\Models\lugarturistico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;



class LugarturisticoController extends Controller
{
    public function buscar(Request $request)
    {

        $name = $request->get('nombre');
        $lugares = lugarturistico::where('nombre','like',"%".$name."%")->paginate(1);
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        return view('lugares.buscar',compact(['lugares','departamentos','ciudades']));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $lugares = DB::table('lugarturisticos')->simplePaginate(1);
        // $opiniones = DB::select("select comentariolugars.* ,users.name , users.rol  from comentariolugars inner JOIN
        // users on comentariolugars.idUsuarioLugar = users.id order by comentariolugars.created_at desc");
        // $puntuacion  = DB::select('select * from comentariolugars ');
        // return view('lugares.index', ['lugares' => $lugares, 'opiniones' => $opiniones, 'puntuacion' => $puntuacion]);
        $lugares = lugarturistico::where('id','>','0')->paginate(1);
        $departamentos = departamento::all();
        $ciudades = ciudades::all();
        return view('lugares.lugares', compact(['lugares','departamentos','ciudades']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugares = lugarturistico::all();
        return view('lugares.gestionar',['lugares' => $lugares]);
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
        $validacion = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'ubicacion' => 'required'
        ]);

        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);

        }

        $request->imagen = $nombreimagen;
        $lugarturistico = lugarturistico::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $nombreimagen,
            'ubicacion' => $request->ubicacion]);
        Alert::success('Lugar Creado','El lugar | '. $request->nombre .' | fue creado con exito');
        return Redirect::to(URL::previous() . "#formCreado")->with('creado' ,'Lugar creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lugarturistico  $lugarturistico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lugar = lugarturistico::find($id);
        return $lugar;
    }

    public function mostrar($id)
    {        
        return lugarturistico::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lugarturistico  $lugarturistico
     * @return \Illuminate\Http\Response
     */
    public function edit(lugarturistico $lugarturistico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lugarturistico  $lugarturistico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validacion = $request->validate([
            'idLugar' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $id = $request->idLugar;
        $lugar = lugarturistico::find($id);
        if($request->hasFile("imagen")){

            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path("img/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $lugar->imagen = $nombreimagen;
        }

        if($request->ubicacionUpdate != ""){


            $lugar->ubicacion = $request->ubicacionUpdate;
        }
       

        
        $lugar->nombre = $request->nombre;
        $lugar->descripcion = $request->descripcion;
        $lugar->save();
        Alert::info('Lugar Actualizado','El lugar | '. $lugar->nombre .' | fue Actualizado con exito');
        return Redirect::to(URL::previous() . "#formActualizado")->with('actualizado' ,'Lugar Actualizado');

    }
    public function eliminar(Request $request){
        $request->validate([
            'idLugar' => 'required'
        ]);
        $lugar = lugarturistico::find($request->idLugar);
        Alert::warning('Lugar Eliminado','El lugar | '. $lugar->nombre .' | fue eliminado');
        $lugar->delete();
        return Redirect::to(URL::previous() . "#formEliminado")->with('eliminado' ,'Lugar eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lugarturistico  $lugarturistico
     * @return \Illuminate\Http\Response
     */
    public function destroy(lugarturistico $lugarturistico)
    {
        //
    }
}
