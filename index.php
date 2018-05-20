<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
		//Pagina principal
		require './models/categorias.php';
		require './models/ideaslist.php';
		require './models/eventslist.php';
	?>
    <!--Hoja de estilos principal para index -->
	<link rel="stylesheet" type="text/css" href="./css/stylesheet.css" />
    <!--Hoja de estilos para la parte que muestra las categorias -->
	<link rel="stylesheet" type="text/css" href="./css/category.css" />
    <!--Hoja de estilos para la barra de busqueda -->
	<link rel="stylesheet" type="text/css" href="./css/search_bar.css" />
    <!--Hoja de estilos para mostar las 3 ideas mas valoradas -->
	<link rel="stylesheet" type="text/css" href="./css/top_ideas.css" />
    <!--Hoja de estilos para mostra los 3 eventos mas proximos -->
	<link rel="stylesheet" type="text/css" href="./css/top_events.css" />
	<link rel="shortcut icon" href="../images/icon.png" />
	<meta charset="utf-8">
	<title>SelfIdea</title>
	<?php
		//carga categorias de db
		$cat = new Categorias;
		$categorias = $cat->getCategorias();
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
				echo '<a class="reg" href="./views/login.php">Iniciar Sesion</a>';
			else{
				 echo '<a class="reg" href="./views/profile.php">'.$_SESSION["login"].'</a>';
				 echo ' / ';
				 echo '<a class="reg" href="./views/logout.php">Cerrar Sesion</a>';
			}
			?>
        </div>
        <!--Muestra la barra de menu de las categorias.-->
		<div id = "category.css">
			<ul class="nav">
				<?php
				//crea categorias
					$i =0;
					while(isset($categorias[$i])){
						echo '<li><a href="/views/category.php?cat=';
						echo $categorias[$i];
						echo '">';
						echo $categorias[$i];
						echo '</a></li>';
						$i++;
					}

					?>
			</ul>
		</div>
		<img id="title" src="./images/selfidea.png" alt="Logotipo Selfidea">

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
		<?php
		$lista = new IdeasList();
		$lista->topRated(3);
		?>
	</div>

	<hr>
    <!--Esta parte muestra los 3 eventos más proximos -->
	<div id="top_events.css">
		<h2>Top eventos</h2>
		<?php
		$lista2 = new EventsList();
		$lista2->rectentEvents(3);
		?>
	</div>

	<hr>

	<?php include './views/layout/foot_page.php';?>


</div> <!-- Fin del contenedor -->
</body>
</html>
