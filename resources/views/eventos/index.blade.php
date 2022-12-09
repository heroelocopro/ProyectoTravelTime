@extends('welcome')
@section('titulo','Gestionar Eventos')

@section('contenido')

<body class="color8">
  

  
<h1 style="text-shadow: 1px 5px 10px black ;"  class="text-center text-white  text-4xl fw-bold my-4      ">Events <img style="width: 10rem" class="img-fluid" src="img/portada/flight.png" alt="" srcset=""></h1>


<div style="min-height: 3rem;" class="d-flex hover:text-lime-400   justify-content-center align-items-center" >

    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-center text-3xl text-success ps-4">Register Event <i class="bi bi-airplane"></i> </h1>




  

<form id="formCreado" method="POST" enctype="multipart/form-data"  action=" {{route('crearEvento')}} " class="shadow  container  w-75 rounded bg-white text-dark">
  {{-- @if(session('creado'))
  <div class="alert alert-success alert-dismissible fade show text-center mt-5" role="alert">
    <strong>    {{session('creado')}}  </strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif --}}
    @csrf
    @error("nombre")
    <span class="text-danger">{{$message}}</span>  <br>
  @enderror 
 
    <label class="d-inline-block" for="">nombre</label>
    <input name="nombre" type="text" class="d-inline-block form-control ">
    @error("descripcion")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label class="form-input" for="">description</label>
    <textarea name="descripcion" class="form-control" rows="2">

    </textarea>
    @error("imagen")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label class="form-input" for="">image</label>
    <input name="imagen" type="file" accept="png" class="form-control">
    @error("fechaInicio")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label class="form-input" for="">fecha Inicio</label>
    <input name="fechaInicio" type="date" class="form-control">
    @error("fechaFin")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label class="form-input" for="">fecha Fin</label>
    <input name="fechaFin" type="date" class="form-control">
    @error("SelectDepartamento")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label for="" class="form-input ">Departamento</label>
    <select name="SelectDepartamento" id="departamentoRegistro" class="form-select" value="" type="text">
@foreach ($departamentos as $departamento)
  <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
@endforeach
    </select>
    @error("ciudades")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label class="form-input" for="">ciudad</label>
    <select id="ciudadesRegistro" name="ciudades" class="form-select my-2" >

    </select>
    @error("idLugarTuristico")
    <span class="text-danger">{{$message}}</span> <br>
  @enderror 
    <label for="" class="form-label">Lugar</label>
    <select class="form-select" name="idLugarTuristico" id="">
      @foreach ($lugares as $lugar)
        <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
      @endforeach
    </select>
    <button type="submit" class="btn btn-success text-white border rounded   color8 my-3 hover:bg-green-500 ">Register</button>
</form>
</div>


<div id="formActualizado" style="min-height: 3rem;" class="d-flex hover:text-blue-900 justify-content-center align-items-center my-4" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-primary text-center  text-3xl  ps-4 ">Update Event <i class="bi bi-tools  "></i> </h1>
<form enctype="multipart/form-data"  method="POST"  action="{{route('actualizarEvento')}}" class="shadow color9 container bg-white text-dark w-75  rounded">
  {{-- @if(session('actualizado'))
  <div class="alert alert-primary alert-dismissible fade show text-center mt-5" role="alert">
    <strong>    {{session('actualizado')}}  </strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif --}}
  @csrf
  @method('post')
    <label class="form-label" for="">Events</label>
    <select class="form-control my-2" name="idEvento" id="evento_id">
      @foreach ($eventos as $evento )
      <option  class="opciones"  value="{{$evento->id}}"><a href="{{route('gestionarEventos2',$evento->id)}}">{{$evento->nombre}}</a></option>
    @endforeach
    </select>

    <label class="d-inline-block" for="">nombre</label>
    <input id="nombreUpdate" value="" name="nombreUpdate" type="text" class="d-inline-block form-control ">
    <label class="form-label" for="">fecha Inicio</label>
    <input id="fechaInicioUpdate" name="fechaInicioUpdate" type="date" class="form-control">
    <label class="form-label" for="">fecha Fin</label>
    <input id="fechaFinUpdate" name="fechaFinUpdate" type="date" class="form-control">
    <label class="form-label" for="">descripcion</label>
    <textarea id="descripcionUpdate" name="descripcionUpdate" class="form-control" rows="2">

    </textarea>
    <label class="form-label" for="">Imagen actual</label><br>
    <img id="imagenActualUpdate"  src="" alt="" class="img-fluid"> <br>
    <label class="form-label" for="">cambiar imagen</label>
    <input name="imagen" type="file" class="form-control">
    <label class="form-label" for="">Departamento actual</label>
    <input name="departamentoActual"   class="form-control " type="text" disabled id="departamentoActual">
    <label class="form-label" for="">Ciudad actual</label>
    <input  name="ciudadActual"  class="form-control " type="text" disabled id="ciudadActual">
    <label class="form-label" for="">Departamento Nuevo || no es necesario volver a introducir los valores</label>
    <select  id="departamentosNuevoUpdate" name="departamentoNuevo" class="form-select">
      <option value=""></option>
      @foreach ($departamentos as $departamento )
      <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
    @endforeach
    </select>
    <label class="form-label" for="">ciudad Nueva</label>
    <select  id="ciudadesNuevoUpdate" name="ciudadesNuevoUpdate" class="form-select">
    </select>
    <label for="">Lugar Actual</label>
    @isset($evento->lugarturisticos[0]['nombre'])
    <input id="LugarActualUpdate" disabled type="text" class="form-control" value="{{$evento->lugarturisticos[0]['nombre']}}"> 
    @endisset
    <label for="">Lugar Nuevo| no es necesario volver a introducir los valores</label>
    <select class="form-select" id="LugarNuevoUpdate" name="LugarNuevoUpdate" id="">
      <option value=""></option>
      @foreach ($lugares as $lugar )
        <option value=" {{$lugar->id}} ">{{$lugar->nombre}}</option>
      @endforeach
    </select>
    
    <button type="submit" class="btn btn-primary text-white hover:bg-blue-500 border rounded fw-bold my-3">Update</button>
</form>
</div>

<div id="formEliminado" style="min-height: 3rem;" class=" hover:text-red-600 d-flex justify-content-center align-items-center my-4" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-center  text-3xl  hover:text-red-600  ps-4 text-danger ">Delete Event <i class="bi bi-trash  "></i></h1>
<form method="POST" action="{{route('eliminarEvento')}}" class="shadow color9 container bg-white text-dark w-75  rounded">
  {{-- @if(session('eliminado'))
  <div class="alert alert-danger alert-dismissible fade show text-center mt-5" role="alert">
    <strong>    {{session('eliminado')}}  </strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif --}}
  @method('POST')
  @csrf
    <label class="form-label" for="">Events</label>
    <select class="form-control my-2" name="idEvento" id="idEvento">
    @foreach ($eventos as $evento )
      <option id="{{$evento->id}}" value="{{$evento->id}}">{{$evento->nombre}}</option>
    @endforeach
    </select>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger text-white hover:bg-red-600 border rounded color8 fw-bold my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Delete
  </button>

  <!-- Modal -->
  <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Event</h5>
          <button type="button" class="btn-close btn-danger btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Estas seguro de eliminar el evento 
        </div>
        <div class="modal-footer text-dark">
          <button type="button" class="btn-primary btn" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn text-white  btn-danger fw-bold my-3">Delete</button>

        </div>
      </div>
    </div>
  </div>
</form>
</div>
<script  src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="js/evento.js"></script>
</body>
@endsection
