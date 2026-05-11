<?php

ini_set('display_errors', 1);

require_once 'phpmailer/class.phpmailer.php';
require_once 'phpmailer/class.smtp.php';

// SMTP CONFIG
$admin_email = "mayank.patel104@gmail.com";
$smtp_host = "smtp.hostinger.com";
$stmp_port = 587;
$smtp_user = "notifications@cloudswiftsolutions.com";
$smtp_password = "Cloud@112018";
$website_name  = "Cloudons";

// FORM DATA
$name         = "Mayank";
$email        = "mayankp@yopmail.com";
$mobile       = "09090909";
$req_message  = "Msg";

$subject = "Contact Inquiry";

// MESSAGE BODY
$message  = "";
$message .= "Name : " . $name . "<br />";
$message .= "Email : " . $email . "<br />";
$message .= "Contact : " . $mobile . "<br />";
$message .= "Message : " . $req_message . "<br />";

try {

    $mail = new PHPMailer(true);

    // SMTP SETTINGS
    $mail->IsSMTP();

    $mail->Host       = $smtp_host;
    $mail->Port       = $stmp_port;

    $mail->SMTPAuth   = true;

    $mail->Username   = $smtp_user;
    $mail->Password   = $smtp_password;

    // TLS
    $mail->SMTPSecure = 'tls';

    // OPTIONAL SSL FIX
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true
        )
    );

    // FROM
    $mail->From     = $smtp_user;
    $mail->FromName = $website_name;

    // TO
    $mail->AddAddress($admin_email);

    // REPLY TO
    $mail->AddReplyTo($email, $name);

    // EMAIL FORMAT
    $mail->IsHTML(true);

    // SUBJECT
    $mail->Subject = $subject;

    // BODY
    $mail->Body = $message;

    // ATTACHMENT
    /*
    if(isset($attachment) && $attachment != ""){
        $mail->AddAttachment($attachment);
    }
    */

    // SEND EMAIL
    if ($mail->Send()) {

        echo "Email Sent Successfully";

    } else {

        echo $mail->ErrorInfo;
    }

} catch (phpmailerException $e) {

    echo $e->errorMessage();

} catch (Exception $e) {

    echo $e->getMessage();
}

?>