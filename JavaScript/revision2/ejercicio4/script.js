function calcularImc(){
    const pesoId = document.getElementById('peso');
    const pesoValue = pesoId.value;
    
    const alturaId = document.getElementById('altura');
    const alturaValue = alturaId.value/100;
    
    const imc = pesoValue/Math.pow(alturaValue,2);

    const resultadoImc = document.getElementById('imcId');
    resultadoImc.textContent = ' ' +  imc.toFixed(1);

    const inferior = "Peso inferior al normal";
    const normal = "Peso normal";
    const superior = "Peso superior al normal";
    const obesidad = "Obesidad";

    if(imc < 18.5){
        document.getElementById('spanId').textContent = inferior;
    }else if(imc == 18.5 || imc < 25.0){
        document.getElementById('spanId').textContent = normal;
    }else if(imc == 25.0 || imc < 30.0){
        document.getElementById('spanId').textContent = superior;
    }else if(imc >= 30.0){
        document.getElementById('spanId').textContent = obesidad;
    }
}