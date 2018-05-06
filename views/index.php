<!DOCTYPE html>
<html>
<head>
    <!--Hoja de estilos principal para index -->
	<link rel="stylesheet" type="text/css" href="../css/stylesheet.css" />
    <!--Hoja de estilos para la parte que muestra las categorias -->
	<link rel="stylesheet" type="text/css" href="../css/category.css" />
    <!--Hoja de estilos para la barra de busqueda -->
	<link rel="stylesheet" type="text/css" href="../css/search_bar.css" />
    <!--Hoja de estilos para mostar las 3 ideas mas valoradas -->
	<link rel="stylesheet" type="text/css" href="../css/top_ideas.css" />
    <!--Hoja de estilos para mostra los 3 eventos mas proximos -->
	<link rel="stylesheet" type="text/css" href="../css/top_events.css" />

	<meta charset="utf-8">
	<title>SelfIdea</title>

	<?php
		$_GET["numIdeas"]=3;
		include "../controllers/IndexController.php";
		//Carga categorias de entorno.ini
		$categorias = parse_ini_file("../config/entorno.ini", true);
		if($categorias==null)
			throw new Exception('MySQL: Error al cargar las categorias');
	 ?>
</head>

<body>
<!--Contenedor contendrá todos los elementos de la pagina index. Es posible que se cambie la estrutura para la siguiente
entrega-->
<div id="contenedor">
    <!--font contiene la parte principal donde se muestra una foto de un paisaje. -->
	<div id="front">
        <!--login contiene lo que correponde a la parte login y registro. cuando un usario esta registrado, muestra su nombre. -->
		<div class="login">
			<?php
			if(!isset($_SESSION['logged']) || !$_SESSION['logged'])
				echo '<a class="reg" href="login.php">Iniciar Sesion</a>';
			else{
				 echo '<a class="reg" href="profile.php">'.$_SESSION["login"].'</a>';
				 echo ' / ';
				 echo '<a class="reg" href="logout.php">Cerrar Sesion</a>';
			}
			?>
        </div>
        <!--Muestra la barra de menu de las categorias.-->
		<div id = "category.css">
			<ul class="nav">
				<?php
					$i =0;
					while(isset($categorias['CATEGORIAS']['categoria'][$i])){
						echo '<li id ="cat"><a href="/views/MasEventos.php?cat=';
						echo $categorias['CATEGORIAS']['categoria'][$i];
						echo '">';
						echo $categorias['CATEGORIAS']['categoria'][$i];
						echo '</a></li>';
						$i++;
					}
					?>
			</ul>
		</div>
		<h1 id="title">SelfIdea</h1>

        <!--La siguiente parte corresponde al boton de crear ideas -->
		<div class="field" id="searchform">
			<a class="Create_button" id="create_idea" href='/views/crearidea.php'>Crear Idea</a>
			<input type="text" id="searchterm" placeholder="¿Qué buscas?" />
			<button type="button" id="search">Buscar</button>
		</div>
		<!--<script class="search" src="aqui va el script de busqueda."></script> -->
	</div>

	<hr>
    <!--esta parte muestra las 3 ideas mas valoradas -->
	<div id="top_ideas.css">
		<h2>Top ideas</h2>
        <?php include 'top_ideas.php';?>
	</div>

	<hr>
    <!--Esta parte muestra los 3 eventos más proximos -->
	<div id="top_events.css">
		<?php include 'top_events.php';?>
	</div>

	<hr>

	<?php include 'layout/foot_page.php';?>


</div> <!-- Fin del contenedor -->
</body>
</html>
