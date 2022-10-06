@extends('welcome')
@section('titulo','Lugares')
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
<body class="color8">














  <div id="lugaresconteneddor" class="animate__animated">

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
</div>


</div>


</div>

    <!--- Javascript  !--->
    <script  src="/bootstrap.bundle.min.js" ></script>
    <script src="/index.js"></script>


@endsection

