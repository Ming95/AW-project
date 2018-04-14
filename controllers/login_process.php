<?php
	include '../models/usuario.php';
	session_start();
  $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
		//echo "Login correcto";
	var_dump($_SESSION['intentos']);
	$log = $_SESSION["logged"];
	var_dump($log);
	if(!isset($_SESSION['intentos'])) //Si no se ha creado "intentos" es que aún no ha hecho ningún intento, por tanto la creamos. 
		$_SESSION['intentos'] = 0; 
	else if(($log==false) and ($_SESSION['intentos'] >= 3)) { //Si existe "intentos" y ya hecho 3 comprobaciones devolvemos el mensaje de error. Esta comprobación la hacemos aquí arriba porque si ya ha hecho 3 intentos ni siquiera hay que conectar a la BD 
		//echo 'El usuario y/o pass son incorrectos.'; 
		$_SESSION['intentos'] = 0;
		//include '../index.php';
		$_SESSION["logged"]=false;
		header('Location: ../index.php');
		//echo"<a id="."logo-header"." href="."../index.php".">";
	}
	
	$user = new Usuario();
	$usuario =$user->getUser($username, $password);
	if($username==$usuario->getNombre();)
	{ 
		$_SESSION["logged"]	= true;
		$_SESSION['login'] = $usuario->getNombre(); 
		$_SESSION['intentos'] = 0; 
		include '../index.php';
		//header('Location: ../index.php');
		//echo 'Usuario logado'; 
	} else { //Si la cuenta y/o contraseña es errónea sumamos 1 al número de intentos 
		$_SESSION['intentos'] += 1; 
		include '../views/login.php';
		//header('Location: ../views/login.php');
	} 
	
	//else echo "error de login";
?>
