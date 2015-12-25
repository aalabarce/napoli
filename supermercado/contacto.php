<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Por favor ingrese su nombre.';
	}
	
	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Por favor ingrese un email valido.';
	}
	
	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Por favor ingrese un mensaje.';
	}


	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = $email;
	$to = 'aj.alabarce@gmail.com';  // please change this email id
	$subject = 'Contacto Super Napoli';
	
	$body = "De: $name\n E-Mail: $email\n Mensaje:\n $message";


	//send the email
	$result = '';
	if ($a = mail ($to, $subject, $body)) {
		/*$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;*/
		echo '<script>alert("Su mensaje ha sido enviado");location.href="http://www.walrussolutions.com/supermercado"</script>';
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Ha ocurrido un error. Intente de nuevo luego.';
	$result .= '</div>';

	echo $result;
	