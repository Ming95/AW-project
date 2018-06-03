<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:./login.php");
?>
<head>
  <meta charset="utf-8">
	<link rel="shortcut icon" href="../images/icon.png" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/formulario.css" />

  <title>Mi perfil</title>
</head>
<body>
<?php
		include './layout/head.php';
		require '../models/usuario.php';
		require '../models/ideaslist.php';
		require '../models/comentario.php';
		require '../models/idea.php';
		require '../models/usuarioIncidencia.php';
try{
		$user = new Usuario();
		$user->load($_SESSION['mail']);
		$misideas = new IdeasList();
		$misideas->perfil($user->getIdCorreo());
		$aportaciones = $user->aportaciones();
		$eventos = $user->eventos();
		$comentario = new Comentario();
		$comentarios= $comentario->getListaUsuario($user->getIdCorreo());

}catch(Exception $e){
	error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
	$_SESSION['data_error']=$e->getMessage();
	header("Location:/errorpage.php");
}
?>

  <!--Datos de usuario-->
  <div class="profile-settings">

      <div class="user_data">
          <img id="user_img" alt="imagen por defecto de los usuarios" src ="/images/usuario.jpg">

					<p class="data" >Correo: <?php echo $user->getIdCorreo(); ?></p>
          <p class="data" >Nombre: <?php echo $user->getNombre(); ?> <a class="pricon" href="./cambiarPersonalInfo.php"><i class="fas fa-user-edit"></i></a></p>

      </div>

      <div class="change">
          <div class="bottons">
            <input type="submit" class="boton-formulario2" id="modificarPass" value="MODIFICAR CONTRASEÑA" onclick = "location='cambiarPass.php'"/>
          </div>

      <?php
          if($user->isAdmin()){
              echo'<div class="bottons">';
                  echo'<input type="submit" class="boton-formulario" value="PANEL DE ADMISTRADOR" onclick = "location.href=\'../views/idealist.php\'"/>';
              echo'</div>';
        	}
        ?>
    </div>
      <div class="lista-perfil">
      <h1>Mis Ideas</h1>
          <?php

            $idealist = $misideas->getList();
            $top = count($idealist);
            if($top == 0){
                echo' <p>Todavia no has creado ninguna idea.</p>';
            }else{
                $i =0;
                while($i < $top){
                    $nombre = $idealist[$i]['nombre_idea'];
                    $precio = $idealist[$i]['importe_solicitado'];
                    $recaudado = $idealist[$i]['recaudado'];
                    $id = $idealist[$i]['id_idea'];
                    echo '<a class="links" href="../views/infoIdea.php?id_idea='.$id.'">';
                    echo '<div class="fila-perfil">';
                        echo '<div class ="texto-dato">';
                            echo'<h3>'. $nombre.'</h3>';
                            echo'<p>Recaudado: '. $recaudado. '€ / '. $precio .'€</p>';
                        echo'</div>';
                    echo'</div></a>';
                    $i++;
                }
            }
          ?>
    </div>

  <!--Ideas a las que he aportado-->
  <div class="lista-perfil">
      <h1>Mis Aportaciones</h1>

      <?php
        $top = count($aportaciones);
        if($top == 0){
            echo' <p>Todavia no has hecho ninguna aportación.</p>';
        }else{
            $i =0;
            while($i < $top){
                $nombre = $aportaciones[$i]['nombre_idea'];
                $precio = $aportaciones[$i]['aportado'];
                $id= $aportaciones[$i]['id_idea'];
                echo '<a class="links" href="../views/infoIdea.php?id_idea='.$id.'">';
                    echo '<div class="fila-perfil">';
                        echo '<div class ="texto-dato">';
                            echo'<h3>'. $nombre.'</h3>';
                            echo'<p>Has contribuído con '. $precio. '€ al proyecto</p>';
                        echo'</div>';
                echo'</div></a>';
                $i++;
            }
        }

        ?>
  </div>

  <!--eventos-->
  <div class="lista-perfil">
    <h1>Próximos Eventos</h1>
    <?php
            $top = count($eventos);
            if($top == 0){
                echo' <p>Todavia no te has suscrito a ningún evento</p>';
            }else{
                $i =0;
                while($i < $top){
                    $nombre = $eventos[$i]['nombre'];
                    $fecha = $eventos[$i]['fecha'];
                    $id = $eventos[$i]['id'];

                    echo '<a class="links" href="../views/infoevento.php?id_evento='.$id.'">';
                        echo '<div class="fila-perfil">';
                            echo '<div class ="texto-dato">';
                                echo'<h3>'. $nombre.'</h3>';
                                echo'<p>'. $fecha. '</p>';
                            echo'</div>';
                    echo'</div></a>';
                    $i++;
                }
            }

          ?>
  </div>
	<!--Ideas a las que he aportado-->
	<div class="lista-perfil">
			<h1>Mis Comentarios</h1>

			<?php
				$top = count($comentarios);
				if($top == 0){
						echo' <p>Todavia no has hecho ningun comentario.</p>';
				}else{
						$i =0;
						while($i < $top){
								$nombre = $comentarios[$i]['nombre_idea'];
								$com = $comentarios[$i]['comentario'];
								$fech = $comentarios[$i]['fecha_creacion'];
								$id= $comentarios[$i]['id_idea'];
								echo '<a class="links" href="../views/infoIdea.php?id_idea='.$id.'">';
										echo '<div class="fila-perfil">';
												echo '<div class ="texto-dato">';
														echo'<h3>'. $nombre.'</h3>';
														echo'<p>'. $fech. '</p>';
														echo'<p>'. $com. '</p>';
												echo'</div>';
								echo'</div></a>';
								$i++;
						}
				}

				?>
	</div>
</div>

<?php include './layout/foot_page.php';?>
</body>
