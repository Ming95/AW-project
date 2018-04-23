
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
			<li><a class="nactive" id="lista2"  href="#Comentario" onclick="myfunction2(this)">Comentario</a></li>
			<li><a class="nactive" id="lista3"  href="#Equipo" onclick="myfunction3(this)">Equipo</a></li> 
		</ul>
		<div class="datos1" id="datos1">
			<textarea class="textarea1" name="textarea1" id="textarea1" rows="20" cols="82" disabled> HTML, sigla en inglés de HyperText Markup Language (lenguaje de marcas 
			de hipertexto), hace referencia al lenguaje de marcado para la elaboración de páginas web. Es un estándar que sirve de 
			referencia del software que conecta con la elaboración de páginas web en sus diferentes versiones, define una estructura 
			básica y un código (denominado código HTML) para la definición de contenido de una página web, como texto, imágenes, 
			videos, juegos, entre otros. Es un estándar a cargo del World Wide Web Consortium (W3C) o Consorcio WWW, organización 
			dedicada a la estandarización de casi todas las tecnologías ligadas a la web, sobre todo en lo referente a su escritura 
			e interpretación. Se considera el lenguaje web más importante siendo su invención crucial en la aparición, desarrollo 
			y expansión de la World Wide Web (WWW). Es el estándar que se ha impuesto en la visualización de páginas web y es el que 
			todos los navegadores actuales han adoptado.1El lenguaje HTML basa su filosofía de desarrollo en la diferenciación. 
			Para añadir un elemento externo a la página (imagen, vídeo, script, entre otros.), este no se incrusta directamente 
			en el código de la página, sino que se hace una referencia a la ubicación de dicho elemento mediante texto. 
			De este modo, la página web contiene solamente texto mientras que recae en el navegador web (interpretador del código) 
			la tarea de unir todos los elementos y visualizar la página final. Al ser un estándar, HTML busca ser un lenguaje que 
			permita que cualquier página web escrita en una determinada versión, pueda ser interpretada de la misma forma (estándar) 
			por cualquier navegador web actualizado.
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
			  <input class="submit" type="submit" value="Publicar">
			</div>
		</div>
		<div class="datos3" id="datos3" >
			<label class="texto">Pulse aquí para descargar el CV del equipo</label>
			<a href="../CV_equipo.doc" target='_blank' title="Click here to open a Word document">CV Equipo desarrollo</a>
		</div>
	</div>

<div class="c"></br>
		<span class="label other">03:20:12  para finalizar</span></br></br></br>
		<span class="label other">9 visites</span></br></br></br>
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
				<p><a href="../views/infoidea.html">Idea 1</a></p>
			</div>
		  </div>
		</div>

		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="../images/img_forest.jpg">
			  <img src="../images/img_forest.jpg" alt="Northern Lights" width="600" height="400">
			</a>
			 <div class="desc">
				<p><a href="../views/infoidea.html">Idea 2</a></p>
			</div>
		  </div>
		</div>

		<div class="responsive">
		  <div class="gallery">
			<a target="_blank" href="../images/img_forest.jpg">
			  <img src="../images/img_forest.jpg" alt="Mountains" width="600" height="400">
			</a>
			<div class="desc">	
				<p><a href="../views/infoidea.html">Idea 3</a></p>
			</div>
		  </div>
		</div>

		<div class="clearfix"></div>

		<p class="texto3"><a href="https://www.w3schools.com/html/">Ver mas</a></p>

	</div>

</div>
<?php include 'layout/foot_page.php';?>
