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
	
	// Check if email has been entered and is valid
	if (!isset($_POST['tel'])) {
		$errors['tel'] = 'Por favor ingrese su telefono.';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['direc'])) {
		$errors['direc'] = 'Por favor ingrese su direccion.';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['pedido'])) {
		$errors['pedido'] = 'Por favor ingrese su pedido.';
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
	$tel = $_POST['tel'];
	$direc = $_POST['direc'];
	$pedido = $_POST['pedido'];
	$from = $email;
	$to = 'martohaiek@gmail.com';  // please change this email id
	$subject = 'Nuevo pedido';
	
	$body = "De: $name\n E-Mail: $email\n Teléfono: $tel\n Dirección: $direc\n Pedido: $pedido";


	//send the email
	$result = '';
	if ($a = mail ($to, $subject, $body)) {
		/*$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;*/
		echo '<script>alert("Su mensaje ha sido enviado");location.href="http://www.walrussolutions.com/freskito"</script>';
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Ha ocurrido un error. Intente de nuevo luego.';
	$result .= '</div>';

	echo $result;
	