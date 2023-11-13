function calcularIMC() {
    
    var alturaCm = parseFloat(document.getElementById("altura").value);
    var masaKg = parseFloat(document.getElementById("masa").value);

  
    var alturaM = alturaCm / 100; 
    var imc = masaKg / (alturaM * alturaM);

    // Mostrar el resultado del IMC
    var resultado = "Tu IMC es " + imc.toFixed(2) + ". ";
    

    if (imc < 18.5) {
        resultado += "Peso inferior al normal.";
    } else if (imc < 24.9) {
        resultado += "Normal.";
    } else if (imc < 29.9) {
        resultado += "Peso superiro al normal.";
    } else {
        resultado += "Obesidad.";
    }

    // Mostrar el resultado en la página
    document.getElementById("resultado").innerHTML = resultado;
}