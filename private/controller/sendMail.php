<?php
    // use Email;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $contact = $_REQUEST["email"] ?? '';
    if ((new Email($contact))->getValid()) {

        $copy = $_REQUEST["copy"] ?? '';
        $message = $_REQUEST["message"] ?? '';
        
        $messageHtml = '<h3>Contact : ' . $contact . '</h3><p>' . $message . '</p>';
        $messageTxt = 'Contact : ' . $contact . '\n' . $message;

        $mail = new PHPMailer(TRUE);

        try {
            $mail->setLanguage('fr', '../private/PHPMailer/language/');

            //Server settings
            $mail->Debugoutput = 'error_log';
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                  // Enable verbose debug output
            $mail->isSMTP();                                        // Send using SMTP
            $mail->Host       = $smtp_host;                         // Set the SMTP server to send through
            $mail->SMTPAuth   = TRUE;                               // Enable SMTP authentication
            $mail->Username   = $smtp_id;                           // SMTP username
            $mail->Password   = $smtp_pw;                           // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = $smtp_port;                         // TCP port to connect to
        
            //Recipients
            $mail->setFrom($smtp_from, $smtp_name);
            $mail->addAddress($smtp_to);
            // $mail->addAddress('toto@titi.com', 'Toto');          // Add a recipient, Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            if ($copy == 'on') {$mail->addCC($contact);}
            // $mail->addBCC('bcc@example.com');
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name
        
            // Content
            $mail->isHTML(TRUE);                                    // Set email format to HTML
            $mail->Subject = $smtp_subject;
            $mail->Body    = $messageHtml;
            $mail->AltBody = $messageTxt;
        
            $mail->send();
            $statusMail = TRUE;
        } catch (Exception $e) {
            $statusMail = FALSE;
            error_log("L'email n'a pas pu être envoyé. PHPMailer Error: {$mail->ErrorInfo}");
        }
    } else {
        $statusMail = FALSE;
        error_log("PHP : Adresse email non valide.");
    }

    $resultSendMsg = json_encode([
        "statusMail" => $statusMail
    ]);

    echo($resultSendMsg);
