<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fecha y Hora</title>
</head>
<body>

<?php
    // Establecer la zona horaria a la de España
    date_default_timezone_set('Europe/Madrid');

    // Obtener la fecha y la hora actual
    $fechaHora = date('d/m/Y H:i:s');

    // Mostrar la fecha y la hora en español
    echo "<p>La fecha y hora actual en España es: $fechaHora</p>";
?>

</body>
</html>
