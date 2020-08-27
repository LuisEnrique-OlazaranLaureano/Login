<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendEmail($paraUsuario, $subject, $message_body){

    $mail = new PHPMailer(true);                             
	try {
    $mail->isSMTP();                                    
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'GraphicToolsCorreo@gmail.com';               
    $mail->Password = 'P4p4ntl4**4';                          
    $mail->SMTPSecure = 'tls';                           
    $mail->Port = 587;                                    

    //Recipients
    $mail->setFrom('GraphicToolsCorreo@gmail.com', 'Bienvenido');
    $mail->addAddress($paraUsuario);

    $mail->isHTML(true);                                
    $mail->Subject = $subject;
    $mail->Body    = $message_body;

    $mail->send();
    echo 'Mensaje fue enviado';
    } catch (Exception $e) {
       echo 'Mensaje no puedo ser enviado. Mailer Error: ', $mail->ErrorInfo;
    }

}

?>