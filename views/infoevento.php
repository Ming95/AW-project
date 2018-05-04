<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/evento.css" />
<link rel="stylesheet" type="text/css" href="/css/styleforms.css" />
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include 'layout/head.php'?>

<div class="contenido">

	<div class="evento"> 
		<div class="imagen">
			<img src="../images/evento1.jpg" alt="evento"  style="width:90%">
		</div>
		<h1>Evento 1</h1>
		<div class="descripcion" id="datos1">
			
			<p>
			Descripcion de evento incluyendo la fecha y la hora de este
			tambien tine que aparecer la direccion.
			</p>
		</div>
		<a  class="button" href="../views/suscripcion.php" >Suscribete</a>
	</div>

	<div class="lateral">
	  <h2>Eventos relacionados</h2>
		<div class="evento1">
			<a href="../views/evento.php" target="_blank">
			  <img src="../images/evento2.jpg" alt="evento 1" style="width:100%">
			  <div class="caption">
				<p><a href="../views/evento.php">Evento 1</a></p>
			  </div>
			</a>
		</div>
		<br>
		<div class="evento1">
			<a href="../views/evento.php" target="_blank">
			  <img src="../images/evento2.jpg" alt="evento 2" style="width:100%">
			  <div class="caption">
				<p><a href="../views/evento.php">Evento 2</a></p>
			  </div>
			</a>
		</div>
		<br>
		<div class="evento1">
			<a href="../views/evento.php" target="_blank">
			  <img src="../images/evento2.jpg" alt="evento 3" style="width: 100%">
			  <div class="caption">
				<p><a href="../views/evento.php">Evento 3</a></p>
			  </div>	
			</a>
		</div>
	  <p class="texto3"><a href="../views/MasEventos.php">Ver mas</a></p>
	</div>

<div class="pie">
	<?php include 'layout/foot_page.php';?>
</div>
</div>