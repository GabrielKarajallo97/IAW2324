<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="refresh" content="60">
    <title>Fecha y Hora</title>
</head>
<body>

<?php
    // hora de España
    date_default_timezone_set('Europe/Madrid');
    //fecha y la hora actual
    $fechaHora = date('d/m/Y H:i:s');
    echo "<p>La fecha y hora actual en España es: $fechaHora</p>";
?>

</body>
</html>
