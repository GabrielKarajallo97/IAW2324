function Circulos(id) {
    var circulo = document.getElementById(id);

    if (circulo.style.display === "none") {
        // Si el círculo está oculto, lo mostramos
        circulo.style.display = "inline-block";
    } else {
        // Si el círculo está visible, lo ocultamos
        circulo.style.display = "none";
    }
}