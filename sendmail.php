<?php
require_once 'phpmailer/PHPMailerAutoload.php';
include "connection.php";
$message = "";
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$req_message = $_POST['message'];
$subject = "Contact Inquiry";
$message .= "Name : ".$name."<br />";
$message .= "Email : ".$email."<br />";
$message .= "Contact : ".$mobile."<br />";
$message .= "Message : ".$req_message."<br />";
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->Port = $stmp_port;
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_user;
    $mail->Password = $smtp_password;
    $mail->addAddress($admin_email);
    $mail->setFrom($smtp_user, $website_name);
    $mail->AddReplyTo($smtp_user, $website_name);
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
    if(isset($attachment) && $attachment != ""){
        $mail->AddAttachment($attachment);
    }
    $mail->Send();
    echo "Email Sent";exit;
  } catch (phpmailerException $e) {
    echo $e->errorMessage();exit; //Pretty error messages from PHPMailer
  } catch (Exception $e) {
    echo $e->getMessage();exit; //Boring error messages from anything else!
  }