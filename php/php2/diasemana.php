<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Día de la Semana</title>
</head>
<body>

<?php
    $diaSemana = date('N');
    // Mensaje según el día de la semana
    switch ($diaSemana) {
        case 1:
            $mensaje = "¡Hoy es lunes!";
            break;
        case 2:
            $mensaje = "¡Hoy es martes!";
            break;
        case 3:
            $mensaje = "¡Hoy es miércoles!";
            break;
        case 4:
            $mensaje = "¡Hoy es jueves!";
            break;
        case 5:
            $mensaje = "¡Hoy es viernes!";
            break;
        case 6:
            $mensaje = "¡Hoy es sábado!";
            break;
        case 7:
            $mensaje = "¡Hoy es domingo!";
            break;
        default:
            $mensaje = "¡Error al obtener el día de la semana!";
    }

    // Mostrar el mensaje
    echo "<p>$mensaje</p>";
?>

</body>
</html>
