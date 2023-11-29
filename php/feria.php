<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cuenta Regresiva para la Feria</title>
</head>
<body>

<?php
    
    $fechaFeria = strtotime('2023-04-23');//inicio de la feria

    $fechaActual = time();//te da la fecha actual

    $diferenciaSegundos = $fechaFeria - $fechaActual;

    // Calcular la diferencia en días
    $diferenciaDias = floor($diferenciaSegundos / (60 * 60 * 24));

    echo "<p>Faltan $diferenciaDias días para el inicio de la Feria de abril de 2023.</p>";

    echo = ~$fechaActual;
?>

</body>
</html>
