<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Acceso</title>
    <link rel="stylesheet" href="/php/php3/ej2/style.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesion</h2>


    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>

        <button type="submit">Iniciar Sesión</button>
    </form>
    </div>
    
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

</body>
</html>


