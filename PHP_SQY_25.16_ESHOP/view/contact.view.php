<?php

include("../partials/header.php");


require "../config/php_mailer.php";
require '../vendor/phpmailer/src/Exception.php';
require '../vendor/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/src/SMTP.php';

// require_once("vendor/autoload.php");


require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST)) {

    //Load Composer's autoloader

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = SMTP_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = SMTP_USERNAME;                     //SMTP username
        $mail->Password = SMTP_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = SMTP_ENCRYPTION;            //Enable implicit TLS encryption
        $mail->Port = SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(SMTP_USERNAME, 'name');
        $mail->addAddress('recipientEmail', 'name');     //Add a recipient



        //Content
        //Set email format to HTML
        $mail->Subject = $_POST['object'];
        $mail->Body = $_POST['message'];

        $mail->send();
        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }



}


?>
<div class="wrapper">
    <form action="" method="post">
        <h1>Page de Contact</h1>
        <input type="email" name="email" placeholder="votre email">
        <input type="text" name="object" placeholder="Le sujet de votre mail">
        <textarea name="message" placeholder="votre message"></textarea>
        <input type="submit" name="submit">
    </form>
</div>

<?php
if (isset($error)): ?>
    <div class="error">
        <?= $error ?>
    </div>
    <?php
endif ?>






<?php
include("../partials/footer.php");

?>