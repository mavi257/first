<?php
set_time_limit(0);
require 'PHPMailer-master/PHPMailerAutoload.php';
$user_name=$_POST['user_name'];
$user_email=$_POST['user_email'];
$user_message=$_POST['user_message'];
$final_message=$user_name."/".$user_email."/".$user_message;
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host =$mail->Host = gethostbyname('relay-hosting.secureserver.net');
$mail->Port = 25; // or 465
$mail->IsHTML(true);
$mail->Username = "info@merventalentzone.com";
$mail->Password = "Mervent@123";
$mail->SetFrom("info@merventalentzone.com");
$mail->Subject = "FeedBack";
$mail->Body = $final_message;
$mail->AddAddress("info@merventalentzone.com");
 if(!$mail->Send()) {
     echo "<pre>";
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 ?>