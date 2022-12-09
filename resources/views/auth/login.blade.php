<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: fixed;
        background-image: url(img2/img1.jpeg);
        background-size: cover;

    }
    #Login{
        width: ;
        height: 649px;
        background: #ecf0f3;
        box-shadow: 13px 13px 40px rgba(0, 0, 0, 0.774), -13px -13px 20px rgba(0, 0, 0, 0.774);
    }
    .wrapper {
    max-width: 350px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;

}

.logo {
    width: 80px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    background-color: #ff0034;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color: #039BE5;
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: #ff0034;
}

.wrapper a:hover {
    color: #ff0034;
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
}
h1 {
    text-shadow: 0px 0px 10px 10px black;
}
#Fondo-logo{
    font-family: 'Anton', sans-serif;
    width: 600px;
    height: 500px;
    position: absolute;
    top: 15%;
    left: 12.5%;
    margin: -25px 0 0 -25px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#logo{
    width: 40%;
    height: 35%;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px black,
    0px 0px 0px 5px white,
    8px 8px 15px black,
    -8px -8px 15px black;
}
 </style>

 <div class="container-fluid">
    <div class="row  ">
        <div id="" class="col-lg-8 col-auto d-none d-lg-block  ">
            <div id="Fondo-logo" class="container  d-flex flex-row  justify-content-center align-items-center ">
                <h1 class="text-center" style="font-size: 100px; text-shadow: 5px 5px 0px #ff0034;
                ;">
                    <img class="img-fluid" id="logo" src="img2/qiqi.gif" alt="">
                    <br>
                    TravelTime
                </h1>
            </div>
        </div>
        <div id="Login" class="  col-lg-4 min-vh-100  d-flex flex-row justify-center align-items-center ">
            <div class="wrapper   ">
                <div class="logo">
                    <img src="img2/qiqi.gif" alt="">
                </div>
                <div class="text-center mt-4 name">
                    Inicio De Sesion
                </div>
                <form method="POST" action="{{route('login')}}" class="p-3 mt-3">
                    @csrf
                    
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input type="text" name="email" id="userName" placeholder="Correo">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input type="password" name="password" id="pwd" placeholder="Contraseña">
                    </div>
                    <button class="btn mt-3">Login</button>
                </form>
                <div class="text-center fs-6">
                    <a href="#">olvidaste tu  contraseña?</a> o <a href="{{route('register')}}">no tienes cuenta?</a>
                </div>
            </div>
        </div>
    </div>
 </div>
 @include('sweetalert::alert')