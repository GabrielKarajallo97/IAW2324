function validarFormulario(){
    
    //Acceder a los inputs requeridos en el html
    const valorNombre = document.getElementById('nombre').value;
    const valorApellido = document.getElementById('apellido').value;
    const valorCorreo = document.getElementById('correo').value;
    const valorDni = document.getElementById('dni').value;
    const valorPin = document.getElementById('pin').value;
    const valorPin2 = document.getElementById('pin2').value;

    //condicion para que aparezcan los mensajes de error
    if (valorNombre === '' || valorApellido === '' || valorCorreo === '' ||  valorDni === '' || valorPin === '' || valorPin2 === ''){
        const requeridos = document.getElementsByClassName('span');
        for (let i = 0; i < requeridos.length; i++) {
            requeridos[i].textContent = 'Este campo es obligatorio';
        }
    }
}