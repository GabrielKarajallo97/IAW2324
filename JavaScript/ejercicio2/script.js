function convertidorEuro() {
    const amount = parseFloat(document.getElementById("amount").value);
    if (!isNaN(amount) && amount >= 0) {
        const euros = amount * 0.88; 
        document.getElementById("resultado").innerText = `Euros: ${euros.toFixed(2)}`;
    } else {
        document.getElementById("resultado").innerText = "Por favor, ingrese un valor numérico positivo.";
    }
}

function convertidorDolar() {
    const amount = parseFloat(document.getElementById("amount").value);
    if (!isNaN(amount) && amount >= 0) {
        const dollars = amount * 1.12;
        document.getElementById("resultado").innerText = `Dólares: ${dollars.toFixed(2)}`;
    } else {
        document.getElementById("resultado").innerText = "Por favor, ingrese un valor numérico positivo.";
    }
}