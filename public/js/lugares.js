
const ubicacionFormUpdate = document.getElementById('ubicacionUpdate');
const descripcionFormUpdate = document.getElementById('descripcionUpdate');
const fechaFormUpdate = document.getElementById('fechaUpdate');
const nameFormUpdate = document.getElementById('nameUpdate');
const imgFormUpdate = document.getElementById('imgUpdate');
const ubicacionUpdate = document.getElementById('ubicacionUpdate');
let opciones = document.querySelectorAll('.opciones');






let idLugar = document.getElementById('idLugar');
idLugar.onclick = () =>
{
    actualizar();
}

function actualizar()
{

    const Http2 = new XMLHttpRequest();
    console.log(idLugar.value);
    let url = "/mostrarLugar/"+idLugar.value;
    Http2.open("GET",url);
    Http2.send();
    Http2.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            let respuesta = JSON.parse(Http2.response);
            nameFormUpdate.value = respuesta['nombre'];
            descripcionFormUpdate.value = respuesta['descripcion'];
            imgFormUpdate.setAttribute("src","img/"+respuesta['imagen']);
            ubicacionUpdate.setAttribute("src",respuesta['ubicacion']);
        }
    }
    
}
    

// idLugar.onclick = () => {
//         const Http = new XMLHttpRequest();
//         console.log(idLugar.value);
//             let url = "/mostrarLugar/"+idLugar.value;
//             Http.open("GET",url);
//             Http.send();
//             Http.onreadystatechange=function(){
//                     if(this.readyState==4 && this.status==200){
//                             let respuesta = JSON.parse(Http.response);
//                                     //console.log(respuesta);
//                             imgFormUpdate.setAttribute("src","img/"+respuesta['imagen']);
//                             console.log(respuesta['imagen']);
//                         }
//                     }
//                 }
                

