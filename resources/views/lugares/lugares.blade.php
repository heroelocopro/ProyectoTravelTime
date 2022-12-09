@extends('welcome')
@section('titulo','Lugares | TravelTime')
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
        <form  action="{{ route('buscarLugar') }}">
          @csrf
          <label class="text-center d-block mx-auto" for="">Buscador de Lugares por Nombre</label>
          <input required  name="nombre" class="form-control" type="text">
          <button type="submit" class="btn btn-warning mx-auto d-block mt-2">Buscar</button>
        </form>
      </div>



      <div class="container bg-white mt-5 ">
        {{-- lugares --}}
        <div class="mb-5">


          @foreach ($lugares as $lugar )
          <h1 class="text-center fw-bold text-decoration-underline">Lugares</h1>
            <h1 class="text-center pt-5">  {{$lugar->nombre}} <hr></h1>
            <img class="img-fluid shadow rounded-3 d-block mx-auto" src="img/{{$lugar->imagen}}" alt="" srcset="">
            <p class="text-center  fs-4 my-5"> {{$lugar->descripcion}} </p>
            <iframe style="margin: 2rem" class="d-block m-auto rounded-3 " width="600" height="400" src="{{$lugar->ubicacion}} " frameborder="0"></iframe>
          </div>


          @if (count($lugar->eventos) > 0)
          <h1 class="text-center mt-5">Eventos que ocurren en el lugar </h1>
          @endif
@foreach ($lugar->eventos as $evento )
<div class="accordion accordion-flush py-2" id="accordionFlushLugar">
                <div class="accordion-item border border-dark rounded-3">
                  <h2 class="accordion-header" id="flush-heading{{$evento->id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLugar{{$evento->id}}" aria-expanded="false" aria-controls="flush-collapseLugar{{$evento->id}}">
                      {{$evento->nombre}}
                    </button>
                  </h2>
                  <div id="flush-collapseLugar{{$evento->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$evento->id}}" data-bs-parent="#accordionFlushLugar">
                    <div class="accordion-body border border-dark rounded-3">
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
                      <img class="img-fluid w-50 d-block mx-auto rounded-circle shadow" src="img/{{$evento->imagen}}" alt="" srcset=""> 
                      <p class="text-center fs-4">  {{$evento->descripcion}} </p>
                        
                    </div>
                  </div>
                </div>
              </div>
               @endforeach

            @endforeach
            
      </div>
            @php
            $total = $lugares->total();
            $activo = $lugares->currentPage();
        @endphp
        <div class="text-center d-flex justify-content-center my-2">
          <nav aria-label="...">
            <ul class="pagination">
           <li class="page-item ">
             @if ($lugares->onFirstPage())
             
             <a class="page-link disabled" href="{{$lugares->previousPageUrl()}}">Atras</a>
             
             @else
             <a class="page-link " href="{{$lugares->previousPageUrl()}}">Atras</a>
             @endif
             
           </li>
           @for ($item = 1; $item <= $total; $item++)
           @if ($item == $lugares->currentPage())
           
           <li class="page-item active "><a class="page-link" href="{{$lugares->url($item)}}">{{$item}}</a></li>
           @else
           <li class="page-item  "><a class="page-link" href="{{$lugares->url($item)}}">{{$item}}</a></li>
           @endif
           @endfor
           <li class="page-item">
             @if ($lugares->lastPage() == $lugares->currentPage() )
             <a class="page-link disabled" href="{{$lugares->nextPageUrl()}}">Siguiente</a>
             @else
             <a class="page-link" href="{{$lugares->nextPageUrl()}}">Siguiente</a>
             @endif
           </li>
         </ul>
       </nav>
     </div>
      </div>

    </body> 
@endsection



