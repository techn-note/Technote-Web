<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
// app password: lqmv abdo mkpi bzhc
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["nome"];
    $lastName = $_POST["sobrenome"];
    $email = $_POST["email"];
    $info = $_POST["info"];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug    = SMTP::DEBUG_OFF;                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host         = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth     = true;                                   //Enable SMTP authentication
        $mail->Username     = 'detesteemail704@gmail.com
        ';                     //SMTP username
        $mail->Password     = 'lqmv abdo mkpi bzhc';                               //SMTP password
        $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port         = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('detesteemail704@gmail.com', "Technote");
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $info;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}