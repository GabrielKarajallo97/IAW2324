<?php
// Verificamos si se ha enviado una URL a través del formulario
if (isset($_POST['url'])) {
    
    $url = $_POST['url'];

    //file_get_contents para obtener el contenido remoto de la URL
    $html = file_get_contents($url);

    //para encontrar direcciones de correo electrónico
    $pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';
    
    // Buscamos todas las coincidencias de direcciones de correo electrónico en el HTML
    if (preg_match_all($pattern, $html, $matches)) {
        // Mostramos las direcciones de correo electrónico encontradas
        echo "<h2>Direcciones de correo electrónico encontradas en $url:</h2>";
        echo "<ul>";
        foreach ($matches[0] as $email) {
            echo "<li>$email</li>";
        }
        echo "</ul>";
    } else {
        // Si no se encuentran direcciones de correo electrónico, mostramos un mensaje
        echo "<p>No se encontraron direcciones de correo electrónico en $url</p>";
    }
}
?>

<!-- Formulario para ingresar la URL -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="url">Ingresa la URL:</label><br>
    <input type="text" id="url" name="url" placeholder="https://www.ejemplo.com"><br>
    <input type="submit" value="Enviar">
</form>
