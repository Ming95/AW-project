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
	<title>Lista de incidencias | Administrador</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include './layout/head.php';
			require '../models/usuario.php';
			require '../models/usuarioIncidencia.php';
		try{
			$inc = new usuarioIncidencia();
			$incidencias = $inc->getLista();
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		}
			echo '<div id="main"><div id="listas"><ul>
						<li class="element"><a id="nactive" class="link" href="./userlist.php">Usuarios</a></li>
						<li class="element"><a id="nactive" class="link" href="./idealist.php">Ideas</a></li>
						<li class="element"><a id="active" class="link" href="./reportlist.php">Incidencias</a></li></ul></div>';
						/**/
			echo "<div id=blocklist><h1 id='listTitle'>Lista de incidencias</h1>";
	          $i =0;
	          while($i<count($incidencias)){
							$iddea = $incidencias[$i]["id_idea"];
							$id = $incidencias[$i]["id"];
	            $mail = $incidencias[$i]["id_correo"];
	            $nombre = $incidencias[$i]['nombre_idea'];
							$desc = $incidencias[$i]['comentario_incidencia'];

	            echo '<div class="fila">
									<a class="boton-formulario" href="../controllers/deleteIncidencia.php?id='.$id.'">Eliminar Incidencia</a>
									<a class="boton-formulario2" href="../views/infoIdea.php?id_idea='.$id.'">Ver Idea</a>
 										<p class= "nomusu">'.$nombre.'</p>
											<p class= "mailusu">'.$mail.'</p>
											<p class= "nomusu">'.$desc.'</p>';
										echo '</div>';
	            $i++;

	          }
	    echo '</div></div>';


			include './layout/foot_page.php';
	?>

</body>
</html>
