<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:./login.php");
?>
<head>
  <meta charset="utf-8">
	<link rel="shortcut icon" href="../images/icon.png" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
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
/*
		echo $user->getNombre();
		echo $user->getPassword();
		echo $user->isAdmin();
		echo $user->getIdCorreo();
*/
		/*
		cambiar nombre de usuario
		$user->cambiarNombre("Nuevo Nombre");
		*/

		/*
		cambiar la contraseña del usuario
		if(!$user->cambiarPass(SHA1("Nueva pass")))
				echo "<p class='error'>error, las contraseñas coinciden</p>";
		*/

		/*
		Borra la cuenta del usuario, sus ideas, sus comentarios, sus likes...
		$user->deleteAccount();
		*/

		/*
		Mostrar las ideas del usuario: Se puede hacer a mano llamando a:
		$misideas->getList(); que retorna el array con los datos, o:
		$misideas->showNList(0); que imprime directamente las ideas:
 			Se puede crear una nueva hoja css para mostrar la lista o usar:
			<link rel="stylesheet" type="text/css" href="../css/top_events.css" />

		*/
        
		/*
		array de ideas a las que el usuario a aportado
		print_r($aportaciones);
		*/

		/*
		Eliminar idea:
		$idea = new Idea();
		$id = '2';
		$idea->load($id);
		$idea->delete();
		*/

		/*
		array de eventos a los que el usuario asistira
		print_r($eventos);
		*/

		/*
		array de comentarios del usuario ordenados por fecha
		print_r($comentarios);
		*/

		/*
		Eliminar un comentario:
		$i=x
		$comentario->deleteById($comentarios[$i]['id']);
		*/
/*********************************************/

	if($user->isAdmin()){
		$inc = new usuarioIncidencia();
		$incidencias = $inc->getLista();

		$allideas = new IdeasList();
		$allist = $allideas->getAll();

		$userlist = $user->getAll();

		/*
		array con todas las incidencias de la web ordenadas por ideas
		print_r($incidencias);
		*/

		/*
		array con todas las ideas.
		print_r($allist);
		*/
        
		/*
		array con todos los usuarios.
		print_r($userlist);
		*/
	}
}catch(Exception $e){
	error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
	$_SESSION['data_error']=$e->getMessage();
	header("Location:/errorpage.php");
}
?>
<h1 class="error">WORK IN PROGRESS</h1>
    
  <!--Datos de usuario-->
  <div class="profile-settings">
      
      <div class="user_data">
          <img id="user_img" alt="imagen por defecto de los usuarios" src ="/images/usuario.jpg">
          
          <p class="data" >Nombre: <?php echo $user->getNombre(); ?></p>
          <p class="data" >Correo: <?php echo $user->getIdCorreo(); ?></p>
      </div>
      
      <div class="change">
          <div class="bottons">	
            <input type="submit" class="boton-formulario" id="modificarPersonalInfo" value="MODIFICAR DATOS PERSONALES" onclick = "location='cambiarPersonalInfo.php'"/>
          </div>
          <div class="bottons">
            <input type="submit" class="boton-formulario" id="modificarPass" value="MODIFICAR CONTRASEÑA" onclick = "location='cambiarPass.php'"/>
          </div>
      
      </div>
      
      
      <?php
          if($user->isAdmin()){
            echo'<div class="change">';
                echo'<div class="bottons">';	
                    echo'<input type="submit" class="boton-formulario" value="Lista ideas" onclick = "location.href=\'../views/idealist.php\'"/>';
                echo'</div>';
            echo'</div>';
            }
        ?>
      
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
                            echo'<p>'. $recaudado. '€/ '. $precio .'€</p>';
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
                $precio = $aportaciones[$i]['importe_solicitado'];
                $id= $aportaciones[$i]['id_idea'];
                echo '<a class="links" href="../views/infoIdea.php?id_idea='.$id.'">';
                    echo '<div class="fila-perfil">';
                        echo '<div class ="texto-dato">';
                            echo'<h3>'. $nombre.'</h3>';
                            echo'<p>'. $precio. '€</p>';
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
</div>
      
<?php include './layout/foot_page.php';?>
</body>
