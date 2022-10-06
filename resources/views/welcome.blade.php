<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
  <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
  <title> @yield('titulo') </title>
</head>
<style>
   *{
    font-family: 'Oswald', sans-serif;
}
body{
    background-image: url(/girardot2.jpg);
    background-size: cover;
}
</style>
<body >

    {{-- @if(auth()->check())

    @if (auth()->user()->rol == "usuario")
<h1>USUARIO</h1>
    @endif

    @if(auth()->user()->rol == "admin")
    <h1>ADMIN</h1>
    @endif


    @endif --}}
    <div class="color9 border-nav   ">


        <a href="#" class="text-decoration-none">
            <img id="boton" src="/nav.png" class=" animate__animated color8 rounded" width="50rem" height="50rem" alt="" srcset="">
        </a>
        <span class="texto8 p-0 m-0 ms-2"> <a id="menu" class="text-decoration-none texto8" href="/index.html">
          TravelTime
      </a> </span> <span>



        @if (auth()->check())


        <form class="float-end pt-2 px-2" action="{{route('logout')}}" method="post">
            @csrf
            <button class="rounded" type="submit"> cerrar sesion </button>
        </form>
        @endif
<span class="text-white">

    @if(auth()->check())
    <a class="btn border border-white text-white text-decoration-none texto8 mx-2" href="{{route('verEventos')}} ">Ver eventos</a>
    @if (auth()->user()->rol == "admin")
            <a class="btn border text-white border-white text-decoration-none texto8 mx-2" href="{{route('gestionarEventos')}} ">Gestionar eventos</a>
    @endif
    <a class="btn border border-white text-white text-decoration-none texto8 mx-2" href="{{route('verEventos')}} ">Ver Lugares</a>

    <span class="float-end pt-2 px-2">

        {{ auth()->user()->name }}
    </span>


                @else

                <a class="float-end mt-2 text-decoration-underline mx-3 texto8    " href=" {{route('login')}} ">Log In</a>
                @endif

              </span>

        </div>



        <div id="contenedor" class="escondido animate__animated animate__backInDown  ">
            <div   class=" collapse  color7 animate__animated w-100 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 ms-1 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active text-dark " aria-current="page" href="{{ route('verEventos') }} ">Eventos <i class="bi bi-house"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Lugares Turisticos</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Girardot
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item text-dark" href="#">Historia</a></li>
                      <li><a class="dropdown-item text-dark" href="#">platos tipicos </a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-dark" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li>
                  </li>



                </ul>

            </div>

        </div>






        @yield('contenido')

        <script  src="/bootstrap.bundle.min.js" ></script>
        <script src="/index.js"></script>
</body>
</html>
