function ocultarMostrar(id_circulo){
    const circulo = document.getElementById(id_circulo);
    //circulo.classList.toggle("none"); Esta forma me la explicaron pero tengo que entenderla mejor
     if(circulo.style.display == 'none'){
         circulo.style.display = ''
     }else{
         circulo.style.display = 'none'
     }
}