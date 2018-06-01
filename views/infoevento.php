<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/evento.css" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
	require "../models/evento.php";
	require '../models/eventslist.php';
	require '../models/subscriptions.php';
	session_start();

	if(!isset($_GET['id_evento'])) throw new Exception('Evento no disponible');
	$evento = new Evento();
	$evento->load($_GET['id_evento']);

	$sub = new Subscription();
	$subscribed = isset($_SESSION['mail']) ? $sub->isSub($_GET['id_evento'], $_SESSION['mail']) : 0;

	echo '<title>'.$evento->getNombre().'</title>';
?>
</head>
<body>
<?php
	include './layout/head.php';
	include './layout/categories.php';
	?>

<div class="contenido">

	<div class="evento">
		<div class="imagen">
		<?php $imagen = $evento->getImagen();
			  echo'<img src= "'.$imagen.'" alt="evento 2" style="width:100%">'?>
		</div>
       <h1>
            <?php echo  $evento->getNombre();?>
        </h1>
		<div class="descripcion" id="datos1">
			<p><?php echo $evento->getFecha();?></p>
			<p><?php echo $evento->getDescripcion();?></p>

		<?php
			if(!isset($_SESSION['mail']))
				echo '<input type="button"  class="button" value="Suscribete" id="boton"
				onclick="location.href=\'../views/login.php\'">';
			else if($subscribed)
						echo '<input type="button"  class="button" value="Suscrito!" id="boton"
						onclick="location.href=\'../controllers/suscribe.php?id='.$evento->getId().'&mail='.$_SESSION['mail'].'&sub='.$subscribed.'\'">';
			else echo '<input type="button"  class="button" value="Suscribete" id="boton"
				onclick="location.href=\'../controllers/suscribe.php?id='.$evento->getId().'&mail='.$_SESSION['mail'].'&sub='.$subscribed.'\'">';
			?>
		</div>
</div>
<!-- LATERAL -->
<div class="lateral">
	<h2>Eventos relacionados</h2>
<?php
	$lista = new EventsList();
	$lista->rectentEvents();
	$eventos = $lista->getList();
	$numEventos = count($eventos);
	$tope = min(3,$numEventos);

	$i = 0;
	while($i <$tope){
		$id = $eventos[$i]["id"];
		$imagen = $eventos[$i]['imagen'];
		$nombre = $eventos[$i]['nombre'];
		$i++;
		echo '<div class="evento1">';
		echo '<a href="../views/infoevento.php?id_evento='.$id.'">';
		echo '<img src= "'.$imagen.'" alt="evento 1" style="width:100%">';
		echo '<div class="caption">';
		echo '<p><a class="rightext" href="../views/infoevento.php?id_evento='.$id.'">'.$nombre.'</a></p></div></a></div>';

	}


?>
<p class="texto3"><a class="rightext" href="../views/masEventos.php">Ver mas</a></p>
</div><!-- LATERAL -->

<div class="pie">
</div>
</div>

	<?php include './layout/foot_page.php';?>
<script>
	function cambiarboton(){
    var i=document.getElementById("boton").value = "Suscrito!";
	}
</script>
</body>
