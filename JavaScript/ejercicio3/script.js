function letraDNI() {
    const dniNumber = document.getElementById("numerodni").value;
    if (dniNumber.length !== 8 || isNaN(dniNumber)) {
        document.getElementById("resultado").innerText = "El número de DNI debe tener 8 dígitos numéricos.";
        return;
    }

    const letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
    const numero = parseInt(dniNumber, 10);
    const resto = numero % 23;
    const letra = letrasDNI.charAt(resto);

    document.getElementById("resultado").innerText = `${dniNumber}${letra}`;
}