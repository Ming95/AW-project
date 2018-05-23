<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="../images/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/idea.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php


	require_once "../models/idea.php";
	require_once '../models/rating.php';
	require_once '../models/UsuarioComentarioIdea.php';
	session_start();
	try{
		$usuarioComentarioIdea = new UsuarioComentarioIdea();
		$comentarios= $usuarioComentarioIdea->getAllFilteredAndOrderDESC("fecha_creacion","id_idea",$_GET['id_idea']);
		$usuarioComentarioIdea->closeConnection();

		$idea = new Idea();
		$idea->load($_GET['id_idea']);

		$rat = new Rating();
		$liked = isset($_SESSION['mail']) ? $rat->isLiked($_GET['id_idea'], $_SESSION['mail']) : false;

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
		echo '<div id="idea">
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
					'<p class="textInfo">días más</p>'
					;?>
					<input type="submit" class="boton-formulario" value="Patrocinar" onclick = "location='../views/patrocina.php'"/>
					<?php
					if($idea->getEnVenta())
							echo '<input type="submit" class="boton-formulario2" value="Comprar idea" onclick = "location=\'../views/compraidea.php\'"/>';

			    if(!isset($_SESSION['mail']))
						echo '<button class="boton-formulario"
						onclick="location.href=\'../views/login.php\'">
						<i class="fa fa-thumbs-up"></i></button>';
					else if($liked)
						echo '<button class="boton-formulario"
						onclick="location.href=\'../controllers/like.php?id='.$idea->getId_idea().'&mail='.$_SESSION['mail'].'&liked='.$liked.'\'">
						<i class="fa fa-thumbs-up"></i></button>';
					else
						echo '<button class="boton-formulario2"
						onclick="location.href=\'../controllers/like.php?id='.$idea->getId_idea().'&mail='.$_SESSION['mail'].'&liked='.$liked.'\'">
						<i class="fa fa-thumbs-up"></i></button>';
					?>

				</div><!--lateral-->
			</div><!--acciones-->
			<!--		Descripcion			-->
	<div id="panel">
			<ul class="lista">
				<li><a class="active"  id="lista1" href="#Descripcion" onclick="myfunction1(this)" >Descripción</a></li>
				<li><a class="nactive" id="lista2"  href="#Comentario" onclick="myfunction2(this)">Comentario</a></li>
				<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li>
			</ul>

		<div id="datos1">
			<p class="textarea1" name="textarea1" id="textarea1" disabled> <?php echo $idea->getDesc_idea();?></p>
		</div>
		<!--		Comentarios			-->
		<div id="datos2">
			<div class="row">
				<div id= "div1"></div>
			</div>
			<div class="row">
				<textarea class="input-text" id="subject" name="subject" placeholder="Escribe un comentario..." style="height:200px"></textarea>
			</div>
			<div class="row">
			   <input type="submit" id= "button" class="boton-formulario" value="Publicar" onclick="obtenerComentario(<?php echo $idea->getId_idea();?>)"/>
				 <input type="submit" class="boton-formulario2" value="Reportar incidencia" onclick = "location='../views/reportaincidencia.php'"/>
			</div>
		</div>
		<!--		Curriculum			-->
		<div id="datos3" >
			<label class="texto">Pulse aquí para descargar el CV del equipo</label>
			<a href="../CV_equipo.doc" target='_blank' title="Click here to open a Word document"><?php echo $idea->getCv_equipo();?></a>
		</div>

	<script type="text/javascript">
		myfunction2('<?php echo json_encode($comentarios)?>');
	</script>

	</div><!--panel-->
</div><!--idea-->
<?php include 'layout/foot_page.php';?>
</body>
