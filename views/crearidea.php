<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/head.css" />
	<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
	<link rel="stylesheet" type="text/css" href="/css/formulario.css" />
	<link rel="stylesheet" type="text/css" href="/css/crearidea.css" />
	<title>Crear Idea</title>
</head>
<body>
	<?php include 'layout/head.php';?>
	<script type="text/javascript">
		function showContent() {
			element = document.getElementById("content");
			check = document.getElementById("check");
			if (check.checked) {
				element.style.display='block';
			}
			else {
				element.style.display='none';
			}
		}
		function valida(e){
			tecla = (document.all) ? e.keyCode : e.which;

			//Tecla de retroceso para borrar, siempre la permite
			if (tecla==8){
				return true;
			}

			// Patron de entrada, en este caso solo acepta numeros
			patron =/[0-9-.]/;
			tecla_final = String.fromCharCode(tecla);
			return patron.test(tecla_final);
		}
	</script>
<div id="contenedor">
	<form method="post" action="../controllers/procesaridea.php" class="formulario">
			<legend>Crear Idea</legend>
			<h4>Nombre de la idea</h4><input type="text" name="nombre" required class ="input-box">
			<h4>Recaudación</h4>
			<p>Indica la cantidad en euros que deseas recaudar.</p>
			<input type="text" name="dinero" onkeypress="return valida(event)" required class ="input-box">
			<h4>Fin de recaudacion</h4>
			<p>Indica la fecha en la que se cerrará la recaudación.</p>
			<input type="date" name="final" step="1" min="<?php echo date("Y-m-d")?>" max="2033-12-31" value="<?php echo date("Y-m-d")?>" class ="input-box">

			<h4>Categoría</h4>
			<p>Elige a qué categoría pertenece tu idea</p>
			<select name="categorias" class ="input-box">
				<option value="Deportes">Deportes</option>
				<option value="Comida">Comida</option>
				<option value="Musica" selected>Musica</option>
				<option value="Cine">Cine</option>
				<option value="Juegos">Juegos</option>
				<option value="Diseño">Dieseño</option>
				<option value="Ilustracion">Ilustracion</option>
			</select>

			<h4>Imagen de la idea</h4>
			<div class="input-file">
				Selecciona una imagen que describa tu idea.
				<input type="file" name="foto" required>
			</div>
			<h4>CV del equipo</h4>
			<div class="input-file">
				Selecciona el currículum de los miembros de tu equipo.
				<input type="file" name="archivo" required>
			</div>
			<h4>Descripcion de la idea</h4>
			<textarea class="input-text" name="descripcion" rows="12" cols="140" placeholder="Explica en qué consiste tu proyecto"></textarea>


			 <div class="checkbox">
			 	<input name="vender" type="checkbox" value="on" id="check" onchange="javascript:showContent()" label="hola">
			 	<label for="check">¿Quieres poner tu idea a la venta?</label>
			</div>

			<div id="content" style="display: none;">
				<h4>Precio de la idea (€)</h4> <input type="text" name="precio" onkeypress="return valida(event)" placeholder="1000" required class ="input-box">
			</div>
			<div class="submit-formulario">
				<input type="submit" value="ACEPTAR" class ="boton-formulario">
			</div>

	</form>
</div>
<?php include 'layout/foot_page.php';?>
</body>
</html>
