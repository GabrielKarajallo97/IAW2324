<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva de Habitación</title>
    <link rel="stylesheet" href="">
</head>
<body>
<h1>Formulario de Reserva de Habitación</h1>
<form action="reserva.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required><br>
        
        <label for="dia_entrada">Día de Entrada:</label><br>
        <input type="date" id="dia_entrada" name="dia_entrada" required><br>
        
        <label for="num_dias">Número de días:</label><br>
        <input type="number" id="num_dias" name="num_dias" min="1" required><br>
        
        <label for="tipo_habitacion">Tipo de Habitación:</label><br>
        <select id="tipo_habitacion" name="tipo_habitacion" required>
            <option value="simple">Simple (30€)</option>
            <option value="doble">Doble (50€)</option>
            <option value="triple">Triple (80€)</option>
            <option value="suite">Suite (100€)</option>
        </select><br>
        
        <input type="submit" value="Reservar">
    </form>
</body>

<?php
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $dia_entrada = $_POST['dia_entrada'];
    $num_dias = $_POST['num_dias'];
    $tipo_habitacion = $_POST['tipo_habitacion'];

    // Calcular el importe total de la reserva
    $precio_habitacion = 0;
    switch ($tipo_habitacion) {
        case 'simple':
            $precio_habitacion = 30;
            break;
        case 'doble':
            $precio_habitacion = 50;
            break;
        case 'triple':
            $precio_habitacion = 80;
            break;
        case 'suite':
            $precio_habitacion = 100;
            break;
    }
    $importe_total = $precio_habitacion * $num_dias;

    // Mostrar el resumen de la reserva
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellidos: $apellidos</p>";
    echo "<p>Email: $email</p>";
    echo "<p>DNI: $dni</p>";
    echo "<p>Día de Entrada: $dia_entrada</p>";
    echo "<p>Número de días: $num_dias</p>";
    echo "<p>Tipo de Habitación: $tipo_habitacion ($precio_habitacion € por día)</p>";
    echo "<p>Importe Total de la Reserva: $importe_total €</p>";

    // Mostrar la imagen de la habitación seleccionada
    $imagenes = ['<img src="hab0.jpg">', '<img src="hab1.jpg">', '<img src="hab2.jpg">', '<img src="hab3.jpg">'];

    switch ($tipo_habitacion) {
        case 'simple':
            echo $imagenes[0];
            break;
        case 'doble':
            echo $imagenes[1];
            break;
        case 'triple':
            echo $imagenes[2];
            break;
        case 'suite':
            echo $imagenes[3];
            break;
    }
?>


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
</html>
