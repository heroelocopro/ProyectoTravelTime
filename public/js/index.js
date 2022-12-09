// const contenedor = document.getElementById('navbarSupportedContent');
// const boton = document.getElementById('boton');
// const menu = document.getElementById('menu');
// const eventos = document.getElementById('eventoscontenedor');
// const lugares = document.getElementById('lugaresconteneddor');
// const btnLugares = document.getElementById('btnLugares');
// const btnEventos = document.getElementById('btnEventos');




// // btnEventos.onclick = () => {
// //     if(eventos.classList.contains('animate__backInLeft')){
// //         eventos.classList.remove('animate__backInLeft');
// //     }else{

// //         eventos.classList.add('animate__backInLeft');
// //     }
// // }


// // btnLugares.onclick = () => {
// //     if(lugares.classList.contains('animate__fadeIn')){
// //         lugares.classList.remove('animate__fadeIn');
// //     }else{

// //         lugares.classList.add('animate__fadeIn');
// //     }
// // }

// let estado = false;




// menu.onclick = () => {
//     if(menu.classList.contains('animate__pulse')){
//         menu.classList.remove('animate__pulse');
//     }

//         menu.classList.add('animate__pulse');


// };

// boton.onclick = () => {

//     boton.classList.add('animate__backOutLeft');
//     setTimeout( () => {
//         boton.classList.remove('animate__backOutLeft');
//         boton.classList.add('animate__backInLeft');
//     },100)
//     if(!estado){
//         estado =true;
//         if(contenedor.classList.contains('animate__backOutLeft')){
//             contenedor.classList.remove('animate__backOutLeft');
//         }
//         contenedor.classList.remove('collapse');
//         contenedor.classList.add('animate__backInDown');


//             contenedor.classList.add('invisible');

//         setTimeout( () => {
//             contenedor.classList.remove('invisible');
//         } , 675);
//     }else{
//         estado = false;
//         contenedor.classList.remove('animate__backInDown');
//         contenedor.classList.add('animate__backOutLeft');
//         setTimeout( () => {
//             contenedor.classList.add('invisible');
//             contenedor.classList.add('collapse');
//         } , 500);
//         contenedor.classList.remove('invisible');

//     }

// }
