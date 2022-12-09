@extends('welcome')

@section('titulo','Gestionar Lugares')
    

@section('contenido')
<body class="color8">
<h1 style="text-shadow: 1px 5px 10px black ;"  class="text-center text-white  text-4xl fw-bold my-4      ">Places <img style="width: 10rem" class="img-fluid" src="img/portada/flight.png" alt="" srcset=""></h1>



<div id="formCreado" style="min-height: 3rem;" class="d-flex hover:text-lime-400   justify-content-center align-items-center" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-center text-3xl text-success ps-4">Register Places <i class="bi bi-airplane"></i> </h1>
<form method="POST" enctype="multipart/form-data"  action=" {{route('crearLugar')}} " class="shadow color9 container bg-white text-dark  p-2 w-75 rounded">
  {{-- @if(session('creado'))
    <div class="alert alert-success alert-dismissible fade show text-center mt-5" role="alert">
        <strong>    {{session('creado')}} </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif --}}
    @csrf
    <label class="d-inline-block" for="">nombre</label>
    <input name="nombre" type="text" class="d-inline-block form-control ">
    <label class="form-input" for="">descripcion</label>
    <textarea name="descripcion" class="form-control" rows="2">
    </textarea>
    <label class="form-label" for="">imagen</label>
    <input name="imagen" type="file" accept="png" class="form-control">
    <label for="" class="form-label">ubicacion</label>
    <input name="ubicacion" placeholder="Ingrese el src del iframe del mapa" class="form-control" type="text">
    <button type="submit" class="btn btn-success border rounded   color8 my-3 hover:bg-green-500 ">Register</button>
</form>
</div>


<div id="formActualizado" style="min-height: 3rem;" class="d-flex hover:text-blue-900 justify-content-center align-items-center my-4" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-primary text-center  text-3xl  ps-4 ">Update Places <i class="bi bi-tools  "></i> </h1>
<form enctype="multipart/form-data"  method="POST"  action="{{route('actualizarLugar')}}" class="shadow color9 container bg-white text-dark w-75  rounded">
  @csrf
  @method('post')
    <label class="form-label" for="">places</label>
    <select class="form-control my-2" name="idLugar" id="idLugar">
      @foreach ($lugares as $lugar )
      <option  class="opciones"  value="{{$lugar->id}}"><a href="">{{$lugar->nombre}}</a></option>
    @endforeach
    </select>
    <label class="d-inline-block" for="">name</label>
    <input id="nameUpdate" value="" name="nombre" type="text" class="d-inline-block form-control ">
    <label class="form-label" for="">description</label>
    <textarea id="descripcionUpdate" name="descripcion" class="form-control" rows="2">

    </textarea>
    <label class="form-label" for="">Imagen actual</label><br>
    <img id="imgUpdate" src="" alt="" class="img-fluid"> <br>
    <label class="form-label" for="">Cambiar imagen </label>
    <input name="imagen" type="file" class="form-control">
    <label for="" class="form-label">Ubicacion actual</label><br>
    <iframe id="ubicacionUpdate" src="" frameborder="0"></iframe><br>
    <label for="">Cambiar Ubicacion</label>
    <input name="ubicacionUpdate" placeholder="Ingrese el src del iframe del mapa" class="form-control" type="text">
    <button type="submit" class="btn btn-primary color hover:bg-blue-500 border rounded fw-bold my-3">Update</button>
</form>
</div>

<div id="formEliminado" style="min-height: 3rem;" class=" hover:text-red-600 d-flex justify-content-center align-items-center my-4" >
    <h1 style="text-shadow: 1px 5px 10px black ;" class="fw-bold text-center  text-3xl text-danger hover:text-red-600  ps-4 ">Delete Places <i class="bi bi-trash  "></i></h1>
<form method="POST" action="{{route('eliminarLugar')}}" class="shadow color9 container bg-white text-dark w-75  rounded">
  @method('POST')
  @csrf
    <label class="form-label" for="">lugares</label>
    <select class="form-control my-2" name="idLugar" id="idLugar">
    @foreach ($lugares as $lugar )
      <option id="{{$lugar->id}}" value="{{$lugar->id}}">{{$lugar->nombre}}</option>
    @endforeach
    </select>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger hover:bg-red-600 border rounded color8 fw-bold my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Delete
  </button>

  <!-- Modal -->
  <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete place</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure of delete the place
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
<script src="js/lugares.js"></script>
</body>
@endsection


