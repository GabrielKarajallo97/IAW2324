<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>

<h1>Sorteo</h1>

<form id="sorteoForm">
    <label for="numPremios">Número de Premios:</label>
    <input type="number" id="numPremios" name="numPremios" min="1" required><br>

    <label for="participantes">Participantes (separados por comas):</label>
    <textarea id="participantes" name="participantes" rows="4" cols="50" required></textarea><br>

    <button type="button" onclick="realizarSorteo()">Realizar Sorteo</button>
</form>

<div id="resultadoSorteo"></div>

<script>
function realizarSorteo() {
    const numPremios = document.getElementById('numPremios').value;
    const participantesStr = document.getElementById('participantes').value;

    // Validar que se haya ingresado un número de premios válido
    if (!isNumeric(numPremios) || numPremios <= 0 || numPremios != Math.floor(numPremios)) {
        alert("Por favor, introduce un número de premios válido (entero positivo).");
        return;
    }

    // Validar que se haya ingresado al menos un participante
    const participantes = participantesStr.split(',').map(participante => participante.trim());
    if (participantes.length === 0 || (participantes.length === 1 && participantes[0] === '')) {
        alert("Por favor, introduce al menos un participante.");
        return;
    }

    // Realizar el sorteo en el servidor
    const formData = new FormData();
    formData.append('numPremios', numPremios);
    formData.append('participantes', participantes.join(','));

    fetch('sortea2.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById('resultadoSorteo').innerHTML = result;
    })
    .catch(error => console.error('Error:', error));
}

function isNumeric(value) {
    return !isNaN(parseFloat(value)) && isFinite(value);
}
</script>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $numPremios = $_POST['numPremios'];
    $participantes = explode(',', $_POST['participantes']);

    // Validar que el número de premios es un entero positivo
    if (!is_numeric($numPremios) || $numPremios <= 0 || $numPremios != round($numPremios)) {
        echo "Por favor, introduce un número de premios válido (entero positivo).";
    } else {
        // Realizar el sorteo
        $ganadores = array_rand($participantes, min($numPremios, count($participantes)));

        // Mostrar el resultado del sorteo
        echo "<h2>¡Felicidades a los Ganadores!</h2>";
        echo "<ul>";
        if (is_array($ganadores)) {
            foreach ($ganadores as $ganador) {
                echo "<li>$participantes[$ganador]</li>";
            }
        } else {
            echo "<li>$participantes[$ganadores]</li>";
        }
        echo "</ul>";
    }
}
?>
</body>
</html>
