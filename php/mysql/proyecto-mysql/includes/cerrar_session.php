<?php
session_start();
// Destruir completamente la sesión
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión

// Redirigimos al usuario a la página de inicio de sesion
header("Location: ../index.php");
exit();
?>
