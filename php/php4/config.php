<?php
// Definición de constantes
define('UPLOAD_DIR', '/htdocs/php4/');
define('PDF_DIR', '/htdocs/php4/GABRIEL_KARAJALLO.pdf');
define('TEMP_DIR', '/htdocs/php4/bizarp.jpg');

// Definición de variables
$appName = 'Mi Aplicación Web';
$version = '1.0';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de la Aplicación</title>
</head>
<body>

<h1>Configuración de la Aplicación</h1>

<?php
// Incluir el archivo config.php
include 'config.php';

// Mostrar las constantes y variables definidas en config.php
echo "<p>Directorio de subida de imágenes: " . $UPLOAD_DIR . "</p>";
echo "<p>Directorio donde se almacenan PDFs: " . $PDF_DIR . "</p>";
echo "<p>Carpeta temporal: " . TEMP_DIR . "</p>";
echo "<p>Nombre de la aplicación: " . $appName . "</p>";
echo "<p>Versión de la aplicación: " . $version . "</p>";
?>

</body>
</html>
