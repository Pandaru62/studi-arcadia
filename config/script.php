<?php

// Don't change this file unless you want to change e-mail sending config

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once '../vendor/autoload.php';
require_once 'config.php';

function sendMail($email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = PORT;
        $mail->setFrom(USERNAME, 'Arcadia Zoo');
        $mail->addAddress($email);
        $mail->addReplyTo(USERNAME, 'Arcadia Zoo');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = $message;

        if (!$mail->send()) {
            return "L'email n'a pas été envoyé. Veuillez réessayer.";
        } else {
            return "Message envoyé.";
        }
    } catch (Exception $e) {
        return "Mailer Error: " . $mail->ErrorInfo;
    }
}

function sendContactFormMail($userEmail, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = PORT;
        $mail->setFrom(USERNAME, 'Arcadia');
        $mail->addAddress(USERNAME); // sending from the zoo email address
        $mail->addReplyTo($userEmail, $userEmail); // can reply to the user directly through the submitted email
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message: " . $subject;
        $mail->Body = $message;
        $mail->AltBody = $message;

        if (!$mail->send()) {
            return "L'email n'a pas été envoyé. Veuillez réessayer.";
        } else {
            return "Message envoyé.";
        }
    } catch (Exception $e) {
        return "Mailer Error: " . $mail->ErrorInfo;
    }
}
