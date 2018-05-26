<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/masEventos.css" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php

	include './layout/head.php';
	require '../models/ideaslist.php';
	require '../models/categorias.php';

	$cat = $_GET['cat'];

	$lista = new IdeasList();
	$lista->categoria($cat);
	$ideas = $lista->getList();
	$numIdeas = count($ideas);

	$categorias = new Categorias();

	echo '<title>'.$categorias->getValue($cat).'</title>';
	echo '</head><body><div class="contenido">';

	$tope = min(3,$numIdeas);
	$i = 0;
	while($i <$tope){
		$id = $ideas[$i]["id_idea"];
		$imagen = $ideas[$i]['imagen'];
		$nombre = $ideas[$i]['nombre_idea'];
		$i++;
		echo '<div class="diapositiva">';
		echo '<div class="numbertext">'.$i.' / '.$tope.'</div>';
		echo '<a style="margin:150px;" href="../views/infoidea.php?id_idea='.$id.'">';
		echo '<img src= "'.$imagen.'" alt="idea 1" style="max-height: 500px;">';
		echo '<p class="text"">'.$nombre.'</p></a></div>';

	}
	?>
	</div>
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
	<?php
	$i = 0;
	while($i <$tope){
		$i++;
		echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
	}
		?>
</div>

<div class="lateral">
	  <h2>Mas ideas</h2>
		<?php

		$i = 0;
		while($i <$numIdeas){
			$id = $ideas[$i]["id_idea"];
			$imagen = $ideas[$i]['imagen'];
			$nombre = $ideas[$i]['nombre_idea'];

			if($i%3==0) echo '<div class="row">';
			echo '<div class="evento1">';
			echo '<a href="../views/infoidea.php?id_idea='.$id.'" target="_blank">';
			echo '<img src= "'.$imagen.'" alt="imagen de '.$nombre.'" style="width:100%">';
			echo '<div class="caption">';
			echo '<p>'.$nombre.'</p></a></div></div>';
			if($i%3==2) echo '</div>';
			$i++;
		}

		?>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("diapositiva");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>
<?php include 'layout/foot_page.php';?>
</body>
</html>