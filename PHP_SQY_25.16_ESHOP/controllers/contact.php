<?php

require_once("../view/contact.view.php");

include("config/dotenv.php");
//require_once("../config/php_mailer.php");

require_once("vendor/autoload.php");







// On utilise la classe PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $subject = htmlspecialchars($_POST['object']);
    $body = htmlspecialchars($_POST['message']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // On crée une instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = $mailhost;
            $mail->SMTPAuth = true;
            $mail->Username = $mailuser;
            $mail->Password = $mailpassword;
            $mail->SMTPSecure = $mailencrypt;
            $mail->Port = $smtpport;

            //Recipients
            $mail->setFrom($email);
            $mail->addAddress($mail->Username, 'Amoi');
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
            echo 'Message envoyé';

        } catch (Exception $e) {
            echo "Message erreur : {$mail->ErrorInfo}";
        }
    } else {
        $error = 'Assurez-vous que votre email est valide';
    }
}