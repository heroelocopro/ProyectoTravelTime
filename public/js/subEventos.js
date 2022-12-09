// /mostrarSubEvento

const nombre = document.getElementById('nombreUpdate');
const descripcion = document.getElementById('descripcionUpdate');
const dia = document.getElementById('diaUpdate')
const horaInicio = document.getElementById('horaInicioUpdate');
const horaFinal = document.getElementById('horaFinalUpdate');
const foto = document.getElementById('fotoActualUpdate');
const evento = document.getElementById('evento_idActual');
const lugar = document.getElementById('lugar_idActual');
const subEvento = document.getElementById('subEvento_id');


subEvento.onclick = () => 
{
    mostrar();
}

const limpiar = (ciudad) => {
    for (let i = ciudad.options.length; i >= 0; i--) {
        ciudad.remove(i);
    }
  };

function mostrar()
{
    const Http  = new XMLHttpRequest();
    let url = "/mostrarSubEvento/"+subEvento.value;
    Http.open('GET',url);
    Http.send();
    Http.onreadystatechange = () =>
    {
        if(Http.readyState == 4 && Http.status == 200)
        {
            let respuesta = JSON.parse(Http.response);
            nombre.value = respuesta['nombre'];
            descripcion.value = respuesta['descripcion'];
            dia.value = respuesta['dia'];
            horaInicio.value = respuesta['horaInicio'];
            horaFinal.value = respuesta['horaFinal'];
            foto.setAttribute('src','img/'+respuesta['foto']);
            
                    let url2 = "/gestionarEventos/"+respuesta['idEvento'];
                    const Http2 = new XMLHttpRequest();
                    Http2.open('GET',url2);
                    Http2.send();
                    Http2.onreadystatechange = () => 
                    {
                        if(Http2.readyState == 4 && Http2.status == 200)
                        {
                            let respuesta2 = JSON.parse(Http2.response);
                            limpiar(evento);
                            let opcion =  document.createElement('option');
                            opcion.text = respuesta2['nombre'];
                            opcion.value = respuesta2['id'];
                            evento.appendChild(opcion);

                            let url3 = "/mostrarLugar/"+respuesta['idLugar'];
                            const Http3 = new XMLHttpRequest();
                            Http3.open('GET',url3);
                            Http3.send();
                            Http3.onreadystatechange = () => 
                            {
                                if(Http3.readyState == 4 && Http3.status == 200)
                                {
                                    let respuesta3 = JSON.parse(Http3.response);
                                    limpiar(lugar);
                            let opcion =  document.createElement('option');
                            opcion.text = respuesta3['nombre'];
                            opcion.value = respuesta3['id'];
                            lugar.appendChild(opcion);
                                }
                            }
                        }
                    }

        }
    }
    
}



