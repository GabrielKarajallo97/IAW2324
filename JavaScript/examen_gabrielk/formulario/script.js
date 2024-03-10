function validarFormulario(){
    var asunto = document.getElementById('asunto').value;
    let dni = document.getElementById('dni').value;
    let nombre = document.getElementById('nombre').value;
    let apellido1 = document.getElementById('apellido1').value;
    let apellido2 = document.getElementById('apellido2').value;
    let nacimiento = document.getElementById('nacimiento').value;
    let telefono = document.getElementById('telefono').value;
    let correo = document.getElementById('correo').value;
    let domicilio = document.getElementById('domicilio').value;
    let codigo = document.getElementById('codigo').value;
    let municipio = document.getElementById('municipio').value;
    let oficina = document.getElementById('oficina').value;
    let informacion = document.getElementById('informacion').value;

    if (!asunto) {
        document.getElementById('errorAsunto').textContent = 'Este campo es obligatorio';
    }
    if (!dni) {
        document.getElementById('errorDni').textContent = 'Este campo es obligatorio';
    }
    // else{
    //     validarDNI();
    // }
    if (!nombre) {
        document.getElementById('errorNombre').textContent = 'Este campo es obligatorio';
    }
    if (!apellido1) {
        document.getElementById('errorApellido1').textContent = 'Este campo es obligatorio';
    }
    if (!telefono) {
        document.getElementById('errorTelefono').textContent = 'Este campo es obligatorio';
    }
    if (!domicilio) {
        document.getElementById('errorDomicilio').textContent = 'Este campo es obligatorio';
    }
    if (!codigo) {
        document.getElementById('errorCodigo').textContent = 'Este campo es obligatorio';
    }
    if (!municipio) {
        document.getElementById('errorMunicipio').textContent = 'Este campo es obligatorio';
    }
    if (!oficina) {
        document.getElementById('errorOficina').textContent = 'Este campo es obligatorio';
    }
    if (!informacion) {
        document.getElementById('errorInformacion').textContent = 'Este campo es obligatorio';
    }

}

// function validarDNI(){
//     const letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D",  "X",  "B",  "N",  "J",  "Z",  "S",  "Q", "V", "H", "L", "C", "K", "E"];
//     const Array = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9',  '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21'];
//     if(dni.length < 9 || dni.length > 9){
//         console.log('Erro');
//     } else {
//         const resto = numero % 23;
//        const DNI = resto + letras[resto];
//     }

// }

