
const ubicacionFormUpdate = document.getElementById('ubicacionUpdate');
const descripcionFormUpdate = document.getElementById('descripcionUpdate');
const fechaFormUpdate = document.getElementById('fechaUpdate');
const nameFormUpdate = document.getElementById('nameUpdate');
const imgFormUpdate = document.getElementById('imgUpdate');
let opciones = document.querySelectorAll('.opciones');






const idLugar = document.getElementById('idLugar');





    const Http = new XMLHttpRequest();
    idLugar.onclick = () => {
        // console.log("idLugarClick");
            let url="/gestionarLugares/"+idLugar.value;
            Http.open("GET",url);
            Http.send();
            Http.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200){
                            let respuesta = JSON.parse(Http.response);
                                    //console.log(respuesta);
                            nameFormUpdate.value = respuesta['nombre'];
                            descripcionFormUpdate.value = respuesta['descripcion'];
                            imgFormUpdate.setAttribute("src","img/"+respuesta['imagen']);
                        }
                    }
                }
                

