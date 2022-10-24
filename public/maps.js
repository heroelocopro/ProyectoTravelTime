
var cusid_ele = document.getElementsByClassName('mapa');
for (var i = 0; i < cusid_ele.length; ++i) {
    var item = cusid_ele[i].textContent;  

    let nospaces = item.trim();
    let coordenadas = nospaces.replace(" ",',');

    coordenadas = coordenadas.replace('(','');
    coordenadas = coordenadas.replace(')','');
    coordenadas = coordenadas.replace('P','');
    coordenadas = coordenadas.replace('O','');
    coordenadas = coordenadas.replace('I','');
    coordenadas = coordenadas.replace('N','');
    coordenadas = coordenadas.replace('T','');
    let nuevo = coordenadas.split(',');
    console.log( "x = " + nuevo[0]);
    console.log("y = " + nuevo[1]);
    console.log("\n");

    // cusid_ele[i].innerHTML += `https://www.google.com/maps/place/4°18'16.3"N+74°48'11.1"W/@${nuevo[1]},${nuevo[0]},19.25z/data=!4m5!3m4!1s0x0:0xc3451a48c4605837!8m2!3d4.30453!4d-74.80307?hl=es`;

   let xd = `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d836.3915483313277!2d${nuevo[0]}!3d${nuevo[1]}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc3451a48c4605837!2zNMKwMTgnMTYuMyJOIDc0wrA0OCcxMS4xIlc!5e0!3m2!1ses!2sco!4v1666369839339!5m2!1ses!2sco" width='400' height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`;


   cusid_ele[i].innerHTML += xd;
}

// function iniciarMap(){
//     var coord = {lat:-34.5956145 ,lng: -58.4431949};
//     var map = new google.maps.Map(cusid_ele[i],{
//       zoom: 10,
//       center: coord
//     });
//     var marker = new google.maps.Marker({
//       position: coord,
//       map: map
//     });
// }


// let mapas = document.getElementsByClassName('mapa');

// mapas.forEach(mapa => {
//     let valores = [];
//     let valorcito = mapa.trim();
// let a = valorcito.replace(" ",',');
//     valores.push(a);
//     console.log(valores.length);
// });
// console.log(valores);
// let info = document.getElementById('map2').textContent;


// let valor = info.trim();
// let a = valor.replace(" ",',');
// console.log(a);

