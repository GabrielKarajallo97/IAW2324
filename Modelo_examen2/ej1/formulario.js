function obligatorio(){
    let asunto = document.getElementById("asunto");
    let dni = document.getElementById("dni");
    let nombre = document.getElementById("nombre");
    let apellido1 = document.getElementById("apellido1");
    let fecha_nac = document.getElementById("fecha_nac");
    let telefono = document.getElementById("telefono");
    let domicilio = document.getElementById("domicilio");
    let codigo_postal = document.getElementById("codigo_postal");
    let municipio = document.getElementById("municipio");
    let oficina = document.getElementById("oficina");
    let informacion = document.getElementById("informacion");


    //comprobamos campo asunto, nombre, apellido1 y apellido2

    if (asunto.value === '') {
        setErrorfor(asunto, 'este campo no puede estar vacio');
    }
    else {  
        setSuccessFor(asunto);
    }

    if (nombre.value === '') {
        setErrorfor(nombre, 'este campo no puede estar vacio');
   }
   else {
       setSuccessFor(nombre);
   }
//validando dni, llamando a la funcion comprobacion
    if (dni.value === '') {
        setErrorfor(dni, 'este campo no puede estar vacio');
        }
    else {
        if (comprobacion(dni.value)){
            setSuccessFor(dni);
        }
        else {
            setErrorfor(dni, 'Introduce un dni válido')   
        }
    }

    if (apellido1.value === '') {
        setErrorfor(apellido1, 'este campo no puede estar vacio');
    }
    else {
        setSuccessFor(apellido1);
    }

    if (fecha_nac.value === '') {
        setErrorfor(fecha_nac, 'este campo no puede estar vacio');
    }
    else {
 
        setSuccessFor(fecha_nac);
    }
    
    if (telefono.value === '') {
        setErrorfor(telefono, 'este campo no puede estar vacio');
    }
    else {
 
        setSuccessFor(telefono);
    }

    if (domicilio.value === '') {
        setErrorfor(domicilio, 'este campo no puede estar vacio');
    }
    else {
 
        setSuccessFor(domicilio);
    }

    if (codigo_postal.value === '') {
        setErrorfor(codigo_postal, 'este campo no puede estar vacio');
    }
    else {
 
        setSuccessFor(codigo_postal);
    }

    if (municipio.value === '') {
        setErrorfor(municipio, 'elige un municipio');
    }
    else {
 
        setSuccessFor(municipio);
    }
    
    if (oficina.value === '') {
        setErrorfor(oficina, 'Elige una oficina');
    }
    else {
 
        setSuccessFor(oficina);
    }
    
    if (informacion.value === '') {
        setErrorfor(informacion, 'este campo no puede estar vacio');
    }
    else {
 
        setSuccessFor(informacion);
    }

    tamanoMaximo();
}

//funciones para arrojar mensajes de error en caso de estar el campo vacio

function setErrorfor(input, mensaje) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = mensaje;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    small.innerText = '';
    formControl.className = 'form-control.success'   
}
//Funcion comprobar dni generica
function comprobacion(dni) {
    var numero = dni.substr(0,dni.length-1);
    var letr = dni.substr(dni.length-1,1);
    numero = numero % 23;
    var letra='TRWAGMYFPDXBNJZSQVHLCKET';
    letra=letra.substring(numero,numero+1);
   if (letra!=letr.toUpperCase()) {
       return false;
           }
   else{
       return true;
    }
}
//muestra mensaje de error despues de darle al boton enviar si el archivo supera el tamaño.
function tamanoMaximo(){
    var archivo1 = document.getElementById("archivo1");
    var archivo2 = document.getElementById("archivo2");
    if (archivo1.files[0].size/1024 > 2048){
        setErrorfor (archivo1, 'el archivo supera el tamaño máximo')
    }
    if (archivo2.files[0].size/1024 > 2048){
        setErrorfor (archivo2, 'el archivo supera el tamaño máximo')
    }

}