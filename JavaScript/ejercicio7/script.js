function generarNumeroAleatorio() {
    return Math.floor(Math.random() * 6); // Genera un número aleatorio entre 0 y 5
}

function comprobarAdivinanza() {
    var numeroAdivinanza = parseInt(document.getElementById("adivina").value);
    var numeroAleatorio = generarNumeroAleatorio();

    if (numeroAdivinanza >= 0 && numeroAdivinanza <= 5) {
        if (numeroAdivinanza === numeroAleatorio) {
            alert("¡Adivinaste el número! El número era " + numeroAleatorio);
        } else {
            alert("Lo siento, el número era " + numeroAleatorio + ". Inténtalo de nuevo.");
        }
    } else {
        alert("Por favor, ingresa un número entre 0 y 5.");
    }
}