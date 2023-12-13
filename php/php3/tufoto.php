<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Foto de Perfil</title>
</head>
<body>

<h1>Subir Foto de Perfil</h1>

<form action="tufoto.php" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre de Usuario:</label>
    <input type="text" id="nombre" name="nombre" required><br>

    <label for="foto">Seleccionar Foto:</label>
    <input type="file" id="foto" name="foto" accept="image/*" required><br>

    <input type="submit" value="Subir Foto">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario desde el formulario
    $nombre = $_POST['nombre'];

    // Procesar la imagen
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real o una imagen falsa
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            echo "Archivo es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }
    }

    // Verificar si el archivo ya existe
    if (file_exists($targetFile)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar el tamaño del archivo
    if ($_FILES["foto"]["size"] > 500000) {
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está establecido en 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        // Si todo está bien, intentar subir el archivo
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
            echo "<h1>Bienvenido, $nombre</h1>";
            echo "<img src='$targetFile' alt='Foto de Perfil'>";
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>
</body>
</html>
