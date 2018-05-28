<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="../images/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/idea.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<?php


	require_once "../models/idea.php";
	require_once '../models/rating.php';
	require_once '../models/comentario.php';
	require_once '../models/ideaslist.php';
	session_start();
	try{


		$idea = new Idea();
		$idea->load($_GET['id_idea']);

		$comentario = new Comentario();
		$comentarios= $comentario->getListaIdea($idea->getId_idea());

		$rat = new Rating();
		$liked = isset($_SESSION['mail']) ? $rat->isLiked($_GET['id_idea'], $_SESSION['mail']) : false;

		$ilist = new IdeasList();
		$ilist->ideasRelacionadas($idea->getId_idea(), $idea->getId_categoria());
		$irel = $ilist->getList();

	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	}

	echo '<title>'.$idea->getNombre_Idea().'</title>';
?>
</head>
<body onload="myfunction1(this)">

<?php include '../views/layout/head.php';
		echo '<div id="todo">
					<div id="idea">
					<div id="cabecera">
					<h1 id="title">'.$idea->getNombre_Idea().'</h1>
					<h2 id="subtitle">'.$idea->getCategoria().'<h2></div>

					<div id="acciones-idea">
					<img id="main-img" src="'.$idea->getImagen().'" alt="Imagen de la idea">'.

					'<div id="lateral">'.

					'<p class="numInfo">'.$idea->getRecaudado().' €</p>'.
					'<p class="textInfo">de la meta de '.$idea->getImporte_solicitado().' €</p>'.

					'<p class="numInfo2">'.$idea->getPopularidad().'</p>'.
					'<p class="textInfo">personas han valorado esta idea</p>'.

					'<p class="numInfo2">'.$idea->getDiasFin().'</p>'.
					'<p class="textInfo">días más</p>'.

					'<input type="submit" class="boton-formulario" id="patrocinar" value="Patrocinar" onclick = "location=\'../views/patrocina.php?id='.$idea->getId_idea().'\'"/><br>'.
					'<div id="bsecun">';


			    if(!isset($_SESSION['mail']))
						echo '<button id="like" class="boton-formulario2"
						onclick="location.href=\'../views/login.php\'">
						<i class="far fa-heart"></i></button>';
					else if($liked)
						echo '<button id="like" class="boton-formulario2"
						onclick="location.href=\'../controllers/like.php?id='.$idea->getId_idea().'&mail='.$_SESSION['mail'].'&liked='.$liked.'\'">
						<i class="fas fa-heart"></i></button>';
					else
						echo '<button id="like" class="boton-formulario2"
						onclick="location.href=\'../controllers/like.php?id='.$idea->getId_idea().'&mail='.$_SESSION['mail'].'&liked='.$liked.'\'">
						<i class="far fa-heart"></i></button>';

					if($idea->getEnVenta())
							echo '<input id="buy" type="submit" class="boton-formulario2" value="Comprar idea" onclick = "location=\'../views/compraidea.php?id='.$idea->getId_idea().'\'"/>';
					?>
				</div><!--bsecun-->
				</div><!--lateral-->
			</div><!--acciones-->
			<!--		Descripcion			-->
	<div id="panel">
			<ul class="lista">
				<li><a class="active"  id="lista1" href="#Descripcion" onclick="myfunction1(this)" >Descripción</a></li>
				<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li>
				<li><a class="nactive" id="lista2"  href="#Comentarios" onclick="myfunction2(this)">Comentarios</a></li>
			</ul>

		<div id="datos1">
			<p class="textarea1" name="textarea1" id="textarea1" disabled> <?php echo $idea->getDesc_idea();?></p>
		</div>
		<!--		Comentarios			-->
		<div id="datos2">
			<div class="row">
				<div id= "div1">
<?php
					$i=0;
					$top = count($comentarios);
						while($i<$top){
							$nombre = $comentarios[$i]['nombre'];
							$fecha = $idea->diffFechas($comentarios[$i]['fecha_creacion']);
							$fecha = ($fecha == 0)?'Hoy':'Hace '.$fecha.' días';
							$text = $comentarios[$i]['comentario'];
							echo '<div class=comen>
										<p><span class="comname">'.$nombre.'</span>
										<span class="comfech">'.$fecha.'</span></p>
										<p class="comtext">'.$text.'</p>
										</div>
							';
							$i++;
					}
?>
				</div>
			</div>
			<form method="post" action="../controllers/comenta.php?id=<?php echo $idea->getId_idea();?>" style="display: inline;">
				<textarea class="input-text" name="comment" placeholder="Escribe un comentario..." style="height:200px"></textarea></br>
		   	<input type="submit" id= "button" class="boton-formulario" value="Publicar"/>
				</form>
				<button class="boton-formulario2" onclick = "window.location.href='../views/reportaincidencia.php?id_idea=<?php echo $idea->getId_idea();?>'">Reportar incidencia</button>
		</div>
		<!--		Curriculum			-->
		<div id="datos3" >
			<p>Esta idea pertenece a:</p>
			<h2><?php echo $idea->getNombreUsu();?></h2>
			<p>Si quieres conocer más acerca de los desarrolladores del proyecto, puedes
			<a href="<?php echo $idea->getCv_equipo();?>" target='_blank' title="Curriculum PDF">descargar</a> el currículum del equipo.</p>
		</div>

	<script type="text/javascript">
		myfunction2('<?php echo json_encode($comentarios)?>');
	</script>

	</div><!--panel-->
</div><!--idea-->
<?php
$i=0;
$top = min(count($irel),3);
	while($i<$top){
		$id = $irel[$i]["id_idea"];
		$imagen = $irel[$i]['imagen'];
		$nombre = $irel[$i]['nombre_idea'];
		$cat = $irel[$i]['valor'];
		$desc = $irel[$i]['desc_idea'];

		echo '<a href="../views/infoIdea.php?id_idea='.$id.'">';
		echo '<div id="relacionadas">';
		echo '<img class ="previewImg" src= "'.$imagen.'">';
		echo '<div class ="textrel">';
		echo '<p class="namerel">'.$nombre.'</p>';
		echo '<p class="catrel">'.$cat.'</p>';
		echo '<p class="descrel">'.$desc.'</p>';
		echo '</div>';
		echo '<p class="readmore">Leer más</p>';
		echo '</div></a>';
		$i++;
}?>

</div><!--todo-->
<?php include 'layout/foot_page.php';?>
</body>
