function convertidorEuro(){

    const input = document.getElementById('numero');
    const valor = input.value ;
    const euro = valor* 0.93;

    const span = document.getElementById('resultado_span')
    span.textContent = euro;
}

function convertidorDolar(){

    const input = document.getElementById('numero')
    const valor = input.value ;
    const dolar = valor* 1.08;

    const span = document.getElementById('resultado_span');
    span.textContent = dolar;
}

