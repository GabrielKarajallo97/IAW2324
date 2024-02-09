<?php
// Limpiar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Prevenir el almacenamiento en caché en el lado del cliente
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirigir a otra página después de cerrar sesión
echo '<script>window.location.href = "../index.php";</script>';
exit();