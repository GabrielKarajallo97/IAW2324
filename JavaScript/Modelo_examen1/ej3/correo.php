<?php

require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $asunto = isset($_GET['asunto']) ? $_GET['asunto'] : '';
    $destinatario = isset($_GET['destinatario']) ? $_GET['destinatario'] : '';

    if (!empty($asunto) && !empty($destinatario)) {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("tucorreo@tudominio.com", "Tu Nombre");
        $email->setSubject($asunto);
        $email->addTo($destinatario, "Destinatario");
        $email->addContent("text/plain", "Este es el cuerpo del correo electrónico.");

        $sendgrid = new \SendGrid('TU_CLAVE_DE_API'); // Reemplaza con tu clave de API

        try {
            $response = $sendgrid->send($email);
            echo "Correo enviado exitosamente a $destinatario con el asunto: $asunto";
        } catch (Exception $e) {
            echo 'Error al enviar el correo: ', $e->getMessage(), "\n";
        }
    } else {
        echo "Error: Se requieren ambos parámetros 'asunto' y 'destinatario'.";
    }
} else {
    echo "Error: Se esperaba una solicitud GET.";
}
