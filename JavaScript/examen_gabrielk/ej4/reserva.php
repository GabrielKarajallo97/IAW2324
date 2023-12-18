<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva de Habitación</title>
    <link rel="stylesheet" href="">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $tipoHabitacion = $_POST['tipo_habitacion'];
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaFin = $_POST['fecha_fin'];

    // Validar que los campos obligatorios no estén vacíos
    if (!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($dni) && !empty($tipoHabitacion)) {
        // Calcular el precio según el tipo de habitación
        $precio = 0;
        $imagen = '';

        switch ($tipoHabitacion) {
            case 'simple':
                $precio = 65;
                $imagen = 'hab0.png'; 
                break;
            case 'doble':
                $precio = 80;
                $imagen = 'hab0.jpg'; 
                break;
            case 'triple':
                $precio = 140;
                $imagen = 'hab2.jpg'; 
                break;
            case 'suite':
                $precio = 180;
                $imagen = 'hab3.jpg'; 
                break;
        }

         // Calcular la duración de la reserva en días
         $fechaInicioObj = new DateTime($fechaInicio);
         $fechaFinObj = new DateTime($fechaFin);
         $duracionReserva = $fechaInicioObj->diff($fechaFinObj)->days;

          // Calcular el precio total
        $precioTotal = $precio * $duracionReserva;


        // Mostrar el resumen de vuelta al usuario
        echo "<h2>Resumen de la Reserva</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Apellidos:</strong> $apellidos</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>DNI:</strong> $dni</p>";
        echo "<p><strong>Tipo de Habitación:</strong> $tipoHabitacion</p>";
        echo "<p><strong>Fecha de Inicio:</strong> $fechaInicio</p>";
        echo "<p><strong>Fecha de Fin:</strong> $fechaFin</p>";
        echo "<p><strong>Duración de la Reserva:</strong> $duracionReserva días</p>";
        echo "<p><strong>Precio por día:</strong> $precio €</p>";
        echo "<p><strong>Precio Total:</strong> $precioTotal €</p>";
        echo "<img src='$imagen' alt='Imagen de la habitación' width='300'>";

    } else {
        // Mensaje de error si faltan campos obligatorios
        echo "<p>Error: Todos los campos son obligatorios.</p>";
    }
} 
?>

<h1>Formulario de Reserva de Habitación</h1>
<form action="habitacion.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required><br>

    <label for="tipo_habitacion">Tipo de Habitación:</label>
    <select id="tipo_habitacion" name="tipo_habitacion" required>
        <option value="simple">Simple</option>
        <option value="doble">Doble</option>
        <option value="triple">Triple</option>
        <option value="suite">Suite</option>
    </select><br>
    <label for='fecha_inicio'>Fecha de Inicio:</label>
    <input type='date' id='fecha_inicio' name='fecha_inicio' required><br>

    <label for='fecha_fin'>Fecha de Fin:</label>
    <input type='date' id='fecha_fin' name='fecha_fin' required><br>
    <input type="submit" value="Reservar Habitación">
</form>

<style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
}
form {
    max-width: 100%;
    margin-top: 10px;
    text-align: left;
}

form label {
    display: inline-block;
    width: 300px; /* Ajusta el ancho según tu necesidad */
    text-align: left;
}

form input {
    margin-bottom: 10px; /* Espacio entre los campos de entrada */
    height: 20px;
    width: 200px;
}
</style>
</body>
</html>
