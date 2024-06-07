<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username = "akhansha38@gmail.com";
$mail->Password = "nagqsmqendutpwcj";

$mail->isHtml(true);

return $mail;
?>
