@extends('welcome')
@section('titulo','Sub-Eventos|TravelTime')
@section('contenido')
    <div class="container bg-white rounded-3 ">
        <h1 class="text-center  text-decoration-underline">Gestionar Sub-Eventos <hr></h1>


        {{-- Crear --}}

        <form id="formRegistrar" enctype="multipart/form-data" method="POST" action="{{route('crearSubEventos')}}">
            @csrf
            @method('POST')
            @if (session('creado'))
            <div class="alert alert-success alert-dismissible fade show text-center mt-5" role="alert">
                <strong>    {{session('creado')}}  </strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <h1 class="text-center text-white badge  fs-1 bg-success d-block mx-auto">Registrar Sub-Evento</h1> <br>
            <label for="" class="form-label">Selecciona el Evento</label>
            <select class="form-select my-2" name="evento_id" id="">
                @foreach ($eventos as $evento)
                    <option value="{{$evento->id}}">{{$evento->nombre}}</option>
                @endforeach
            </select>
            <label for="">Selecciona el Lugar</label>
            <select class="form-select my-2" name="lugar_id" id="">
                @foreach ($lugares as $lugar)
                    <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
                @endforeach
            </select>
            <label for="" class="form-label">Nombre Sub-Evento</label>
            <input type="text" name="nombre" class="form-control">

            <label for="" class="form-label">Descripcion</label>
            <textarea type="text" name="descripcion" class="form-control"></textarea>

            <label class="form-label" for="">Dia</label>
            <input type="date" class="form-control" name="dia" id="">

            <label class="form-label" for="">hora Inicial</label>
            <input type="time" class="form-control" name="horaInicio" id="">

            <label class="form-label" for="">hora Final</label>
            <input type="time" class="form-control" name="horaFinal" id="">

            <label class="form-label" for="">Imagen</label>
            <input name="foto" class="form-control"  type="file">
                
            <button type="submit" class="btn btn-success my-2">Registrar</button>

        {{-- 
            		descripcion	dia	horaInicio	horaFinal	foto
            --}}
        </form>


        {{-- actualizar --}}
<hr>
        <form enctype="multipart/form-data" id="formActualizado" class="my-5" action="{{route('ActualizarSubEventos')}}" method="POST">
            <h1 class="text-center text-white badge  fs-1 bg-primary d-block mx-auto">Actualizar Sub-Evento</h1> <br>
            @csrf
            @if (session('actualizado'))
            <div class="alert alert-primary alert-dismissible fade show text-center mt-5" role="alert">
                <strong>    {{session('actualizado')}}  </strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <label for="" class="form-label">Selecciona el SubEvento</label>
            <select id="subEvento_id" class="form-select my-2" name="subEvento_id" id="">
                @foreach ($subEventos as $sub)
                    <option value="{{$sub->id}}">{{$sub->nombre}}</option>
                @endforeach
            </select>
            <label class="form-label" for=""> evento actual</label>
            <select  id="evento_idActual" class="form-select my-2" name="evento_idActual" >
                
            </select>
            <label  class="form-label di" for=""> Lugar actual</label>
            <select  id="lugar_idActual" class="form-select my-2 disabled bg-secondary bg-gradient " name="lugar_idActual" >
                
            </select>

            <label  class="form-label" for="">Selecciona el evento</label>
            <select class="form-select my-2" name="evento_id" >
                <option value="">Seleccione evento</option>
                @foreach ($eventos as $evento)
                    <option value="{{$evento->id}}">{{$evento->nombre}}</option>
                @endforeach
            </select>
            <label  class="form-label" for="">Selecciona el Lugar</label>
            <select class="form-select my-2" name="lugar_id" >
                <option value="">Seleccione</option>
                @foreach ($lugares as $lugar)
                    <option value="{{$lugar->id}}">{{$lugar->nombre}}</option>
                @endforeach
            </select>
            
            <label for="" class="form-label">Nombre Sub-Evento</label>
            <input id="nombreUpdate" type="text" name="nombre" class="form-control">

            <label for="" class="form-label">Descripcion</label>
            <textarea id="descripcionUpdate" type="text" name="descripcion" class="form-control"></textarea>

            <label class="form-label" for="">Dia</label>
            <input id="diaUpdate" type="date" class="form-control" name="dia" id="">

            <label class="form-label" for="">hora Inicial</label>
            <input id="horaInicioUpdate" type="time" class="form-control" name="horaInicio" id="">

            <label class="form-label" for="">hora Final</label>
            <input id="horaFinalUpdate" type="time" class="form-control" name="horaFinal" id="">

            <label class="form-label" for="">Imagen Actual</label><br>
            <img class="img-fluid" id="fotoActualUpdate" src="" alt="">
            <br><label class="form-label" for="">Imagen nueva</label>
            <input  name="foto" class="form-control"  type="file">
                
            <button type="submit" class="btn btn-primary my-2">Actualizar</button>
        </form>
<hr>
        <form id="formEliminar" action="{{route('eliminarSubEvento')}}" method="POST">
        @csrf
        <h1 class="text-center text-white badge  fs-1 bg-danger d-block mx-auto">Eliminar Sub-Evento</h1> <br>
            @csrf
            @if (session('eliminado'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-5" role="alert">
                <strong>    {{session('eliminado')}}  </strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <select class="form-select" name="id" id="">
                @foreach ($subEventos as $sub)
                <option value="{{$sub->id}}">{{$sub->nombre}}</option>
                @endforeach
            </select>
            <button class="btn btn-danger my-2">Eliminar </button>
        </form>









    </div>


<script src="js/subEventos.js"></script>
@endsection
