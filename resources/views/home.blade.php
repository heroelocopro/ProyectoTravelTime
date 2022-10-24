@extends('welcome')
@section('titulo','Inicio')
@section('contenido')
    
<style>
*{
    font-family: 'Oswald', sans-serif;
}
body{
    background-image: url(img2/img1.jpeg);
    background-size: cover;
}
</style>
<body >







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

        <div id="Introduccion" class="container mt-5">
        <div class="row ">
        <div class="col-12 col-lg-6">
            <span class="container-fluid fs-5  ">
                Girardot es un municipio colombiano del departamento de Cundinamarca ubicado en la Provincia del Alto Magdalena, de la cual es capital. Limita al norte con los municipios de Nariño y Tocaima, al sur con el municipio de Flandes y el río Magdalena, al oeste con el municipio de Nariño, el río Magdalena y el municipio de Coello y al este con el municipio de Ricaurte y el río Bogotá.
                <br>
                <br>
                La temperatura media anual es de 27.8 °C.4​ Está ubicado a 134 km al suroeste de Bogotá.
                <br>
                <br>
                Girardot es uno de los municipios más importantes del departamento de Cundinamarca por su población, centros de educación superior, economía y extensión urbana. También es una de las ciudades con más afluencia de turistas y población flotante del país.
            </span>
        </div>
        <div class="col-12 col-lg-6 ">
            <img class="img-fluid w-100 mt-auto" id="imgIntro" src="img2\girardot girardot.png" alt="">
        </div>
        </div>
        </div>

        <main>

            <div class="container__card">

                <div class="card__father">
                    <div class="card">
                        <div class="card__front" style="background-image: url(img2/img4.png);">
                            <div class="bg"></div>
                            <div class="body__card_front">
                                <h1>Aqui va eventos</h1>
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back">
                                <h1>Eventos</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ab quas recusandae voluptatum aliquid tempore animi corporis voluptas. Tempore neque iure necessitatibus voluptas nesciunt animi dolores incidunt delectus sapiente illum.</p>
                                <input type="button" value="Leer Más">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card__father">
                    <div class="card">
                        <div class="card__front" style="background-image: url(img2/img2.jpg);">
                            <div class="bg"></div>
                            <div class="body__card_front">
                                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, omnis.</h1>
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back">
                                <h1>Login o Register</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ab quas recusandae voluptatum aliquid tempore animi corporis voluptas. Tempore neque iure necessitatibus voluptas nesciunt animi dolores incidunt delectus sapiente illum.</p>
                                <input type="button" value="Leer Más">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card__father">
                    <div class="card">
                        <div class="card__front" style="background-image: url(img2/img3.jpg);">
                            <div class="bg"></div>
                            <div class="body__card_front">
                                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, omnis.</h1>
                            </div>
                        </div>
                        <div class="card__back">
                            <div class="body__card_back">
                                <h1>Lugares</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ab quas recusandae voluptatum aliquid tempore animi corporis voluptas. Tempore neque iure necessitatibus voluptas nesciunt animi dolores incidunt delectus sapiente illum.</p>
                                <input type="button" value="Leer Más">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </main>

@endsection