<?php
	include '../models/usuario.php';
	session_start();
	$username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["psw2"])));
	$mail = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));

	if($password != $password2){
		$_SESSION['error'] = "las contraseñas no coinciden.";
		header("Location:/views/signup.php");
	}
	else{
		$user = new Usuario();
		if($user->getBy("id_correo",$mail)!=null){
			$_SESSION['error'] = "El email introducido ya existe.";
			header("Location:/views/signup.php");
		}
		else{
			//Crea usuario
			$user->setIdCorreo($mail);
			$user->setPassword($password);
			$user->setNombre($username);
			$user->setImagen('/images/user_icon.png');
			$user->setAdmin(0);
			$user->signupUser();
			$_SESSION["logged"]	= true;
			$_SESSION['login'] = $username;
			header("Location:/index.php");
		}
	}
?>
