<?php
if(isset($_GET['asunto']) && isset($_GET['destinatario'])) {
    $asunto = $_GET['asunto'];
    $destinatario = $_GET['destinatario'];
    
    if(isset($_POST['mensaje'])) {
        $mensaje = $_POST['mensaje'];
        $enviado = mail($destinatario, $asunto, $mensaje);
        
        if($enviado) {
            echo "El correo electrónico ha sido enviado correctamente a $destinatario con el asunto: $asunto";
        } else {
            echo "Error al enviar el correo electrónico.";
        }
    }
} else {
    echo "Por favor, proporciona un asunto y un destinatario en la URL.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enviar correo electrónico</title>
</head>
<body>
    <h2>Enviar correo electrónico</h2>
    <form method="post">
        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
