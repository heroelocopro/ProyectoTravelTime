@extends('welcome')
@section('titulo','Eventos | TravelTime')
@section('contenido')

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/colores.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Plantilla</title>
    </head>

    <body>
      {{-- buscador --}}

      <div class="d-block mx-auto w-50">
        <form  action="{{ route('buscarEventos') }}">
          @csrf
          <label class="text-center d-block mx-auto" for="">Buscador de Eventos por Nombre</label>
          <input required  name="nombre" class="form-control" type="text">
          <button type="submit" class="btn btn-warning mx-auto d-block mt-2">Buscar</button>
        </form>
      </div>
        

      <div class="container bg-white mt-5 ">
        {{-- eventos --}}
        <div class="mb-5">
          
          @foreach ($eventos as $evento )
          <h1 class="text-center fw-bold text-decoration-underline">Evento</h1>
            <h1 class="text-center pt-5">  {{$evento->nombre}} <hr></h1>
            <p class="float-start fs-4"> <span class="badge bg-success">Fecha Inicio</span> {{$evento->fechaInicio}} </p>
            <p class="float-end fs-4"> <span class="badge bg-danger">Fecha Final</span> {{$evento->fechaFin}} </p>
            @foreach ($departamentos as $departamento)
              @if ($departamento->id == $evento->departamento_id)
              <p class="fs-4 text-center"> El evento se realiza en el departamento  <span class="text-primary">{{$departamento->nombre}}</span> </p>
              @endif
            @endforeach
            @foreach ($ciudades as $ciudad )
            @if ($ciudad->id == $evento->ciudad_id)
            <p class="fs-4 text-center"> El evento se realiza en la ciudad de  <span class="text-primary">{{$ciudad->nombreCiudad}}</span> </p>
            @endif
            @endforeach
            <img class="img-fluid shadow rounded-3 d-block mx-auto" src="img/{{$evento->imagen}}" alt="" srcset="">
            <p class="text-center  fs-4 my-5"> {{$evento->descripcion}} </p>
          </div>


{{-- Lugares --}}


@if (count($evento->lugarturisticos) > 0)
<h1 class="text-center mt-5">Lugares donde ocurre el evento </h1>
@endif
@foreach ($evento->lugarturisticos as $lugartu )
<div class="accordion accordion-flush py-2" id="accordionFlushLugar">
                <div class="accordion-item border border-dark rounded-3">
                  <h2 class="accordion-header" id="flush-heading{{$lugartu->id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLugar{{$lugartu->id}}" aria-expanded="false" aria-controls="flush-collapseLugar{{$lugartu->id}}">
                      {{$lugartu->nombre}}
                    </button>
                  </h2>
                  <div id="flush-collapseLugar{{$lugartu->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$lugartu->id}}" data-bs-parent="#accordionFlushLugar">
                    <div class="accordion-body border border-dark rounded-3">
                      <p class="text-center fs-3 fw-bold"> {{$lugartu->nombre}} </p>
                      <img class="img-fluid w-50 d-block mx-auto rounded-circle shadow" src="img/{{$lugartu->imagen}}" alt="" srcset=""> 
                      <p class="text-center fs-4">  {{$lugartu->descripcion}} </p>
                      <iframe class="d-block mx-auto rounded-3  border border-dark " width="600" height="400" src="{{$lugartu->ubicacion}} " frameborder="0"></iframe>

                    </div>
                  </div>
                </div>
              </div>
               @endforeach

{{-- subeventos --}}
              
                @if (count($subEventos) > 0)
                <h1 class="text-center mt-5">sub-eventos del evento</h1>
                @endif
               @foreach ($subEventos as $sub )
               <div class="accordion accordion-flush py-2 " id="accordionFlushSubEventos">
                   @if ($sub->idEvento == $evento->id)
                   <div class="accordion-item border border-dark rounded-3 ">
                       <h2 class="accordion-header" id="flush-heading{{$sub->id}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSubEvento{{$sub->id}}" aria-expanded="false" aria-controls="flush-collapseSubEvento{{$sub->id}}">
                            {{$sub->nombre}}
                        </button>
                        </h2>
                  <div id="flush-collapseSubEvento{{$sub->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$sub->id}}" data-bs-parent="#accordionFlushSubEventos{{$sub->id}}">
                    <div class="accordion-body border border-dark rounded-3 ">
                      <div class="row text-center fs-4">
                       <div class="col-4"> <p >  <span class="badge bg-secondary">Dia </span> {{$sub->dia}} </p></div>
                       <div class="col-4"><p >  <span class="badge bg-success">Hora de inicio </span>  {{$sub->horaInicio}} </p></div>
                       <div class="col-4"><p >  <span class="badge bg-danger">Hora de cierre </span>  {{$sub->horaFinal}} </p></div>
                      </div>
                      <p class="text-center fs-3 fw-bold"> {{$sub->nombre}} </p>
                      <img src="img/{{$sub->foto}}" alt="" class="img-fluid d-block mx-auto rounded-circle shadow"> 
                       <p class="text-center fs-5">  {{$sub->descripcion}} </p>
                    </div>
                    @endif
                  </div>
                  
                  @endforeach
                </div>
              </div>
            @endforeach
        </div >
        @php
        $total = $eventos->total();
        $activo = $eventos->currentPage();
    @endphp
    <div class="text-center d-flex justify-content-center my-2">
      <nav aria-label="...">
        <ul class="pagination">
       <li class="page-item ">
         @if ($eventos->onFirstPage())
         
         <a class="page-link disabled" href="{{$eventos->previousPageUrl()}}">Atras</a>
         
         @else
         <a class="page-link " href="{{$eventos->previousPageUrl()}}">Atras</a>
         @endif
         
       </li>
       @for ($item = 1; $item <= $total; $item++)
       @if ($item == $eventos->currentPage())
       
       <li class="page-item active "><a class="page-link" href="{{$eventos->url($item)}}">{{$item}}</a></li>
       @else
       <li class="page-item  "><a class="page-link" href="{{$eventos->url($item)}}">{{$item}}</a></li>
       @endif
       @endfor
       <li class="page-item">
         @if ($eventos->lastPage() == $eventos->currentPage() )
         <a class="page-link disabled" href="{{$eventos->nextPageUrl()}}">Siguiente</a>
         @else
         <a class="page-link" href="{{$eventos->nextPageUrl()}}">Siguiente</a>
         @endif
       </li>
     </ul>
   </nav>
 </div>


    </body>
@endsection


