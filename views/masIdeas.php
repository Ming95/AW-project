<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/masEventos.css" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" type="text/css" href="../css/top_ideas.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="../js/utilidea.js"></script>
<?php

	require_once '../models/ideaslist.php';
	require_once '../models/categorias.php';

	include './layout/head.php';
	include './layout/categories.php';

	$catId = $_GET['cat'];

	$lista = new IdeasList();
	$lista->categoria($catId);
	$ideas = $lista->getList();
	$numIdeas = count($ideas);

	$categorias = new Categorias();
	$cat = $categorias->getValue($catId);

	echo '<title>'.$cat.'</title>';
	echo '</head><body>';
if($numIdeas){
	echo '<div class="contenido">';

	$tope = min(3,$numIdeas);
	$i = 0;
	while($i <$tope){
		$id = $ideas[$i]["id_idea"];
		$imagen = 'url('.$ideas[$i]['imagen'].')';
		$nombre = $ideas[$i]['nombre_idea'];
		$i++;
		echo '<div class="diapositiva">';
		echo '<div class="numbertext">'.$i.' / '.$tope.'</div>';
		echo '<a href="../views/infoIdea.php?id_idea='.$id.'">';
		echo '<div class="himage" style="background-image: '.$imagen.';"></div>';
		echo '<p class="text"">'.mb_strtoupper(html_entity_decode($cat),'utf-8').'</p></a></div>';

	}
	echo '<div class="dots">';
		$i = 0;
		while($i <$tope){
			$i++;
			echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
		}

	echo '</div>'.
		'<a class="prev" onclick="plusSlides(-1)">&#10094;</a>'.
		'<a class="next" onclick="plusSlides(1)">&#10095;</a>'.
		'</div>';

}
echo '<div class="lateral">'.
	'<h2 id="toptilte">';
		if(!$numIdeas)echo 'Lo sentimos, no existen ideas para la categoría seleccionada';
		else echo 'Todas las ideas de '.$cat; ?></h2>
	<div id="blocklista">
	<?php
	$lista->showNList(0);
	?>
	</div>
</div>
<?php include 'layout/foot_page.php';?>
</body>
</html>
