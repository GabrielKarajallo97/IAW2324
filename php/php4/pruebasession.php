<?php
// Iniciar la sesión
session_start();

// Establecer una variable de sesión
$_SESSION['username'] = 'usuario';

// Obtener el ID de sesión
$sessionId = session_id();

// Mostrar el ID de sesión y la variable de sesión
echo "ID de sesión: $sessionId<br>";
echo "Nombre de usuario: " . $_SESSION['username'] . "<br>";

// Enlace para ir a otra página donde se mostrará la misma información
echo '<a href="pruebasession2.php">Ir a otra página</a>';
?>
