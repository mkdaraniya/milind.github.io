<?php

require("PHPMailer/class.phpmailer.php");
require("PHPMailer/class.smtp.php");
$mail = new PHPMailer(true); // create a new object
try{
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "daraniya.info@gmail.com";
$mail->Password = "Daraniya@123";
$mail->SetFrom("daraniya.info@gmail.com");
$mail->Subject = $_POST['subject'];
$mail->Body = "Name : ".$_POST['name']."Email : ".$_POST['email']."Message : ".$_POST['message'];
$mail->AddAddress("daraniya.info@gmail.com");

 if(!$mail->Send()) {
 	$result = [
    	"result" => false,
    ];
 } else {
    $result = [
    	"result" => true,
    ];
 }
}catch(phpmailerException $e){
	echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
 echo json_encode($result);
