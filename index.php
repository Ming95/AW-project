<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
	<link rel="stylesheet" type="text/css" href="/css/category.css" />
	<link rel="stylesheet" type="text/css" href="/css/search_bar.css" />
	<link rel="stylesheet" type="text/css" href="/css/top_ideas.css" />
	<link rel="stylesheet" type="text/css" href="/css/top_events.css" />
	<link rel="stylesheet" type="text/css" href="/css/head.css" />

	<meta charset="utf-8">
	<title>SelfIdea</title>
</head>

<body>
<?php include 'views/layout/head.php';?>
<div id="contenedor">
	<div id="front">
		<div id = "category.css">
			<ul class="nav">
				<li><a href=""> Categoria</a>
					<ul>
						<li><a href=""> categoria 1</a></li>
						<li><a href=""> categoria 2</a></li>
						<li><a href=""> categoria 3</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<h1>SelfIdea</h1>


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
		<p> Aquí estarán las 5 ideas/proyecto mas valorados, será generado mediante un php </p>
	</div>

	<hr>

	<div id="top_events.css">
		<h2>Próximos eventos</h2>
		<p> Aquí estarán los 5 eventos más próximos a la fecha actual, será generado mediante un php</p>
	</div>

	<hr>

	<?php include 'views/layout/foot_page.php';?>


</div> <!-- Fin del contenedor -->

</body>
</html>
