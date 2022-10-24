@extends('welcome')
@section("titulo",'Lugares')
@section('contenido')
    
<body class="color8">
      <!-- aqui va eventos -->

      @foreach ($lugares as $lugar )
      

  
   
    <div class="container bg-body my-5 border rounded-3" >
@php
    
        $total = 0;
        $total2 = 0;
        @endphp
@foreach ($puntuacion as $p)
    @if ($p->idLugarComentario == $lugar->id)
    @php
       
        $total = $total + $p->puntuacion;
        $total2 = $total2 + 1;
    @endphp
        
    @endif
@endforeach
@php
    if($total2 == 0){

    }else{

        $total = round($total / $total2);
    }
@endphp
        <h5>Puntuacion Promedio 
            {{$total}}

            @switch($total)
            @case(5)
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            @break
            @case(4)
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            @break
            @case(3)
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            @break
           
            @case(2)
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            @break
            @case(1)
            <i class="bi bi-star-fill text-warning"></i>
            @break
            @case(0)
            <i class="bi bi-star text-warning"></i>
            @break
           @default
                   
    @endswitch
            
            
            {{-- @endif
            @endforeach --}}
            



            </h5>


        <h2 class="text-center mt-5"> {{$lugar->nombre}} <hr class="w-25 mx-auto"> </h2>
        <img src="img/{{$lugar->imagen}}"  class="w-75 img-fluid d-block mx-auto my-5 rounded-3">
        <p class="mt-5 text-center fs-3">
            {{$lugar->descripcion}}
            <hr>
          
        
        </span> 




            @if($lugares->previousPageUrl() == "")
    <div class="d-block mx-auto text-center my-5">
        <button disabled class="btn ">
            <a class="disabled"  href="{{$lugares->previousPageUrl()}}" rel="prev"><img src="icons/arrow_back_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset=""></a>
        </button>
        <a class="" href="{{$lugares->nextPageUrl()}}"  rel="next"><img src="icons/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" alt=""></a>
    </div>

    @else

    @if ($lugares->nextPageUrl() == "")
    <div class="d-block mx-auto text-center my-5">
        <a  href="{{$lugares->previousPageUrl()}}" rel="prev"><img src="icons/arrow_back_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset=""></a>
        <button class="btn" type="button" disabled>
            <a class="disabled " href="{{$lugares->nextPageUrl()}}"  rel="next"><img src="icons/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" alt=""></a>
        </button>
    </div>
    @else
    <div class="d-block mx-auto text-center my-5">
        <a  href="{{$lugares->previousPageUrl()}}" rel="prev"><img src="icons/arrow_back_FILL0_wght400_GRAD0_opsz48.svg" alt="" srcset=""></a>
        <a href="{{$lugares->nextPageUrl()}}" rel="next"><img src="icons/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" alt=""></a>
    </div>
    @endif
    
    @endif

    </div>

    

    @endforeach
          

    
    
    <div class="container bg-body my-5 border rounded-3 ">
        <h2 class="text-center my-5">Comentarios del evento <span class="text-danger">{{$lugar->nombre}}</span> <hr class="w-50 mx-auto d-block text-center"></h2>
        
        @if (auth()->check())
        <!-- Crear Comentario -->
        @if (session('success'))
            
      
        <div id="opiniones" class="alert alert-success">
            <p class="text-center"> {{session('success')}} </p>
        </div>
        @endif
        <div class="my-5  pb-5 ">
            <form action="{{route('crearComentarioLugar')}}" method="POST">
                @csrf
            <p>{{auth()->user()->rol}} <span class="text-danger">{{auth()->user()->name}}</span> </p>
            <input type="hidden" name="idUsuarioLugar" value="{{auth()->user()->id}}" type="text">
            <input type="hidden" name="idLugarComentario" value="{{$lugar->id}}" type="text">
            <div>
              <i style="cursor: pointer" id="star1" class="puntuacion mx-2 bi bi-star-fill text-warning"></i>
              <i style="cursor: pointer" id="star2" class="puntuacion mx-2 bi bi-star text-warning"></i>
              <i style="cursor: pointer" id="star3" class="puntuacion mx-2 bi bi-star text-warning"></i>
              <i style="cursor: pointer" id="star4" class="puntuacion mx-2 bi bi-star text-warning"></i>
              <i style="cursor: pointer" id="star5" class="puntuacion mx-2 bi bi-star text-warning"></i>
              <input name="puntuacion" type="hidden" id="puntuacioninput" value="1">
            </div>
            <textarea class="form-control-plaintext border border-dark rounded-3 p-2" name="comentario" id="" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-success my-2 mx-auto d-block">Comentar</button>
        </form>
        </div>

        @endif



        @foreach ($opiniones as $opinion )
    @if ($opinion->idLugarComentario == $lugar->id)

        <!-- Comentarios  -->
        <div  class="my-5 border-dark  pb-5 border rounded-3 p-2" >
            

            <div class="mt-2">
                <span class="mb-5 text-success  "> <span class="text-danger">{{$opinion->rol}}</span> {{$opinion->name}}  </span> 
            @switch($opinion->puntuacion)
                @case(5)
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                    @break
                    @case(4)
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    @break
                    
                    @case(3)
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>

                    @break
                    @case(2)
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>

                    @break

                    @case(1)
                    <i class="bi bi-star-fill text-warning"></i>

                    @break
            
                @default
                    
            @endswitch

            
            <hr>
            <span class="mb-5 "> {{$opinion->comentario}}</span><br>


          </div>
          
        </div>
@endif
        @endforeach
    </div>


    

    <div class="container-fluid d-flex  bg-dark  mt-auto">
        <p class="text-center mx-auto p-0 m-0 justify-content-center align-items-center text-white">TravelTime</p>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/evento.js" ></script>



    @endsection