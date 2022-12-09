


// declaramos function limpiar para el filtro de inicio register
const limpiar = (ciudad) => {
    for (let i = ciudad.options.length; i >= 0; i--) {
        ciudad.remove(i);
    }
  };

  function departamentoCiudad(departamentoid,ciudadid)
  {
    // declaramos variables para el filtro departamento/ciudades de inicio
    const  departamentoRegistro = document.getElementById(departamentoid);
    const ciudadesRegistro = document.getElementById(ciudadid);
    const HttpRegistro = new XMLHttpRequest();
    let urlRegistro = "/departamento/"+departamentoRegistro.value;
    HttpRegistro.open("Get",urlRegistro);
    HttpRegistro.send();
    HttpRegistro.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            let respuestaFiltro = JSON.parse(HttpRegistro.response);
            // console.log(respuestaFiltro);
            limpiar(ciudadesRegistro);  
            for(let i = 0; i < respuestaFiltro.length; i++)
                {
                    let opcion =  document.createElement('option');
                    opcion.text = respuestaFiltro[i]['nombreCiudad']
                    opcion.value = respuestaFiltro[i]['id']
                    ciudadesRegistro.appendChild(opcion);
                };
        }
    }
  }

departamentoRegistro.onchange = () => {
    departamentoCiudad("departamentoRegistro","ciudadesRegistro");
}


// declaramos variables para el autocompletado de Update
const evento_id = document.getElementById('evento_id');
const nombreUpdate = document.getElementById('nombreUpdate');
const fechaInicioUpdate = document.getElementById('fechaInicioUpdate');
const fechaFinUpdate = document.getElementById('fechaFinUpdate');
const descripcionUpdate = document.getElementById('descripcionUpdate');
const imagenActualUpdate = document.getElementById('imagenActualUpdate');
const departamentoActual = document.getElementById('departamentoActual');
const ciudadActual = document.getElementById('ciudadActual');
const departamentosNuevoUpdate = document.getElementById('departamentosNuevoUpdate');
const ciudadesNuevoUpdate = document.getElementById('ciudadesNuevoUpdate');
const LugarActualUpdate = document.getElementById('LugarActualUpdate');

evento_id.onchange = () => {
    mostrarEventos();
}

mostrarEventos();
departamentoCiudad("departamentosNuevoUpdate","ciudadesNuevoUpdate");
function mostrarEventos()
{
    const HttpUpdate = new XMLHttpRequest();
    let urlUpdate = "/gestionarEventos/"+evento_id.value;
    HttpUpdate.open('GET',urlUpdate);
    HttpUpdate.send();
    HttpUpdate.onreadystatechange=function()
    {
        if(this.readyState==4 && this.status==200)
        {
            let respuestaUpdate = JSON.parse(HttpUpdate.response);
            nombreUpdate.value = respuestaUpdate['evento']['nombre'];
            descripcionUpdate.value = respuestaUpdate['evento']['descripcion'];
            fechaInicioUpdate.value = respuestaUpdate['evento']['fechaInicio'];
            fechaFinUpdate.value = respuestaUpdate['evento']['fechaFin'];
            imagenActualUpdate.setAttribute("src","img/"+respuestaUpdate['evento']['imagen']);
            departamentoActual.value = respuestaUpdate['evento']['departamento_id'];
            ciudadActual.value = respuestaUpdate['evento']['ciudad_id'];
            LugarActualUpdate.value = respuestaUpdate['lugar'][0]['nombre'];
            // creamos una peticion para obtener el departamento actual y la ciudad
            const HttpUpdate2 = new XMLHttpRequest();
            HttpUpdate2.open('GET','departamento/'+departamentoActual.value);
            HttpUpdate2.send();
            HttpUpdate2.onreadystatechange=function()
            {
                if(this.readyState==4 && this.status==200)
                {
                    let respuestaDepar = JSON.parse(HttpUpdate2.responseText);
                    departamentoActual.value = respuestaDepar[0]['departamentoNombre'];
                    for(let i = 0; i < respuestaDepar.length; i++)
                    {
                        if(respuestaDepar[i]['id'] == ciudadActual.value)
                        {
                            ciudadActual.value = respuestaDepar[i]['nombreCiudad'];
                        }
                    }

                }
            }

            departamentosNuevoUpdate.onchange = () =>
            {
                departamentoCiudad("departamentosNuevoUpdate","ciudadesNuevoUpdate");
            }
        }
    }
}


// departamentoRegister.onchange = () => {
//     deparciudades();
// } 
// deparciudades();
// function deparciudades()
// {
//     const Http3 = new XMLHttpRequest();
//     let url3="/ciudades/"+departamentoRegister.value;
//     Http3.open("GET",url3);
//     Http3.send();
//     Http3.onreadystatechange=function(){
//         if(this.readyState==4 && this.status==200)
//         {
//             let respuesta3 = JSON.parse(Http3.response);
//             console.log(respuesta3.length);
//            limpiar();
//             console.log(respuesta3.length);
//                 for(let i = 0; i < respuesta3.length; i++)
//                 {
//                     let opcion =  document.createElement('option');
//                     opcion.text = respuesta3[i]['nombreCiudad']
//                     opcion.value = respuesta3[i]['id']
//                     ciudades.appendChild(opcion);
//                 };
//         }
//     }
// };

// departamento2.onchange = () => {

//     deparciudades();
// } 
// deparciudades();
// function deparciudades()
// {
//     const Http3 = new XMLHttpRequest();
//     let url3="/ciudades2/"+departamento2.value;
//     Http3.open("GET",url3);
//     Http3.send();
//     Http3.onreadystatechange=function(){
//         if(this.readyState==4 && this.status==200)
//         {
//             let respuesta3 = JSON.parse(Http3.response);
//             console.log(respuesta3.length);
//            limpiar2();
//             console.log(respuesta3.length);
//                 for(let i = 0; i < respuesta3.length; i++)
//                 {
//                     let opcion =  document.createElement('option');
//                     opcion.text = respuesta3[i]['nombreCiudad']
//                     opcion.value = respuesta3[i]['id']
//                     ciudades2.appendChild(opcion);
//                 };
//         }
//     }
// };

// const limpiar = () => {
//     for (let i = ciudadesRegister.options.length; i >= 0; i--) {
//       ciudadesRegister.remove(i);
//     }
//   };

//   const limpiar2 = () => {
//     for (let i = ciudades2.options.length; i >= 0; i--) {
//       ciudades2.remove(i);
//     }
//   };

// const idEvento = document.getElementById('idEvento');





//     const Http = new XMLHttpRequest();
//     idEvento.onclick = () => {
//         console.log("idEventoclick")
//             let url="/gestionarEventos/"+idEvento.value;
//             let idciudad;
//             let idDepartamento;
//             Http.open("GET",url);
//             Http.send();
//             Http.onreadystatechange=function(){
//                     if(this.readyState==4 && this.status==200){
//                             let respuesta = JSON.parse(Http.response);          
//                                     //console.log(respuesta);
//                             nameFormUpdate.value = respuesta['nombre'];
//                             descripcionFormUpdate.value = respuesta['descripcion'];
//                             fechaInicioUpdate.value = respuesta['fechaInicio'];
//                             fechaFinUpdate.value = respuesta['fechaFin'];
//                             imgFormUpdate.setAttribute("src","img/"+respuesta['imagen']);
//                             idciudad =  ciudadActual.value = respuesta['ciudad_id'];
//                             const Http2 = new XMLHttpRequest();
//                             Http2.open('GET','/ciudades2/'+idciudad);
//                             Http2.send();
//                             Http2.onreadystatechange=function(){
//                                 if(this.readyState==4 && this.status==200)
//                                 {
//                                     let respuesta = JSON.parse(Http2.response); 
//                                     console.log(Http2.response);
//                                     ciudadActual.value = respuesta[0]['nombreCiudad'];
//                                 }
//                             }
//                             idDepartamento = departamentoActual.value = respuesta['departamento_id'];
//                             const Http5 = new XMLHttpRequest();
//                             Http5.open('GET','/ciudades/'+idDepartamento);
//                             Http5.send();
//                             Http5.onreadystatechange=function(){
//                                 if(this.readyState==4 && this.status==200)
//                                 {
//                                     let respuesta2 = JSON.parse(Http5.response); 
//                                     console.log(respuesta2);
//                                     departamentoActual.value = respuesta2['nombre'];
//                                 }
//                             }
//                         }
//                     }

//                 }
            