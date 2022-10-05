@extends('welcome')
@section('titulo','Eventos')

@section('contenido')

<body class="color8">
  

@if(session('success'))
<h1 class="text-center bg-primary text-success ">
    {{session('success')}}
</h1>
@endif
<h1 style="text-shadow: 1px 5px 10px black ;"  class="text-center text-white  text-4xl fw-bold my-4      ">Events</h1>


<div style="min-height: 3rem;" class="d-flex hover:text-lime-400   justify-content-center align-items-center" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-center text-3xl text-white ps-4">Register Event <i class="bi bi-airplane-engines"></i> </h1>
<form method="POST" enctype="multipart/form-data"  action=" {{route('crearEvento')}} " class="shadow color9 container text-white w-75 rounded">
    @csrf
    <label class="d-inline-block" for="">name</label>
    <input name="nombre" type="text" class="d-inline-block form-control ">
    <label class="form-input" for="">date</label>
    <input name="fecha" type="date" class="form-control">
    <label class="form-input" for="">description</label>
    <textarea name="descripcion" class="form-control" rows="2">

    </textarea>
    <label class="form-input" for="">image</label>
    <input name="imagen" type="file" accept="png" class="form-control">
    <label class="form-input" for="">location</label>
    <input name="mapa" type="text" class="form-control">
    <button type="submit" class="btn text-white border rounded   color8 my-3 hover:bg-green-500 ">Register</button>
</form>
</div>


<div style="min-height: 3rem;" class="d-flex hover:text-blue-900 justify-content-center align-items-center my-4" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-white text-center  text-3xl  ps-4 ">Update Event <i class="bi bi-tools  "></i> </h1>
<form enctype="multipart/form-data"   action="" class="shadow color9 container text-white w-75  rounded">
    <label class="form-label" for="">Events</label>
    <select class="form-control my-2" name="" id="idEvento">
      @foreach ($eventos as $evento )
      <option value="{{$evento->id}}"><a href="{{route('gestionarEventos2',$evento->id)}}">{{$evento->nombre}}</a></option>
    @endforeach
    </select>
    <label class="d-inline-block" for="">name</label>
    <input id="nameUpdate" value="" name="nombre" type="text" class="d-inline-block form-control ">
    <label class="form-label" for="">date</label>
    <input id="fechaUpdate" name="fecha" type="date" class="form-control">
    <label class="form-label" for="">description</label>
    <textarea id="descripcionUpdate" name="descripcion" class="form-control" rows="2">

    </textarea>
    <label class="form-label" for="">image</label>
    <input name="imagen" type="file" class="form-control">
    <label class="form-label" for="">location</label>
    <input id="ubicacionUpdate" value="" name="mapa" type="text" class="form-control">
    <button class="btn color8 text-white hover:bg-blue-500 border rounded fw-bold my-3">Update</button>
</form>
</div>

<div style="min-height: 3rem;" class=" hover:text-red-600 d-flex justify-content-center align-items-center my-4" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-center  text-3xl text-white hover:text-red-600  ps-4 ">Delete Event <i class="bi bi-trash  "></i></h1>
<form method="POST" action="{{route('eliminarEvento')}}" class="shadow color9 container text-white w-75  rounded">
  @method('POST')
  @csrf
    <label class="form-label" for="">Events</label>
    <select class="form-control my-2" name="idEvento" id="idEvento">
    @foreach ($eventos as $evento )
      <option value="{{$evento->id}}">{{$evento->nombre}}</option>
    @endforeach
    </select>
    <!-- Button trigger modal -->
<button type="button" class="btn text-white hover:bg-red-600 border rounded color8 fw-bold my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Delete
  </button>

  <!-- Modal -->
  <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure of delete the event
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
<script src="evento.js"></script>
</body>
@endsection
