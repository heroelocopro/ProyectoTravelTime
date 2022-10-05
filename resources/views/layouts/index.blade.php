@extends('welcome')
@section('titulo', 'Travel Time' )

@section('contenido')
<div id="eventoscontenedor" class="animate__animated ">

    <h1  class="text-4xl font-bold text-center pt-3">Eventos Culturales</h1>

    <div class="container-lg  pb-5  bg-white mt-3 rounded">
      <span class="mb-3">
        <h2 class="text-center invisible text-2xl">Eventos</h2>
      </span>
      <div class="row bg-dark shadow-sm text-white rounded-3 mx-3 mb-3 border-bottom border-2">
        <div class="col-sm-3 col-lg-2 ">
          <h3 class=" mb-2 text-center   rounded-3 py-3">Nombre</h4>
          </div>
          <div class="col-sm-9 col-lg-10 text-center ">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eos modi fuga dolorum numquam impedit itaque cupiditate culpa doloremque! Eius?</p>
          </div>
        </div>


        <div class="row bg-dark text-white mb-3     rounded mx-3">
          <div class="col-lg-2">
      <h4 class=" text-center py-3">Descripcion e Imagen</h4>
    </div>
    <div class="col-lg-6 ">
      <p class="d-inline-block   ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam qui veniam libero saepe voluptatibus dolorum voluptatum fuga voluptatem, assumenda quaerat voluptates, consequatur, aperiam obcaecati molestias totam asperiores a quis inventore ipsa! Asperiores reiciendis eius ut, esse ab atque nesciunt officiis?</p>
    </div>
    <div class="col-lg-4 ">
      <img src="/logo.png" class="img-fluid border  color8 rounded m-1" alt="" srcset="">
    </div>

  </div>

  <div class="row bg-dark text-white mb-3   rounded mx-3">
    <div class="col-lg-2">
      <h4  class="text-center py-3 decoration-wavy underline underline-offset-8 decoration-blue-300  ">Fecha y Mapa</h4>
    </div>
    <div class="col-lg-10 ">
      <p class="d-inline-block   ">
        <div class="row">
          <div class="col-6"><input class=" block mx-auto  text-black text-center select-none"  style="margin-top: 4rem;" type="date" name="fecha" id="fecha" class="form-control text-center fs-1 "  value="2019-08-09">  </div>
          <div class="col-6"><iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31828.2271277248!2d-74.7930811!3d4.31130895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f28ec54308e5f%3A0xad9e09275aa20260!2sGirardot%2C%20Cundinamarca!5e0!3m2!1ses!2sco!4v1661962427513!5m2!1ses!2sco"  class="rounded img-fluid  my-3" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
      </p>
    </div>
  </div>

  <div class="row bg-dark text-white mb-3   rounded mx-3">
    <h3 class="text-center my2-2 ">Opiniones</h3>
    <hr>
    <div class="row mx-auto pb-5 ">
      <div class="col-2 border text-center">
        <p class=" break-words " >nombrelargouwu</p>
          </div>
          <div class="col-8 border text-center">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil unde quas ipsum commodi omnis et nesciunt, similique mollitia nam incidunt! Aspernatur itaque reprehenderit odit velit harum officiis reiciendis pariatur ducimus.</p>
          </div>
          <div class="col-2 border text-center">
            <p class="text-center align-middle justify-center"> 5 <i class="bi bi-star-fill text-warning" ></i> </p>
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
      </div>
    </div>

  </div>

@endsection
