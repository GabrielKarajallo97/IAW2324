<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
</head>

<body>
    <form action="encuesta.php" method="post">
        <ul>
            <li>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="user_name" />
            </li>

            <li>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </li>
            <li>
                <label for="mail">Correo electrónico:</label>
                <input type="email" id="mail" name="user_mail" />
            </li>
            <li>
                <label for="tipo">Coche:</label>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Seat</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
            </li>
            <li>
                <label for="msg">Mensaje:</label>
                <textarea id="msg" name="user_message"></textarea>
            </li>
            <li>
                <label for="politica">Acepta las condiciones: </label>
                <input type="checkbox" id="fname" name="fname"><br>
            </li>
            <li>
                <button type="submit">Enviar</button>
            </li>
        </ul>
    </form>

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
</body>

</html>

