<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/idea.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
	require "../models/idea.php";
	if(!isset($_GET['id_idea'])) throw new Exception('Idea no disponible');
	$idea = new Idea();
	$idea->load($_GET['id_idea']);
?>
</head>
<body>

<?php include '../views/layout/head.php';?>

<div class="a">

	<div class="b">
		<h1><?php echo $idea->getNombre_Idea();?></h1>
		<div class="gallery">
			<img class="main-img" src="<?php echo $idea->getImagen();?>" alt="Forest">
		</div>
		<ul class="lista">
			<li><a class="active"  id="lista1" href="#Descripcion" onclick="myfunction1(this)" >Descripción</a></li>
			<li><a class="nactive" id="lista2"  href="#Comentario" onclick="location='../controllers/ComentarioController.php?id_idea=<?php echo $idea->getId_idea();?>&opcion=2'">Comentario</a></li>
			<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li>
		</ul>
		<div class="datos1" id="datos1">
			<textarea class="textarea1" name="textarea1" id="textarea1" rows="20" cols="82" disabled> <?php echo $idea->getDesc_idea();?>
			</textarea>
		</div>
		<div class="datos2" id="datos2">
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
		<div class="datos3" id="datos3" >
			<label class="texto">Pulse aquí para descargar el CV del equipo</label>
			<a href="../CV_equipo.doc" target='_blank' title="Click here to open a Word document"><?php echo $idea->getCv_equipo();?></a>
		</div>
	</div>

	<script type="text/javascript">
		myfunction2('<?php echo json_encode($comentarios)?>');
	</script>

<div class="c">
		<span class="label other">Recaudado: <?php echo $idea->getRecaudado();?> € / <?php echo $idea->getImporte_solicitado();?> €</span><br><br><br>
		<span class="label other">Faltan <?php echo $idea->getDiasFin();?> dias para finalizar</span><br><br><br>
		<span class="label other">Le gusta a <?php echo $idea->getPopularidad();?> personas.</span><br><br><br>
		<input type="submit" id= "button" class="button" value="Patrocinar" onclick = "location='../views/patrocina.php'"/>
		<input type="submit" id= "button" class="button" value="Reportar incidencia" onclick = "location='../views/reportaincidencia.php'"/>
		<?php
		if($idea->getEnVenta()){
				echo '<input type="submit" id= "button" class="button" value="Comprar idea" onclick = "location=';
				echo "'../views/compraidea.php'";
				echo '"/>';
			}
		?>
		<br>
		<button class="icon-transp"><i class="fa fa-thumbs-up"></i></button>
</div>


</div>
<?php include 'layout/foot_page.php';?>
</body>
