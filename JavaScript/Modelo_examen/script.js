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