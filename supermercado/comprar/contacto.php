<?php

	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['nameForm'])) {
		$errors['name'] = 'Por favor ingrese su nombre.';
	}
	
	// Check if email has been entered and is valid
	if (!isset($_POST['emailForm']) || !filter_var($_POST['emailForm'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Por favor ingrese un email valido.';
	}
	
	// Check if email has been entered and is valid
	if (!isset($_POST['telForm'])) {
		$errors['tel'] = 'Por favor ingrese su telefono.';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['direcForm'])) {
		$errors['direc'] = 'Por favor ingrese su direccion.';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['pedidoForm'])) {
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



	$name = $_POST['nameForm'];
	$email = $_POST['emailForm'];
	$tel = $_POST['telForm'];
	$direc = $_POST['direcForm'];
	$pedido = $_POST['pedidoForm'];
	$from = $email;
	$to = 'aj.alabarce@gmail.com';  // please change this email id
	$subject = 'Nuevo pedido';
	
	$body = "De: $name<br /> E-Mail: $email<br /> Teléfono: $tel<br /> Dirección: $direc<br /> $pedido";

	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	//send the email
	$result = '';
	if ($a = mail ($to, $subject, $body, $headers)) {
		/*$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! I will be in touch';
		$result .= '</div>';

		echo $result;*/
		echo '<script>alert("Su pedido ha sido enviado. Muchas Gracias!!");location.href="http://www.walrussolutions.com/supermercado/comprar/#/?form=success"</script>';
	}

	/*
	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Ha ocurrido un error. Intente de nuevo luego.';
	$result .= '</div>';
	*/

	echo $result;
	
