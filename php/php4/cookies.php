<?php
// Aqui realizamos las cokies con su nombre valor y usamos time() para darle un tiempo de validez
setcookie("cookie1", "valor1", time() + 3600, "/");  // Expira en 1 hora
setcookie("cookie2", "valor2", time() + 86400, "/"); // Expira en 1 día
setcookie("cookie3", "valor3", time() + 604800, "/"); // Expira en 1 semana


echo "<h2>Cookies establecidas:</h2>";
echo "Cookie 1: " . $_COOKIE['cookie1'] . "<br>";
echo "Cookie 2: " . $_COOKIE['cookie2'] . "<br>";
echo "Cookie 3: " . $_COOKIE['cookie3'] . "<br>";

// Enlace para "renovar" las cookies
echo '<a href="renovarcookies.php">Renovar cookies</a>';
?>;
