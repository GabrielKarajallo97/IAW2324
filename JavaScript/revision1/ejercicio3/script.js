function letraDNI(){
    const letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D",  "X",  "B",  "N",  "J",  "Z",  "S",  "Q", "V", "H", "L", "C", "K", "E"];
    const pArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9',  '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21'];

    const input = document.getElementById('numeroInicial');
    const inputValue = input.value;
    if(inputValue.length < 8 || inputValue.length > 8){
        console.log('Erro');
    } else {
        const resto = inputValue % 23;

        //console.log(letras[resto - 1]); Esto era por si el array de los numeros empezaba en 1
       const DNI = document.getElementById('dni'); 
       DNI.textContent = inputValue + letras[resto];
    }

}
