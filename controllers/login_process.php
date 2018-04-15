<?php
	include '../models/usuario.php';
	session_start();
  $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));

	//Si no se ha creado "intentos" es que aún no ha hecho ningún intento, por tanto la creamos.
	if(!isset($_SESSION['intentos'])){
		$_SESSION['intentos'] = 0;
		$_SESSION["logged"]=false;
	}
	if(!isset($_SESSION['logged'])){
		$_SESSION["logged"]=false;
	}

	if($_SESSION["logged"]==false and ($_SESSION['intentos'] >= 3)) { //Si existe "intentos" y ya hecho 3 comprobaciones devolvemos el mensaje de error. Esta comprobación la hacemos aquí arriba porque si ya ha hecho 3 intentos ni siquiera hay que conectar a la BD 
		$_SESSION['intentos'] = 0;
		$_SESSION["logged"]=false;
		header('Location: ../index.php');
	}

	$user = new Usuario();

	$consulta = $user->getBy("id_correo",$username);
	if($consulta!=null and ($consulta[0]['id_correo'] == $username) and ($consulta[0]['password'] == $password))
	{
		$_SESSION["logged"]	= true;
		$_SESSION['login'] = $consulta[0]['nombre'];
		$_SESSION['intentos'] = 0;
		header("Location:/index.php");
	} else {
		//Si la cuenta y/o contraseña es errónea sumamos 1 al número de intentos
		$_SESSION['intentos'] += 1;
		//header("Location:/views/login.php");
		include '../views/login.php';
	}

?>
