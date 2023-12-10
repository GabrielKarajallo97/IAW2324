function validarFormulario() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var email = document.getElementById('email').value;
    var dni = document.getElementById('dni').value;
    var pin = document.getElementById('pin').value;
    var pinRepetido = document.getElementById('pinRepetido').value;

  
    if (!nombre || !apellido || !email || !dni || !pin || !pinRepetido) {
        document.getElementById('errorMensaje').innerText = 'Todos los campos marcados con * son requeridos.';
        return false;
    }

  
         {
        document.getElementById('errorMensaje').innerText = 'El DNI debe contener solo números.';
        return false;
    }

 
    if (pin !== pinRepetido) {
        document.getElementById('errorMensaje').innerText = 'Los PINS no coinciden.';
        return false;
    }

    // Restablecer mensaje de error si todo está bien
    document.getElementById('errorMensaje').innerText = '';

    // Crear nombre de usuario
    var nombreUsuario = nombre.substring(0, 2) + apellido.substring(0, 2) + telefono.slice(-3);

    // Mostrar mensaje de éxito
    alert('Usuario creado con éxito. Nombre de usuario: ' + nombreUsuario);

    return false; 
}
