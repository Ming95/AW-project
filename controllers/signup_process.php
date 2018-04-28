<?php
	include '../models/usuario.php';
	session_start();
	$username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["psw2"])));
	$mail = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));
	//comprueba que las dos contrasenas coincidan
	if($password != $password2){
		$_SESSION['error'] = "las contraseñas no coinciden.";
		header("Location:/views/signup.php");
	}
	else{
		try{
			$user = new Usuario();
			if($user->getBy("id_correo",$mail)!=null){
				//comprueba que el email no este registrado
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
				//Registra el usuario en la base de datos
				$user->signupUser();
				//Inicia sesión con el nuevo usuario
				$_SESSION["logged"]	= true;
				$_SESSION['login'] = $username;
				$_SESSION['mail'] = $mail;
				header("Location:/index.php");
			}
			$user->closeConnection();
		}catch(Exception $e){
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		}
	}
?>
