<?php

require_once('phpmailer/class.phpmailer.php');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$email = new PHPMailer();
$email->From      = $_POST['email'];
$email->FromName  = $_POST['name'];
$email->Subject   = '[Trabaja con nosotros] Un Rincon De Napoli';
$email->Body      = $message;
$email->AddAddress( 'aj.alabarce@gmail.com' );

$file_to_attach = $_FILES['adjunto']['tmp_name'];

$email->AddAttachment( $file_to_attach , $_FILES['adjunto']['name'] );

$email->Send();

header('Location: http://www.walrussolutions.com/restaurante');
die();

?>