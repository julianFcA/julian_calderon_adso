<?php
    use PHPMailer\PHPMailer\src\PHPMailer;
    use PHPMailer\PHPMailer\src\SMTP;
    use PHPMailer\PHPMailer\src\Exception;



    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

            //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {

            // $mail ->SMTPOptions = array(
            //     'ssl' => array(
            //     'verify_peer' => false,
            //     'verify_peer_name' => false,
            //     'allow_self_signed' => true
            //     )
            // );

            
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'jfcalderona16@gmail.com';                     //SMTP username
            $mail->Password   = '*************';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('jfcalderona16@gmail.com', 'info SISTEMAS');
            $mail->addAddress('jailorduz@misena.edu.co', 'Jaime Luis'); //Add a recipient

            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            //Ruta de archivo adjunto
            // $mail ->addAttachment();
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reporte';
            $mail->Body    = ' Reporte de personas registradas con su respectivo estado<b>Gym zona 8/67!</b>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            echo 'Mensaje enviado con exito';

        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
?>