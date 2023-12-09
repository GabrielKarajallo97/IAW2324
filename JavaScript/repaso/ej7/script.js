function comprobarNumero(){
    let numeroAleatorio =  Math.floor(Math.random() * 6);
    const valorInput = document.getElementById('input').value;
    const mesanje = document.getElementById('mensaje');
    console.log(numeroAleatorio);
    // if(valorInput > numeroAleatorio){
    //     mensaje.textContent = "El numero no puede ser mayor que 5"
    // }else if(valorInput < numeroAleatorio){
    //     mensaje.textContent = "El numero no puede ser menor que 1"
    // }else 
    if(valorInput != numeroAleatorio){
        mensaje.textContent = "No has acertado"
    }else{
        mensaje.textContent = "Bien!! Acertaste!!"
    }

}