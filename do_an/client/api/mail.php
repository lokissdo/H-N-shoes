<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/POP3.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Create an instance; passing `true` enables exceptions
function sendMail($sub,$mess, $clientGmail){
$mail = new PHPMailer(false);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dohung2003php@gmail.com';                     //SMTP username
        $mail->Password   = 'hung2003hocphp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = "tls";
        $mail->CharSet="UTF-8";
    
        //Recipients
        $mail->setFrom('dohung2003php@gmail.com', 'Hung H&N Shop');
        $mail->addAddress($clientGmail);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body    = $mess;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        //echo 'Message has been sent';
        return 1;
    } catch (Exception $e) {
        return 0;
      //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}