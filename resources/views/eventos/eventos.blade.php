@extends('welcome')
@section('titulo','evento')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>TravelTime</title>
</head>
<body class="color8 d-flex flex-column min-vh-100">

<div id="contenedor" class="escondido animate__animated animate__backInDown  ">
    <div   class=" collapse  color7 animate__animated w-100 navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 ms-1 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="/frmEventos.html">Eventos <i class="bi bi-house"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lugares Turisticos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Girardot
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Historia</a></li>
              <li><a class="dropdown-item" href="#">platos tipicos </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li>
          </li>
        </ul>

      </div>

</div>





<div id="eventoscontenedor" class="animate__animated ">

    @foreach ($eventos as $evento )
    
    <div class="container-lg  pb-5  bg-white mt-3 rounded">
        <span class="mb-3">
            <h2 class="text-center">Evento</h2>
        </span>
    <div class="row bg-dark text-white rounded mx-3 mb-3 border-bottom border-2">
      <div class="col-sm-3 col-lg-2 ">
        <h3 class=" mb-2 text-center  rounded ps-2">Nombre</h4>
        </div>
        <div class="col-sm-9 col-lg-10 text-center ">
          <p class="fs-1 text-center"> {{$evento->nombre}} </p>
        </div>
      </div>


      <div class="row bg-dark text-white mb-3     rounded mx-3">
        <div class="col-lg-2">
    <h4 class="d-inline-block text-center">Descripcion e Imagen</h4>
  </div>
  <div class="col-lg-6 ">
    <p class="d-inline-block text-center    "> {{$evento->descripcion}} </p>
  </div>
  <div class="col-lg-4 col-sm-12 text-center ">
    <img src="img/{{$evento->imagen}}" class="img-fluid border  color8 rounded mx-auto m-2" alt="" srcset="">
  </div>

</div>

<div class="row bg-dark text-white mb-3   rounded mx-3">
  <div class="col-lg-2">
    <h4  class="d-inline-block text-center  ">Fecha y Ubicacion</h4>
  </div>
  <div class="col-lg-10 ">
    <p class="d-inline-block   ">
      <div class="row">
        <div class="col-6"><input  style="margin-top: 4rem;" type="date" name="fecha" id="fecha" class="form-control text-center fs-1 "  value="{{$evento->fecha}}">  </div>
        <div class="col-6"> <h1 class="text-center"> {{$evento->mapa}} </h1> </div>
      </div>
    </p>
  </div>
</div>

<div class="mx-auto d-block  text-center p-3 m-3">
  {{$eventos->links()}}
</div>


@if(auth()->user())
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show "  role="alert">
  <h3 class="text-center">Comentario creado con exito</h2>
  <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div id="opiniones" class="row bg-dark text-white mb-3   rounded mx-3">
    <h3 class="text-center mt-5  ">Opiniones</h3>
<hr>
    <form class="form" action="{{route('crearcomentario')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-6" >


        <textarea name="comentario" placeholder="Comenta aqui limite 420 caracteres" minlength="10" maxlength="420" class="form-control  mx-auto  " > </textarea>
        
      </div>
        <input value="{{auth()->user()->id}}" type="hidden" name="idUser">
        <input type="hidden" value="{{$evento->id}}" name="idEvento">
        <div class="col-6">

          <select class="form-select my-2  mx-auto text-center col-6" name="puntuacion" id="">
            <option value="1">Malo</option>
            <option value="2">Moderado</option>
            <option value="3">Bueno</option>
            <option value="4">Excelente</option>
            <option value="5">Glorioso</option>
          </select>
        </div>
      </div>
      <button  type="submit" class="btn btn-primary text-center d-block my-5 mx-auto ">Comentar</button>
    </form>

    <div style="height: 150px" class="overflow overflow-scroll">

      @endif
    @foreach ($opiniones as $opinion )
    @if ($opinion->idEventoComentario == $evento->id)
      
    
    <div style="height: 60px" class="row mx-auto pb-5  ">
      <div class="col-2 border text-center">
        <p>{{$opinion->name}}</p>
      </div>
      <div class="col-8 border text-center">
        <p> {{$opinion->comentario}} </p>
      </div>
      <div class="col-2 border text-center">
        <p class="text-center"> {{$opinion->puntuacion}} <i class="bi bi-star-fill text-warning" ></i> </p>
      </div>
    </div>
    
    @endif
   
    @endforeach

</div>
</div>


<div class="mx-auto d-block text-center">
    {{-- <button class="btn">

        <i class="bi bi-caret-left-fill fs-1"></i>
    </button>
    <button class="btn">

        <i class="bi bi-caret-right-fill fs-1"></i>
    </button> --}}
  

</div>
</div>

</div>
@endforeach


  {{-- <div id="lugaresconteneddor" class="animate__animated">

    <div class="container-lg  pb-5  bg-white mt-3 rounded">
      <span class="mb-3">
        <h2 class="text-center">Lugares</h2>
      </span>
      <div class="row bg-dark text-white rounded mx-3 mb-3 border-bottom border-2">
        <div class="col-sm-3 col-lg-2 ">
      <h3 class=" mb-2 text-center  rounded ps-2">Nombre</h4>
      </div>
      <div class="col-sm-9 col-lg-10 text-center ">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eos modi fuga dolorum numquam impedit itaque cupiditate culpa doloremque! Eius?</p>
      </div>
    </div>


    <div class="row bg-dark text-white mb-3     rounded mx-3">
      <div class="col-lg-2">
        <h4 class="d-inline-block text-center">Descripcion e Imagen</h4>
      </div>
      <div class="col-lg-6 ">
        <p class="d-inline-block   ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam qui veniam libero saepe voluptatibus dolorum voluptatum fuga voluptatem, assumenda quaerat voluptates, consequatur, aperiam obcaecati molestias totam asperiores a quis inventore ipsa! Asperiores reiciendis eius ut, esse ab atque nesciunt officiis?</p>
      </div>
      <div class="col-lg-4 ">
        <img src="/girardot.jpg" class="img-fluid border  color8 rounded m-1" alt="" srcset="">
      </div>

    </div>



    <div class="row bg-dark text-white mb-3   rounded mx-3">
    <h3 class="text-center mt-5  ">Opiniones</h3>
    <hr>
    <div class="row mx-auto pb-5 ">
      <div class="col-2 border text-center">
        <p>nombrelargouwu</p>
      </div>
      <div class="col-8 border text-center">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil unde quas ipsum commodi omnis et nesciunt, similique mollitia nam incidunt! Aspernatur itaque reprehenderit odit velit harum officiis reiciendis pariatur ducimus.</p>
      </div>
      <div class="col-2 border text-center">
        <p class="text-center"> 5 <i class="bi bi-star-fill text-warning" ></i> </p>
      </div>
    </div>

  </div>
  <div class="mx-auto d-block text-center">
    <button class="btn">

      <i class="bi bi-caret-left-fill fs-1"></i>
    </button>
    <button class="btn">

      <i class="bi bi-caret-right-fill fs-1"></i>
    </button>
  </div> --}}
</div>


</div>


</div>
<div style="margin-top: 20rem;" class="container-fluid mt-auto   color9 text-white mt-3 text-center">
  <p>TravelTime todos los derechos reservados</p>
  <i class="bi bi-facebook fs-1"> </i>
  <i class="bi bi-instagram fs-1"> </i>
  <i class="bi bi-youtube fs-1"> </i>
  <i class="bi bi-twitch fs-1"> </i>
  <i class="bi bi-whatsapp fs-1"> </i>
  <i class="bi bi-twitter fs-1"> </i>
  <i class="bi bi-snapchat fs-1"> </i>
  <i class="bi bi-steam fs-1"> </i>
  <i class="bi bi-microsoft fs-1"> </i>
  <i class="bi bi-microsoft-teams fs-1"> </i>
</div>

    <!--- Javascript  !--->
    <script  src="bootstrap.bundle.min.js" ></script>
    <script src="index.js"></script>


@endsection
