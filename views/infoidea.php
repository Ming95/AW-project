
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/idea.css" />
<link rel="stylesheet" type="text/css" href="/css/styleforms.css" />
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php include 'layout/head.php';?>

<div class="a">

	<div class="b">
		<div class="gallery">
			<img src="../images/img_forest.jpg" alt="Forest">
		</div>
		<ul class="lista">
			<li><a class="active"  id="lista1" href="#Descripcion" onclick="myfunction1(this)" >Descripción</a></li>
			<li><a class="nactive" id="lista2"  href="#Comentario" onclick="location='../controllers/consultar_idea_process.php?id_idea=<?php echo $dato_idea[0]['id_idea'];?>&comentario=<?php echo base64_encode('holaa');?>'">Comentario</a></li>
			<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li> 
		</ul>
		<div class="datos1" id="datos1">
			<textarea class="textarea1" name="textarea1" id="textarea1" rows="20" cols="82" disabled> <?php echo $dato_idea[0]['desc_idea'];?>
			</textarea>
		</div>
		<div class="datos2" id="datos2">
			<div class="row">
				<label class="texto"> Introduzca los comentarios:</label>
			</div>
			<div class="row">
				<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
			</div>
			<div class="row">
			  <input type="submit" id= "button" class="button" value="Publicar" onclick="location='../controllers/consultar_idea_process.php?id_idea=<?php echo $dato_idea[0]['id_idea'];?>&inserta=<?php echo base64_encode('insertando comentario');?>'"/>
			</div>
			<div class="row">
				<div id= "div1">
				</div>
			</div>
		</div>
		<div class="datos3" id="datos3" >
			<label class="texto">Pulse aquí para descargar el CV del equipo</label>
			<a href="../CV_equipo.doc" target='_blank' title="Click here to open a Word document"><?php echo $dato_idea[0]['cv_equipo'];?></a>
		</div>
	</div>
	
	<script type="text/javascript">
		myfunction2('<?php echo json_encode($comentarios)?>');		
	</script> 

<div class="c"></br>
		<span class="label other"> Faltan <?php echo $dias_finalizar;?> dias para finalizar</span></br></br></br>
		<span class="label other"> <?php echo $dato_idea[0]['popularidad'];?> visitas</span></br></br></br>
		<input type="submit" id= "button" class="button" value="Patrocinar" onclick = "location='../views/patrocina.php'"/>
		<input type="submit" id= "button" class="button" value="Reportar incidencia" onclick = "location='../views/reportaincidencia.php'"/>
		<input type="submit" id= "button" class="button" value="Comprar idea" onclick = "location='../views/compraidea.php'"/></br>
		<button class="icon-transp"><i class="fa fa-thumbs-up"></i></button>
</div>
<div class="d">
	<div class="texto3">Te puede interesar...</div>
		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="../images/img_forest.jpg">
			  <img src="../images/img_forest.jpg" alt="Forest" width="300" height="300">
			</a>
			<div class="desc">
				<p><a href="../controllers/consultar_idea_process.php?id_idea=<?php echo $masIdeas[0]['id_idea'];?>"><?php echo $masIdeas[0]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>

		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="../images/img_forest.jpg">
			  <img src="../images/img_forest.jpg" alt="Northern Lights" width="600" height="400">
			</a>
			 <div class="desc">
				<p><a href="../controllers/consultar_idea_process.php?id_idea=<?php echo $masIdeas[1]['id_idea'];?>"><?php echo $masIdeas[1]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>

		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="../images/img_forest.jpg">
			  <img src="../images/img_forest.jpg" alt="Mountains" width="600" height="400">
			</a>
			<div class="desc">	
				<p><a href="../controllers/consultar_idea_process.php?id_idea=<?php echo $masIdeas[2]['id_idea'];?>"><?php echo $masIdeas[2]['nombre_idea'];?></a></p>
			</div>
		  </div>
		</div>

		<div class="clearfix"></div>

		<p class="texto3"><a href="https://www.w3schools.com/html/">Ver mas</a></p>

	</div>

</div>
<?php include 'layout/foot_page.php';?>
