<?php
// Borrar las cookies que hicimos en cookies.php
setcookie("cookie1", "", time() - 3600, "/");
setcookie("cookie2", "", time() - 86400, "/");
setcookie("cookie3", "", time() - 604800, "/");

// Redirigir de nuevo a la página principal
header("Location: cookies.php");
?>;
