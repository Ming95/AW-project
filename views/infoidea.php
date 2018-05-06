
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/idea.css" />
<link rel="stylesheet" type="text/css" href="../css/head.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php include '../views/layout/head.php';?>

<div class="a">

	<div class="b">
		<h1><?php echo $_SESSION['data']['dato_idea'][0]['nombre_idea'];?></h1>
		<div class="gallery">
			<img class="main-img" src=<?php echo $_SESSION['data']['dato_idea'][0]['imagen'];?> alt="Forest">
		</div>
		<ul class="lista">
			<li><a class="active"  id="lista1" href="#Descripcion" onclick="myfunction1(this)" >Descripción</a></li>
			<li><a class="nactive" id="lista2"  href="#Comentario" onclick="location='../controllers/ComentarioController.php?id_idea=<?php echo $_SESSION['data']['dato_idea'][0]['id_idea'];?>&opcion=2'">Comentario</a></li>
			<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li>
		</ul>
		<div class="datos1" id="datos1">
			<textarea class="textarea1" name="textarea1" id="textarea1" rows="20" cols="82" disabled> <?php echo $_SESSION['data']['dato_idea'][0]['desc_idea'];?>
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
			   <input type="submit" id= "button" class="button" value="Publicar" onclick="obtenerComentario(<?php echo $_SESSION['data']['dato_idea'][0]['id_idea'];?>)"/>
			</div>
			<div class="row">
				<div id= "div1">
				</div>
			</div>
		</div>
		<div class="datos3" id="datos3" >
			<label class="texto">Pulse aquí para descargar el CV del equipo</label>
			<a href="../CV_equipo.doc" target='_blank' title="Click here to open a Word document"><?php echo $_SESSION['data']['dato_idea'][0]['cv_equipo'];?></a>
		</div>
	</div>

	<script type="text/javascript">
		myfunction2('<?php echo json_encode($comentarios)?>');
	</script>

<div class="c">
		<span class="label other"> Faltan <?php echo $_SESSION['data']['dias_finalizar']?> dias para finalizar</span><br><br><br>
		<span class="label other">Popularidad: <?php echo $_SESSION['data']['dato_idea'][0]['popularidad'];?>/5</span><br><br><br>
		<input type="submit" id= "button" class="button" value="Patrocinar" onclick = "location='../views/patrocina.php'"/>
		<input type="submit" id= "button" class="button" value="Reportar incidencia" onclick = "location='../views/reportaincidencia.php'"/>
		<?php
		if($_SESSION['data']['dato_idea'][0]['enVenta']){
				echo '<input type="submit" id= "button" class="button" value="Comprar idea" onclick = "location=';
				echo "'../views/compraidea.php'";
				echo '"/>';
			}
		?>
		<br>
		<button class="icon-transp"><i class="fa fa-thumbs-up"></i></button>
</div>
<div class="d">
	<div class="texto3">Te puede interesar...</div>
		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="<?php echo $_SESSION['data']['mas_ideas'][0]['imagen'];?>">
			  <img class="side-img" src="<?php echo $_SESSION['data']['mas_ideas'][0]['imagen'];?>" alt="Forest" width="600" height="400">
			</a>
			<div class="desc">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['mas_ideas'][0]['id_idea'];?>"><?php echo $_SESSION['data']['mas_ideas'][0]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>

		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="<?php echo $_SESSION['data']['mas_ideas'][1]['imagen'];?>">
			  <img class="side-img" src="<?php echo $_SESSION['data']['mas_ideas'][1]['imagen'];?>" alt="Forest" width="600" height="400">
			</a>
			 <div class="desc">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['mas_ideas'][1]['id_idea'];?>"><?php echo $_SESSION['data']['mas_ideas'][1]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>

		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="<?php echo $_SESSION['data']['mas_ideas'][2]['imagen'];?>">
			  <img  class="side-img" src="<?php echo $_SESSION['data']['mas_ideas'][2]['imagen'];?>" alt="Mountains" width="600" height="400">
			</a>
			<div class="desc">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['mas_ideas'][2]['id_idea'];?>"><?php echo $_SESSION['data']['mas_ideas'][2]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>
		
		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="<?php echo $_SESSION['data']['mas_ideas'][3]['imagen'];?>">
			  <img  class="side-img" src="<?php echo $_SESSION['data']['mas_ideas'][3]['imagen'];?>" alt="Mountains" width="600" height="400">
			</a>
			<div class="desc">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['mas_ideas'][3]['id_idea'];?>"><?php echo $_SESSION['data']['mas_ideas'][3]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>
		
		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="<?php echo $_SESSION['data']['mas_ideas'][4]['imagen'];?>">
			  <img  class="side-img" src="<?php echo $_SESSION['data']['mas_ideas'][4]['imagen'];?>" alt="Mountains" width="600" height="400">
			</a>
			<div class="desc">
				<p><a href="../controllers/ConsultarIdeaController.php?id_idea=<?php echo $_SESSION['data']['mas_ideas'][4]['id_idea'];?>"><?php echo $_SESSION['data']['mas_ideas'][4]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>

		<div class="clearfix"></div>

		<p class="texto3"><a href="https://www.w3schools.com/html/" disabled>Ver mas</a></p>

	</div>

</div>
<?php include 'layout/foot_page.php';?>
