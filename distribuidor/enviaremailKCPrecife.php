<?php

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '/home/bitnami/mailTests/vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;
//Set the hostname of the mail server
$mail->Host = 'secure.emailsrvr.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'contato@riocoaching.com.br';
//Password to use for SMTP authentication
$mail->Password = 'AtualicontP&M@';
//Set who the message is to be sent from
$mail->setFrom('contato@riocoaching.com.br', 'Rio Coaching');
//Set an alternative reply-to address
$mail->addReplyTo('contato@riocoaching.com.br', 'Rio Coaching');
//Set who the message is to be sent to
$mail->addAddress('qemaisinstituto@gmail.com', '[Contato] Formação Kids Coaching - Recife');
$mail->AddBCC('pedromnbeltrao@gmail.com', 'Pessoa Nome 3'); # Cópia Oculta
//Set the subject line
$mail->Subject = '[Rio Coaching] Contato KCP para Recife';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = "<h2><strong>Entrar em contato com:</h2></strong><BR><strong>Cliente: </strong>" . $_POST['name'] . "<BR><strong>Telefone: </strong>" . $_POST['phone'] . "<BR><strong>Email:</strong> " . $_POST['email'];
//Replace the plain text body with one created manually
$mail->AltBody = 'Este é o corpo da mensagem de teste, somente Texto! \r\n :)';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'E-mail enviado com sucesso!';
}
