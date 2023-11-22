<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function sendEmail($to, $subject, $message) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug    = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host         = 'smtp.gmail.com';
            $mail->SMTPAuth     = true;
            $mail->Username     = 'detesteemail704@gmail.com';
            $mail->Password     = 'lqmv abdo mkpi bzhc';
            $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port         = 465;

            //Recipients
            $mail->setFrom('detesteemail704@gmail.com', "Technote");
            $mail->addAddress($to);
            //$mail->addAddress('ellen@example.com');
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            //Content
            //$mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            //$assinatura = '<p><hr>Atenciosamente,<br>Equipe Technote.</p>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            //$mail->msgHTML($mail->Body . $assinatura);

            $mail->send();
            
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["nome"];
        $lastName = $_POST["sobrenome"];
        $email = $_POST["email"];
        $empresa = $_POST["empresa"];
        $contato = $_POST["phone"];
        $info = $_POST["info"];
        
        //email pra mim mesmo
        $assuntoContatoRecebido = "Novo contato recebido";
        $contato = "Uma nova mensagem de: \nNome: $name $lastName \nEmail: $email \nContato: $contato \nEmpresa: $empresa \nMensagem: $info";
        sendEmail('detesteemail704@gmail.com', $assuntoContatoRecebido, $contato);
        
        //email resposta
        $respostaEmail = "Contato equipe Technote";
        $respostaCorpo = "Olá $name, obrigado por entrar em contato. Sua mensagem foi recebida com sucesso e em breve entraremos em contato. \n\nEquipe Technote.";
        sendEmail($email, $respostaEmail, $respostaCorpo);
    
        echo '<script>alert("E-mails enviados com sucesso!");</script>';
    }
?>