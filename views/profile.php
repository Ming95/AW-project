<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:./login.php");
?>
<head>
  <meta charset="utf-8">
	<link rel="shortcut icon" href="../images/icon.png" />
  <link rel="stylesheet" type="text/css" href="../css/formulario.css" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />

  <title>Mi perfil</title>
</head>
<body>
<?php
		include './layout/head.php';
		require '../models/usuario.php';
		require '../models/ideaslist.php';

		$user = new Usuario();
		$user->load($_SESSION['mail']);
		$misideas = new IdeasList();
		$misideas->perfil($user->getIdCorreo());
		$aportaciones = $user->aportaciones();
		$eventos = $user->eventos();
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
		array de eventos a los que el usuario asistira
		print_r($eventos);
		*/


?>
<h1 class="error">WORK IN PROGRESS</h1>
  <!--Datos de usuario-->
<div class="lista-perfil">
    <form action="cambiarnombre.php" class="formulario">
        <div class="campos-formulario">
          <h4>Nombre completo:</h4> <input class ="input-box" type="text" name="fname" value="<?php echo "{$_SESSION['login']}" ?>"><br>
          <h4>Email:</h4> <input class ="input-box" type="text" name="fname" value="<?php echo "{$_SESSION['login']}" ?>"><br>
          <h4>Contraseña:</h4> <input class ="input-box" type="password" name="fname" value="<?php echo "{$_SESSION['login']}" ?>"readonly><br>
        </div>
        <div class="submit-formulario">
          <input type="submit" value="BORRAR CUENTA" class ="boton-formulario">
          <input type="submit" value="GUARDAR Y ACTUALIZAR" class ="boton-formulario">
        </div>
  </form>
</div>
<div class="profile-settings">
  <!--Mis Ideas-->
  <div class="lista-perfil">
      <h1>Mis Ideas</h1>
    <div class="fila-perfil">
      <div class="texto-dato">
        <h3>Idea genial</h3>
        <p>100€ / 1000€</p>

      </div>
    </div>
    <div class="fila-perfil">
      <div class="texto-dato">
        <h3>Idea fantástica</h3>
        <p>800€ / 950€</p>
      </div>
    </div>
  </div>

  <!--Ideas a las que he aportado-->
  <div class="lista-perfil">
      <h1>Mis Aportaciones</h1>
    <div class="fila-perfil">
      <div class="texto-dato">
        <h3>Idea genial</h3>
        <p>100€ / 1000€</p>
      </div>
      <div class="boton-fila-perfil">
        <p>AÑADIR APORTACION</p>
      </div>
    </div>
    <div class="fila-perfil">
      <div class="texto-dato">
        <h3>Idea fantástica</h3>
        <p>800€ / 950€</p>
      </div>
      <div class="boton-fila-perfil">
        <p>AÑADIR APORTACION</p>
      </div>
    </div>
  </div>

  <!--eventos-->
  <div class="lista-perfil">
    <h1>Próximos Eventos</h1>
    <div class="fila-perfil">
      <div class="texto-dato">
        <h3>Data Mining</h3>
        <p>Madrid 18/05/2018</p>
      </div>
    </div>
    <div class="fila-perfil">
      <div class="texto-dato">
        <h3>Web Develop</h3>
        <p>Barcelona 2/06/2018</p>
      </div>
    </div>
  </div>
</div>
<?php include './layout/foot_page.php';?>
</body>
