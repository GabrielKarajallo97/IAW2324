<?php
// URL del sitio web del que queremos descargar el contenido
$url = "https://nowkez.com/";

// Usamos file_get_contents para obtener el contenido remoto
$content = file_get_contents($url);

// Comprobamos si la solicitud fue exitosa
if ($content === false) {
    // Si la solicitud falla, mostramos un mensaje de error
    echo "No se pudo obtener el contenido de la URL: $url";
} else {
    // Si la solicitud fue exitosa, mostramos el contenido por pantalla
    echo $content;
}
?>
