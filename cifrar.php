<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifrar Texto</title>
</head>
<body>
    <h2>Cifrar Texto</h2>
    <form method="post">
        <textarea name="texto" rows="4" cols="50" placeholder="Ingrese el texto a cifrar"></textarea><br>
        <input type="submit" value="Cifrar">
    </form>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el texto enviado por el formulario
        $texto = $_POST['texto'];

        
        $sal = base64_encode(random_bytes(22));

        // Cifrar el texto utilizando la función crypt con la sal generada
        $texto_cifrado = crypt($texto, '$2a$10$' . $sal);

        // Mostrar el texto cifrado
        echo "<h3>Texto Cifrado:</h3>";
        echo "<p>$texto_cifrado</p>";
    }
    ?>
</body>
</html>
