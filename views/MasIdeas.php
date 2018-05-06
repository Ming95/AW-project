	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/masEventos.css" />
<link rel="stylesheet" type="text/css" href="/css/styleforms.css" />
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include 'layout/head.php'?>

<div class="contenido">

	<div class="diapositiva">
	  <div class="numbertext">1 / 3</div>
		<a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][0]['id_idea'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data']['topIdeas'][0]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="idea 1" style="width:100%">';
			  ?>
		</a>
	  <div class="text">
		<p>
            <?php echo $_SESSION['data']['topIdeas'][0]['nombre_idea'];?>
        </p>
	  </div>
	</div>

	<div class="diapositiva">
	  <div class="numbertext">2 / 3</div>
		<a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][1]['id_idea'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data']['topIdeas'][1]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="idea 2" style="width:100%">'?>
		</a>
	  <div class="text">
		<p>
            <?php echo  $_SESSION['data']['topIdeas'][1]['nombre_idea'];?> 
		</p>
	  </div>
	</div>

	<div class="diapositiva">
	  <div class="numbertext">3 / 3</div>
		<a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][2]['id_idea'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data']['topIdeas'][2]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="idea 3" style="width:100%">'?>
		</a>
	  <div class="text">
		<p>
            <?php echo  $_SESSION['data']['topIdeas'][2]['nombre_idea'];?> 
        </p>
	  </div>
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<div class="lateral">
	  <h2>Mas ideas</h2>
	  <div class="row">
		<div class="evento1">
			<a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][3]['id_idea'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data']['topIdeas'][3]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="idea 4" style="width:100%">'?>
			  <div class="caption">
				<p><a href="../controllers/ConsultarIdeaController.php?id_Idea=<?php echo $_SESSION['data']['topIdeas'][3]['id_idea'];?>"><?php echo $_SESSION['data']['topIdeas'][3]['nombre_idea'];?></a></p>
			  </div>
			</a>
		</div>
		<div class="evento1">
			<a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][4]['id_idea'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data']['topIdeas'][4]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="idea 5" style="width:100%">'?>
			  <div class="caption">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][4]['id_idea'];?>"><?php echo $_SESSION['data']['topIdeas'][4]['nombre_idea'];?></a></p>
			  </div>
			</a>
		</div>
		<div class="evento1">
			<a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][5]['id_idea'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data']['topIdeas'][5]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="idea 6" style="width:100%">'?>
			  <div class="caption">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['topIdeas'][5]['id_idea'];?>"><?php echo $_SESSION['data']['topIdeas'][5]['nombre_idea'];?></a></p>
			  </div>	
			</a>
		</div>
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
<?php include 'layout/foot_page.php';?>
