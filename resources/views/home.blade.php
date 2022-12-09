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
<link rel="stylesheet" href="css/welcome.css">
<body >







        
      

        <div id="Introduccion" class="container mt-5">
        <div class="row ">
        <div class="col-12 col-lg-6 ">
            <span class=" fs-5 d-flex ">
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
            <img class="img-fluid w-100 mt-auto mx-auto" id="imgIntro" src="img2\girardot girardot.png" alt="">
        </div>
        </div>
        </div>

        <div class="container__card mt-4 mb-4">

            <div class="card__father">
                <div class="card">
                    <div class="card__front" style="background-image: url(img2/img4.png);">
                        <div class="bg"></div>
                        <div class="body__card_front">
                            <h1>Eventos</h1>
                        </div>
                    </div>
                    <div class="card__back">
                        <div class="body__card_back">
                            <h1>Eventos</h1>
                            <p>Aqui puedes ir a ver los Eventos que se realizan en el municipio de Girardot.</p>
                            <a href="{{ route('verEventos') }}"><input type="button" value="Ir a Eventos"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card__father">
                <div class="card">
                    <div class="card__front" style="background-image: url(img2/img2.jpg);">
                        <div class="bg"></div>
                        <div class="body__card_front">
                            <h1>Login o Register</h1>
                        </div>
                    </div>
                    <div class="card__back">
                        <div class="body__card_back">
                            <h1>Login o Register</h1>
                            <p>Aqui puede Iniciar Sesion o Registrarse</p>
                            <a href="login"><input type="button" value="Iniciar Sesion"></a>
                            <h4>o</h4>
                            <a href="register"><input class="mt-1" type="button" value="Registrarse"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card__father">
                <div class="card">
                    <div class="card__front" style="background-image: url(img2/img3.jpg);">
                        <div class="bg"></div>
                        <div class="body__card_front">
                            <h1>Lugares Turisticos</h1>
                        </div>
                    </div>
                    <div class="card__back">
                        <div class="body__card_back">
                            <h1>Lugares</h1>
                            <p>Aqui puedes ir a ver los Lugares Turisticos de el municipio de Girardot.</p>
                        <form action="">
                            <a href="{{ route('lugares') }}"><input type="button" value="Ir a Lugares"></a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

@endsection