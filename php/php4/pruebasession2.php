<?php
// Iniciar la sesión
session_start();

// Obtener el ID de sesión
$sessionId = session_id();

// Mostrar el ID de sesión y la variable de sesión
echo "ID de sesión en otra página: $sessionId<br>";
echo "Nombre de usuario en otra página: " . $_SESSION['username'] . "<br>";

// Enlace para volver a la página anterior
echo '<a href="pruebasession.php">Volver a la página anterior</a>';
?>
