<?php

namespace App\Http\Controllers;

use App\Models\comentariolugar;
use App\Models\lugarturistico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\String\CodePointString;

class LugarturisticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares = DB::table('lugarturisticos')->simplePaginate(1);
        $opiniones = DB::select("select comentariolugars.* ,users.name , users.rol  from comentariolugars inner JOIN
        users on comentariolugars.idUsuarioLugar = users.id order by comentariolugars.created_at desc");
        $puntuacion  = DB::select('select * from comentariolugars ');
        return view('lugares.index', ['lugares' => $lugares, 'opiniones' => $opiniones, 'puntuacion' => $puntuacion]);
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

        $point = $request->ubicacion;
        $x = explode(',',$point);
        $consulta = "INSERT INTO `traveltime2`.`lugarturisticos`
        (`id`,
        `nombre`,
        `descripcion`,
        `imagen`,
        `ubicacion`,
        `created_at`,
        `updated_at`)
        VALUES(
        0,'$request->nombre','$request->descripcion','$nombreimagen',point( $x[1] , $x[0]  ),now(),now());
        ";

        DB::insert($consulta);

        // lugarturistico::create([
        //     'nombre' => $request->nombre,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $nombreimagen,
        //     'ubicacion' =>  $request->ubicacion 
        // ]);

        return redirect()->route('gestionarLugares')->with('success' ,'Lugar Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lugarturistico  $lugarturistico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $lugar = lugarturistico::find($id);
        return $lugar;
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
       

        
        $lugar->nombre = $request->nombre;
        $lugar->descripcion = $request->descripcion;
        $lugar->save();

        return redirect()->route('gestionarLugares')->with('success' ,'Lugar Actualizado');

    }
    public function eliminar(Request $request){
        $request->validate([
            'idLugar' => 'required'
        ]);
        $lugar = lugarturistico::find($request->idLugar);
        $lugar->delete();
        return redirect()->back()->with('success','evento eliminado');
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
