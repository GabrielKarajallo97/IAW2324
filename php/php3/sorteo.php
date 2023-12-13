<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>

<h1>Sorteo</h1>

<form action="sorteo.php" method="post">
    <label for="numParticipantes">Número de Participantes:</label>
    <input type="number" id="numParticipantes" name="numParticipantes" min="1" required>
    <input type="submit" value="Realizar Sorteo">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número de participantes desde el formulario
    $numParticipantes = $_POST['numParticipantes'];

    // Validar que el número de participantes es un entero positivo
    if (!is_numeric($numParticipantes) || $numParticipantes <= 0 || $numParticipantes != round($numParticipantes)) {
        echo "Por favor, introduce un número entero positivo.";
    } else {
        // Realizar el sorteo
        $numeroGanador = rand(1, $numParticipantes);

        // Mostrar el resultado del sorteo
        echo "<h2>¡Felicidades!</h2>";
        echo "<p>El número ganador del sorteo es: <strong>$numeroGanador</strong></p>";
    }
}
?>
</body>
</html>
