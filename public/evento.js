const ubicacionFormUpdate = document.getElementById('ubicacionUpdate');
const descripcionFormUpdate = document.getElementById('descripcionUpdate');
const fechaFormUpdate = document.getElementById('fechaUpdate');
const nameFormUpdate = document.getElementById('nameUpdate');


const idEvento = document.getElementById('idEvento');
const Http = new XMLHttpRequest();
idEvento.onclick = () => {
    let url="/gestionarEventos/"+idEvento.value;
    Http.open("GET",url);
    Http.send();
    Http.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            let respuesta = JSON.parse(Http.response);
            let fecha = respuesta['fecha'];            
            console.log(respuesta);
            nameFormUpdate.value = respuesta['nombre'];
            descripcionFormUpdate.value = respuesta['descripcion'];
            fechaFormUpdate.value = fecha;
            ubicacionFormUpdate.value = respuesta['mapa'];
        }
    }
}


