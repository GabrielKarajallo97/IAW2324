<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cuenta Regresiva para la Feria</title>
</head>
<body>

<?php
    // Fecha de inicio de la Feria de abril de 2023
    $fechaFeria = strtotime('2023-04-23');

    // Fecha actual
    $fechaActual = time();

    // Calcular la diferencia en segundos
    $diferenciaSegundos = $fechaFeria - $fechaActual;

    // Calcular la diferencia en días
    $diferenciaDias = floor($diferenciaSegundos / (60 * 60 * 24));

    // Mostrar el mensaje
    echo "<p>Faltan $diferenciaDias días para el inicio de la Feria de abril de 2023.</p>";
?>

</body>
</html>
