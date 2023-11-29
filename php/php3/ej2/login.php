<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = htmlspecialchars($_POST["usuario"]);
    $contrasena = htmlspecialchars($_POST["contrasena"]);


    if ($usuario === "admin" && $contrasena === "H4CK3R4$1R") {
        echo "Acceso concedido";
    } else {
        echo "Acceso denegado";
    }
}
?>
