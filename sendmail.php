<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP

$mail->Host       = 'server161.web-hosting.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'email@mynextsteps.co';                     //SMTP username
$mail->Password   = 'm}nnHbcVd1BP';                               //SMTP password

$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('email@mynextsteps.co', 'Nextsteps');

$mail->addAddress($reg_email);               //Name is optional


//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = 'Email Verfification';
$email_template = "
         <h2>You have create an account successfully</h2>
         <h4>Verify your email address using the below given Link</h4>
         <br><br>
         <a href='http://localhost/Nextsteps/verifyToken.php?token=$verifyToken'>Verification Link</a>
     ";

$mail->Body = $email_template;

$mail->send();
// echo 'Message has been sent';
