<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/welcome.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
  <title> @yield('titulo') </title>
</head>

<body style="background-image: url(img2/img1.jpeg);
background-size: cover; ">
    {{-- @if(auth()->check())

    @if (auth()->user()->rol == "usuario")
<h1>USUARIO</h1>
    @endif

    @if(auth()->user()->rol == "admin")
    <h1>ADMIN</h1>
    @endif


    @endif --}}
    <div id="nav" class= "border-nav   ">


        <a href="#" class="text-decoration-none">
            <img id="boton" src="img2/qiqi.gif" class=" animate__animated  rounded" width="50rem" height="50rem" alt="" srcset="">
        </a>
        <span class="texto8 p-0 m-0 ms-2"> <a id="menu" class="text-decoration-none texto8" href="/">
          TravelTime
      </a> </span> <span>



        @if (auth()->check())


        <form class="float-end pt-2 px-2" action="{{route('logout')}}" method="post">
            @csrf
            <button class="rounded" type="submit"> cerrar sesion </button>
        </form>
        @endif
<span class="text-white">

    <a class="btn border border-white text-white text-decoration-none texto8 mx-2" href="{{route('verEventos')}} ">Ver eventos</a>
    @if(auth()->check())
    @if (auth()->user()->rol == 2)
            <a class="btn border text-white border-white text-decoration-none texto8 mx-2" href="{{route('gestionarEventos')}} ">Gestionar eventos</a>
            <a class="btn border text-white border-white text-decoration-none texto8 mx-2" href="{{route('gestionarLugares')}} ">Gestionar Lugares</a>
            @endif
            <span class="float-end pt-2 px-2">
                {{ auth()->user()->name }}
            </span>
            @else
            <a class="float-end mt-2 text-decoration-underline mx-3 texto8    " href=" {{route('login')}} ">Log In</a>
            @endif
            <a class="btn border border-white text-white text-decoration-none texto8 mx-2" href="{{route('verLugares')}} ">Ver Lugares</a>

              </span>

        </div>



        @yield('contenido')

        <script  src="js/bootstrap.bundle.min.js" ></script>
        <script src="js/index.js"></script>
</body>
</html>
