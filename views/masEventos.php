<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/masEventos.css" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="stylesheet" type="text/css" href="../css/top_ideas.css" />
<link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="../js/utilidea.js"></script>
<?php
	require '../models/eventslist.php';

	include './layout/head.php';
	include './layout/categories.php';



	$lista = new EventsList();
	$lista->rectentEvents();
	$eventos = $lista->getList();
	$numEventos = count($eventos);
	echo '<title>Más Eventos</title>';
	echo '</head><body><div class="contenido">';

	$tope = min(3,$numEventos);
	$i = 0;
	while($i <$tope){
		$id = $eventos[$i]["id"];
		$imagen = 'url('.$eventos[$i]['imagen'].')';
		$nombre = $eventos[$i]['nombre'];
		$i++;
		echo '<div class="diapositiva">';
		echo '<div class="numbertext">'.$i.' / '.$tope.'</div>';
		echo '<a href="../views/infoevento.php?id_evento='.$id.'">';
		echo '<div class="himage" style="background-image: '.$imagen.';"></div>';
		echo '<p class="text"">EVENTOS</p></a></div>';

	}
	?>
	<div class="dots">
		<?php
		$i = 0;
		while($i <$tope){
			$i++;
			echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
		}
			?>
	</div>
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
	<div class="lateral">
		<h2 id="toptilte">Próximos eventos</h2>
		<div id="blocklista">
			<?php
			$i = 0;
			while($i <$numEventos){
				$id = $eventos[$i]["id"];
				$imagen = $eventos[$i]['imagen'];
				$nombre = $eventos[$i]['nombre'];
				$desc = $eventos[$i]['desc_evento'];
				$fech = $eventos[$i]['fecha'];

				echo '<a href="../views/infoevento.php?id_evento='.$id.'">';
				echo '<div id="relacionadas">';
				echo '<img class ="previewImg" src= "'.$imagen.'">';
				echo '<div class ="textrel">';
				echo '<p class="namerel">'.$nombre.'</p>';
				echo '<p class="descrel">'.$fech.'</p>';
				echo '<p class="descrel">'.$desc.'</p>';
				echo '</div></div></a>';
				$i++;
			}

			?>
		</div>
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
<?php include './layout/foot_page.php';?>
</body>
</html>
