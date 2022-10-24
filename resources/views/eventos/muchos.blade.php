<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center">Lugares</h1>
        <div class="col-12 border border-dark">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">imagen</th>
                    <th scope="col">ubicacion</th>
                    <th scope="col">Eventos</th>
                    <th scope="col">Eventos Imagen</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($lugares2 as $lugar)
                  <tr>
                    <th scope="row"> {{$lugar->id}} </th>
                    <td>{{$lugar->nombre}}</td>
                    <td> {{$lugar->descripcion}} </td>
                    <td> <img src="img/{{$lugar->imagen}}" alt="" class="img-fluid w-50"> </td>
                    <td class="mapa" id="map{{$lugar->id}}">
                        @foreach ($ubicacion2 as $a)
                        @if($a->id == $lugar->id)
                            
                            @php
                                echo $a->geo
                            @endphp
                            @endif
                        @endforeach
                    </td>
                    <td> 
                        @foreach ($lugarEvento as $b)
                        @foreach ($eventos2  as $evento )
                        @if ($b->idLugarTuristico == $lugar->id and $evento->id == $b->idEvento)
                        {{$evento->nombre}} <br>
                        @endif
                        @endforeach
                        @endforeach
                    </td>
                    <td>
                        @foreach ($lugarEvento as $b)
                        @foreach ($eventos2  as $evento )
                        @if ($b->idLugarTuristico == $lugar->id and $evento->id == $b->idEvento)
                        <img class="img-fluid w-50" src="img/{{$evento->imagen}}" alt="">
                        @endif
                        @endforeach
                        @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <h1 class="text-center">Eventos</h1>
        <div class="col-12 border border-dark">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">imagen</th>
                    <th scope="col">fecha inicio</th>
                    <th scope="col">fecha fin</th>
                    <th scope="col">Ciudad</th>
                    <td scope="col">Lugar</td>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($eventos2 as $evento )
                  <tr>
                    <th scope="row"> {{$evento->id}} </th>
                    <td>{{$evento->nombre}}</td>
                    <td> {{$evento->descripcion}} </td>
                    <td> {{$evento->imagen}} </td>
                    <td> {{$evento->fechaInicio}} </td>
                    <td> {{$evento->fechaFin}} </td>
                    <td>
                        @foreach ($ciudades2 as $ciudad)
                        @if ($evento->ciudades == $ciudad->id)
                        {{$ciudad->nombreCiudad}}
                    @endif   
                        @endforeach
                    </td>
                    <td> 
                        @foreach ($lugarEvento as $a)
                        @foreach ($lugares2 as $lugar)
                            @if ($a->idEvento == $evento->id and $lugar->id == $a->idLugarTuristico)
                            {{$lugar->nombre}}
                            @endif
                            @endforeach
                        @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>



</div>

<script type="module" src="maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>