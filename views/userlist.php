<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'] || !$_SESSION['admin'])	header("Location:/views/login.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/adminlists.css" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<link rel="shortcut icon" href="../images/icon.png" />
	<title>Lista de usuarios | Administrador</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include './layout/head.php';
			require '../models/usuario.php';
		try{
			$user = new Usuario();
			$user->load($_SESSION['mail']);
			$userlist = $user->getAll();
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		}
			echo '<div id="main"><div id="listas"><ul>
						<li class="element"><a id="active" class="link" href="./userlist.php">Usuarios</a></li>
						<li class="element"><a id="nactive" class="link" href="./idealist.php">Ideas</a></li>
						<li class="element"><a id="nactive" class="link" href="./reportlist.php">Incidencias</a></li></ul></div>';
						/**/
			echo "<div id=blocklist><h1 id='listTitle'>Lista de usuarios</h1>";
	          $i =0;
	          while($i<count($userlist)){
	            $mail = $userlist[$i]["id_correo"];
	            $nombre = $userlist[$i]['nombre'];

	            echo '<div class="fila"><a class="boton-formulario" href="../controllers/deleteUser.php?mail='.$mail.'">Eliminar Usuario</a>
 										<p class= "nomusu">'.$nombre.'</p>
											<p class= "mailusu">'.$mail.'</p>';
										if($userlist[$i]['admin']) echo "<p class='mailusu'>es administrador</p>";
										echo '</div>';
	            $i++;

	          }
	    echo '</div></div>';


			include './layout/foot_page.php';
	?>

</body>
</html>
