<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	<link rel="stylesheet" type="text/css" href="css/category.css" />
	<link rel="stylesheet" type="text/css" href="css/search_bar.css" />
	<link rel="stylesheet" type="text/css" href="css/top_ideas.css" />
	<link rel="stylesheet" type="text/css" href="css/top_events.css" />

	<meta charset="utf-8">
	<title>SelfIdea</title>
</head>

<body>
<div id="contenedor">
	<div id="front">
		<div class="login">
            <a class="reg" href='views/login.php'>Login</a> / 
            <a class="reg" href='views/signup.php'>Registro</a>
        </div>
		<div id = "category.css">
			<ul class="nav">
                <li id ="cat"><a href=""> Deportes</a></li>
                <li id ="cat"><a href=""> Moda</a></li>
                <li id ="cat"><a href=""> Electrónica</a></li>
                <li id ="cat"><a href=""> Informática</a></li>
                <li id ="cat"><a href=""> Hogar</a></li>
			</ul>
		</div>
		<h1 id="title">SelfIdea</h1>


		<div class="field" id="searchform">
			<a class="Create_button" id="create_idea" href='views/crearidea.php'>Crear Idea</a>
			<input type="text" id="searchterm" placeholder="¿Qué buscas?" />
			<button type="button" id="search">Buscar</button>
		</div>
		<!--<script class="search" src="aqui va el script de busqueda."></script> -->
	</div>

	<hr>

	<div id="top_ideas.css">
		<h2>Top ideas</h2>
        <?php include 'views/top_ideas.php';?>
	</div>
	
	<hr>
	
	<div id="top_events.css">
		<?php include 'views/top_events.php';?>
	</div>

	<hr>

	<?php include 'views/layout/foot_page.php';?>


</div> <!-- Fin del contenedor -->
</body>
</html>
