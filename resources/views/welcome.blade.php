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
        <link rel="stylesheet" href="css/Footer.css">
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
    <nav class="mb-5 pb-5">
       
        <div class="nav-fostrap">
          <ul>
            @if (auth()->check())
            <li> <button class="btn border-0 text-dark w-100" disabled>{{ auth()->user()->name }}</button> </li>
            @endif
            <li><a href="{{ route('home') }}">Home</a></li>
            @if (auth()->check() and auth()->user()->rol == 2)
            <li> <a href="{{ route('gestionarEventos') }}">Gestionar Eventos</a> </li>
            @endif
            <li><a href="{{ route('verEventos') }} ">Eventos</a></li>
            @if (auth()->check() and auth()->user()->rol == 2)
            <li> <a href="{{ route('gestionarLugares') }}">Gestionar Lugares</a> </li>
            @endif
            <li><a href="{{ route('lugares') }}">Lugares Turisticos</a></li> 
            @if (auth()->check())
                <form action="{{route('logout')}}" method="post">
                @csrf
                <li><button class="btn w-100 text-start text-decoration-underline" type="submit" class="visually-hidden" type="submit">Cerrar sesion</button></li>
                </form>
             @endif
          </ul>
        </div>
        <div class="nav-bg-fostrap">
        <div class="navbar-fostrap"> <img id="boton" src="img2/qiqi.gif" class="rounded-5 " alt="">
        </div>
        <h1 id="Texto-lg" class="">TravelTime</h1>

   
<span class="text-white">



          </span>
        </div>
      </nav>



        @yield('contenido')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <footer class="footer-section">
            <div class="container">
                <div class="footer-cta pt-5 pb-5">
                    <div class="row">
                        <div class="col-xl-4 col-md-4 mb-30">
                            <div class="single-cta">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="cta-text">
                                    <h4>Find us</h4>
                                    <span>1010 Avenue, sw 54321, chandigarh</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 mb-30">
                            <div class="single-cta">
                                <i class="fas fa-phone"></i>
                                <div class="cta-text">
                                    <h4>Call us</h4>
                                    <span>9876543210 0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 mb-30">
                            <div class="single-cta">
                                <i class="far fa-envelope-open"></i>
                                <div class="cta-text">
                                    <h4>Mail us</h4>
                                    <span>mail@info.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </footer>

        <script  src="js/bootstrap.bundle.min.js" ></script>
        <script src="js/index.js"></script>
        <script>
            $(document).ready(function(){
    $('.navbar-fostrap').click(function(){
      $('.nav-fostrap').toggleClass('visible');
      $('body').toggleClass('cover-bg');
    });
  });

        </script>
</body>
</html>
@include('sweetalert::alert')
