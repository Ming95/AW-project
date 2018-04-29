<?php
	include '../models/usuario.php';
	session_start();
  $username = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));

	if(!isset($_SESSION['intentos'])){
		$_SESSION['intentos'] = 0;
		$_SESSION["logged"]=false;
	}
	if(!isset($_SESSION['logged'])){
		$_SESSION["logged"]=false;
	}
//Si existe "intentos" y ya hecho 3 comprobaciones devolvemos el mensaje de error.
//Esta comprobación la hacemos aquí arriba porque si ya ha hecho 3 intentos ni siquiera hay que conectar a la BD
	if($_SESSION["logged"]==false and ($_SESSION['intentos'] >= 3)) {
		$_SESSION['intentos'] = 0;
		$_SESSION["logged"]=false;
		header('Location: ../index.php');
	}else{
		try{
			//Se crea el objeto usuario y se abre conexión
			$user = new Usuario();
			//Consultamos si existe el usuario
			$consulta = $user->getBy("id_correo",$username);
			//Cerramos la conexión tras realizar la consulta
			$user->closeConnection();
			//Generamos el hash de la password en claro
			$hash=SHA1($password);
			//Comparamos el nuevo hash con el existente en BBDD
			if($consulta!=null and hash_equals($hash,$consulta[0]['password']))
			{
				$_SESSION["logged"]	= true;
				$_SESSION['login'] = $consulta[0]['nombre'];
				$_SESSION['mail'] = $consulta[0]['id_correo'];
				$_SESSION['intentos'] = 0;
				header("Location:/index.php");
			} else {
				//Si la cuenta y/o contraseña es errónea sumamos 1 al número de intentos
				$_SESSION['intentos'] += 1;
				include '../views/login.php';
			}
		}catch (Exception $e) {
				error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
				$_SESSION['data_error']=$e->getMessage();
				header("Location:/errorpage.php");
		}
	}

?>
