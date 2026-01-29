<?php

echo 'send email from google email' . '<br>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'brunoaco@gmail.com';
    $mail->Password = 'qomu csty rxve vfsi'; // OJO: NO es tu contraseña normal
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Datos del email
    $mail->setFrom('brunoaco@gmail.com', 'Nombre');
    $mail->addAddress('brunoaco@gmail.com');
    $mail->Subject = 'Prueba con Gmail y PHP';
    $mail->Body = 'Este es un correo enviado desde PHP usando Gmail.';

    $mail->send();
    echo "Correo enviado correctamente";
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}

?>