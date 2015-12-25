<?php

require_once('phpmailer/class.phpmailer.php');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$email = new PHPMailer();
$email->From      = $_POST['email'];
$email->FromName  = $_POST['name'];
$email->Subject   = '[Trabaja con nosotros] Hielo Freskito';
$email->Body      = $message;
$email->AddAddress( 'aj.alabarce@gmail.com' );

$file_to_attach = $_FILES['adjunto']['tmp_name'];

$email->AddAttachment( $file_to_attach , $_FILES['adjunto']['name'] );

$email->Send();

echo '<script>alert("Su mensaje ha sido enviado");location.href="http://www.walrussolutions.com/freskito"</script>';
die();

?>