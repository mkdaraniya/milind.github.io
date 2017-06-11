<?php

require("PHPMailer/class.phpmailer.php");
require("PHPMailer/class.smtp.php");
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "mkdaraniya@gmail.com";
$mail->Password = "Kingof@2324";
$mail->SetFrom("mkdaraniya@gmail.com");
$mail->Subject = $_POST['subject'];
$mail->Body = "Name : ".$_POST['name']."Email : ".$_POST['email']."Message : ".$_POST['message'];
$mail->AddAddress("mkdaraniya@gmail.com");

 if(!$mail->Send()) {
 	$result = [
    	"result" => false,
    ];
 } else {
    $result = [
    	"result" => true,
    ];
 }
 echo json_encode($result);