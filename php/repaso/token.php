<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Token</title>
</head>
<body>
    <h2>Generador de Token</h2>

    <?php
    // Generar una cadena de texto aleatoria de 32 bytes
    $random_bytes = random_bytes(32);

    // Convertir los bytes en una cadena hexadecimal
    $token = bin2hex($random_bytes);

    // Mostrar el token generado
    echo "<p>Token generado: $token</p>";
    ?>
</body>
</html>
