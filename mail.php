<?php 
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = $_POST['tema'];
	$mensaje = "Nombre: ".$nombre." Email: ".$email." Mensaje: ".$_POST['mensaje'];

	if(mail('lucasdelfino2121@gmail.com', $asunto, $mensaje)){
		echo "Correo enviado";
	}

	header("Location:index.html");
 ?>