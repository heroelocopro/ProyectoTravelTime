let star1 = document.getElementById('star1');
let star2 = document.getElementById('star2');
let star3 = document.getElementById('star3');
let star4 = document.getElementById('star4');
let star5 = document.getElementById('star5');
let puntuacioninput = document.getElementById('puntuacioninput');




  // document.querySelectorAll(".puntuacion").forEach(el => {
  // el.addEventListener("mouseover", e => {
  // const id = e.target.getAttribute("id");
  // let elemento = document.getElementById(id);


  // if(elemento.classList.contains('bi-star-fill') && elemento.id == "star4" && document.getElementById("star5").classList.contains('bi-star-fill') ){
  // elemento.classList.remove('bi-star-fill');
  // elemento.classList.add('bi-star');
  // }

  // if(elemento.classList.contains('bi-star') && elemento.id == "star5"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  //   el.classList.remove('bi-star');
  //   el.classList.add('bi-star-fill');
  // } )
  // }

  // else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star5"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  //   el.classList.remove('bi-star-fill');
  //   el.classList.add('bi-star');
  //   console.log('puntuacion 5');
  // });

  // }


  // // 4

  // if(elemento.classList.contains('bi-star-fill') && elemento.id == "star3" && document.getElementById("star4").classList.contains('bi-star-fill') ){
  // elemento.classList.remove('bi-star-fill');
  // elemento.classList.add('bi-star');
  // }


  // if(elemento.classList.contains('bi-star') && elemento.id == "star4"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  
  //   el.classList.remove('bi-star');
  //   el.classList.add('bi-star-fill');
  //   if(el.id == "star5"){
  //     el.classList.remove('bi-star-fill');
  //     el.classList.add('bi-star');
  //   }
  // } )
  // }

  // else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star4"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  //   el.classList.remove('bi-star-fill');
  //   el.classList.add('bi-star');
  // });
  // }


  // // 3

  // if(elemento.classList.contains('bi-star-fill') && elemento.id == "star2" && document.getElementById("star3").classList.contains('bi-star-fill') ){
  // elemento.classList.remove('bi-star-fill');
  // elemento.classList.add('bi-star');
  // }

  // if(elemento.classList.contains('bi-star') && elemento.id == "star3"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  
  //   el.classList.remove('bi-star');
  //   el.classList.add('bi-star-fill');
  //   if(el.id == "star4" || el.id == "star5"){
  //     el.classList.remove('bi-star-fill');
  //     el.classList.add('bi-star');
  //   }
  // } )
  // }

  // else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star3"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  //   el.classList.remove('bi-star-fill');
  //   el.classList.add('bi-star');
  // });
  // }


  // if(elemento.classList.contains('bi-star-fill') && elemento.id == "star1" && document.getElementById("star2").classList.contains('bi-star-fill') ){
  // elemento.classList.remove('bi-star-fill');
  // elemento.classList.add('bi-star');
  // }

  // if(elemento.classList.contains('bi-star') && elemento.id == "star2"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  
  //   el.classList.remove('bi-star');
  //   el.classList.add('bi-star-fill');
  //   if(el.id == "star3" || el.id == "star4" || el.id == "star5"){
  //     el.classList.remove('bi-star-fill');
  //     el.classList.add('bi-star');
  //   }
  // } )
  // }

  // else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star2"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  //   el.classList.remove('bi-star-fill');
  //   el.classList.add('bi-star');
  // });
  // }


  // if(elemento.classList.contains('bi-star') && elemento.id == "star1"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  
  //   el.classList.remove('bi-star');
  //   el.classList.add('bi-star-fill');
  //   if(el.id == "star2" || el.id == "star3" || el.id == "star4" || el.id == "star5"){
  //     el.classList.remove('bi-star-fill');
  //     el.classList.add('bi-star');
  //   }

  // } )
  // }

  // else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star1"){
  // document.querySelectorAll(".puntuacion").forEach(el => {
  //   el.classList.remove('bi-star-fill');
  //   el.classList.add('bi-star');

  // });

  // }

  // })
  // // este no
  // });

document.querySelectorAll(".puntuacion").forEach(el => {
  el.addEventListener("click", e => {
  const id = e.target.getAttribute("id");
  let elemento = document.getElementById(id);
  
  
  if(elemento.classList.contains('bi-star-fill') && elemento.id == "star4" && document.getElementById("star5").classList.contains('bi-star-fill') ){
  elemento.classList.remove('bi-star-fill');
  elemento.classList.add('bi-star');
  puntuacioninput.value = 4;
  }
  
  if(elemento.classList.contains('bi-star') && elemento.id == "star5"){
  document.querySelectorAll(".puntuacion").forEach(el => {
    el.classList.remove('bi-star');
    el.classList.add('bi-star-fill');
    puntuacioninput.value = 5;
  } )
  }
  
  else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star5"){
  document.querySelectorAll(".puntuacion").forEach(el => {
    el.classList.remove('bi-star-fill');
    el.classList.add('bi-star');
    console.log('puntuacion 5');
    puntuacioninput.value = 1;
  });
  
  }
  
  
  // 4
  
  if(elemento.classList.contains('bi-star-fill') && elemento.id == "star3" && document.getElementById("star4").classList.contains('bi-star-fill') ){
  elemento.classList.remove('bi-star-fill');
  elemento.classList.add('bi-star');
  puntuacioninput.value = 3;
  }
  
  
  if(elemento.classList.contains('bi-star') && elemento.id == "star4"){
  document.querySelectorAll(".puntuacion").forEach(el => {
   
    el.classList.remove('bi-star');
    el.classList.add('bi-star-fill');
    if(el.id == "star5"){
      el.classList.remove('bi-star-fill');
      el.classList.add('bi-star');
    }
    puntuacioninput.value = 4;
  } )
  }
  
  else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star4"){
  document.querySelectorAll(".puntuacion").forEach(el => {
    el.classList.remove('bi-star-fill');
    el.classList.add('bi-star');
    puntuacioninput.value = 1;
  });
  }
  
  
  // 3
  
  if(elemento.classList.contains('bi-star-fill') && elemento.id == "star2" && document.getElementById("star3").classList.contains('bi-star-fill') ){
  elemento.classList.remove('bi-star-fill');
  elemento.classList.add('bi-star');
  puntuacioninput.value = 2;
  }
  
  if(elemento.classList.contains('bi-star') && elemento.id == "star3"){
  document.querySelectorAll(".puntuacion").forEach(el => {
   
    el.classList.remove('bi-star');
    el.classList.add('bi-star-fill');
    if(el.id == "star4" || el.id == "star5"){
      el.classList.remove('bi-star-fill');
      el.classList.add('bi-star');
    }
    puntuacioninput.value = 3;
  } )
  }
  
  else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star3"){
  document.querySelectorAll(".puntuacion").forEach(el => {
    el.classList.remove('bi-star-fill');
    el.classList.add('bi-star');
    puntuacioninput.value = 1;
  });
  }
  
  
  if(elemento.classList.contains('bi-star-fill') && elemento.id == "star1" && document.getElementById("star2").classList.contains('bi-star-fill') ){
  elemento.classList.remove('bi-star-fill');
  elemento.classList.add('bi-star');
  puntuacioninput.value = 1;
  }
  
  if(elemento.classList.contains('bi-star') && elemento.id == "star2"){
  document.querySelectorAll(".puntuacion").forEach(el => {
   
    el.classList.remove('bi-star');
    el.classList.add('bi-star-fill');
    if(el.id == "star3" || el.id == "star4" || el.id == "star5"){
      el.classList.remove('bi-star-fill');
      el.classList.add('bi-star');
    }
    puntuacioninput.value = 2;
  } )
  }
  
  else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star2"){
  document.querySelectorAll(".puntuacion").forEach(el => {
    el.classList.remove('bi-star-fill');
    el.classList.add('bi-star');
    puntuacioninput.value = 2;
  });
  }
  
  
  if(elemento.classList.contains('bi-star') && elemento.id == "star1"){
  document.querySelectorAll(".puntuacion").forEach(el => {
   
    el.classList.remove('bi-star');
    el.classList.add('bi-star-fill');
    if(el.id == "star2" || el.id == "star3" || el.id == "star4" || el.id == "star5"){
      el.classList.remove('bi-star-fill');
      el.classList.add('bi-star');
    }
    puntuacioninput.value = 1;
  } )
  }
  
  else if(elemento.classList.contains('bi-star-fill') && elemento.id == "star1"){
  document.querySelectorAll(".puntuacion").forEach(el => {
    el.classList.remove('bi-star-fill');
    el.classList.add('bi-star');
    puntuacioninput.value = 1;
  });
  
  }
  
  })
  // este no
  });



  
  let contador = 1;
  function onKeyDownHandler(event) {

    var codigo = event.which || event.keyCode;

    console.log("Presionada: " + codigo);
     
    if(codigo === 13){
      console.log("Tecla ENTER");
    }

    if(codigo === 37){
      const Http = new XMLHttpRequest();
      let idEvento = document.getElementById('idEvento');
      
      let url="/eventos?page="+(contador-1);
      console.log(url);
      Http.open("GET",url);
      Http.send();
      Http.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            console.log(Http.responseText);
            }else{
              console.log(Http.responseText);
              contador++;
            }
        }
    }


    if(codigo === 39){
      const Http = new XMLHttpRequest();
      let idEvento = document.getElementById('idEvento');
      console.log(window.location.href);
      let url="/eventos?page="+(parseInt(contador)+1);
      console.log(url)
      console.log( parseInt(url[url.length-1])+1 );
      Http.open("GET",url);
      Http.send();
      Http.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
          // window.location.href = 'http://localhost:8000/eventos?page='+contador+1;
            }
        }
    }

    if(codigo >= 65 && codigo <= 90){
      console.log(String.fromCharCode(codigo));
    }
    }

   

    //  izq 37 der 39
