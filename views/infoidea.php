<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="../images/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/idea.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
	require "../models/idea.php";
	if(!isset($_GET['id_idea'])) throw new Exception('Idea no disponible');
	$idea = new Idea();
	$idea->load($_GET['id_idea']);

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

					'<p class="numInfo2">'.$idea->getPopularidad().' €</p>'.
					'<p class="textInfo">personas han valorado esta idea</p>'.

					'<p class="numInfo2">'.$idea->getDiasFin().'</p>'.
					'<p class="textInfo">días más</p>'

					;?>
					<input type="submit" class="boton-formulario" value="Patrocinar" onclick = "location='../views/patrocina.php'"/>
					<?php
					if($idea->getEnVenta())
							echo '<input type="submit" class="boton-formulario2" value="Comprar idea" onclick = "location=\'../views/compraidea.php\'"/>';
					?>
					<button class="boton-formulario2"><i class="fa fa-thumbs-up"></i></button>
				</div><!--lateral-->
			</div><!--acciones-->
			<!--		Descripcion			-->
	<div id="panel">
			<ul class="lista">
				<li><a class="active"  id="lista1" href="#Descripcion" onclick="myfunction1(this)" >Descripción</a></li>
				<li><a class="nactive" id="lista2"  href="#Comentario" onclick="location='../controllers/ComentarioController.php?id_idea=<?php echo $idea->getId_idea();?>&opcion=2'">Comentario</a></li>
				<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li>
			</ul>

		<div id="datos1">
			<p class="textarea1" name="textarea1" id="textarea1" disabled> <?php echo $idea->getDesc_idea();?></p>
		</div>
		<!--		Comentarios			-->
		<div id="datos2">
			<div class="row">
				<label class="texto"> Introduzca los comentarios:</label>
			</div>
			<div class="row">
				<textarea class="textarea2" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
			</div>
			<div class="row">
			  <!--input type="submit" id= "button" class="button" value="Publicar" onclick="location='../controllers/ComentarioController.php?id_idea=<?php echo $_SESSION['data']['dato_idea'][0]['id_idea'];?>&opcion=1&comentario=obtenerComentario()'"/!-->
			   <input type="submit" id= "button" class="button" value="Publicar" onclick="obtenerComentario(<?php echo $idea->getId_idea();?>)"/>
			</div>
			<div class="row">
				<div id= "div1">
				</div>
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

		<input type="submit" class="boton-formulario2" value="Reportar incidencia" onclick = "location='../views/reportaincidencia.php'"/>
	</div><!--panel-->
</div><!--idea-->
<?php include 'layout/foot_page.php';?>
</body>
