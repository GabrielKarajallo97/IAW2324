<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["edad"];
    $mail = $_POST["genero"];
    $tipo = isset($_POST["lenguajes"]) ? $_POST["lenguajes"] : [];
    $msg = $_POST["opinion"];

    echo "<h2>Resumen Formulario:</h2>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Edad:</strong> $edad</p>";
    echo "<p><strong>Género:</strong> $genero</p>";
    echo "<p><strong>Lenguajes de programación favoritos:</strong> " . implode(", ", $lenguajes) . "</p>";
    echo "<p><strong>Opinión:</strong> $opinion</p>";
    exit(); // Detener la ejecución del resto del código
    }
?>