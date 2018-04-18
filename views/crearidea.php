	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/head.css" />
	<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
	<title>Crear Idea</title>
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
	<form method="post" action="../controllers/procesaridea.php">
		<fieldset>
			<legend>Crear idea</legend>
			<p>Nombre de la idea: <input type="text" name="nombre" required/> </p>
			<p>Dinero que quiero recaudar(�) <input type="text" name="dinero" onkeypress="return valida(event)" required></p>
			Fin de recaudacion: <input type="date" name="final" step="1" min="2018-01-01" max="2033-12-31" value="2018-01-01">

			<p>Categorias</p>
			<select name="categorias">
			<option value="Deportes">Deportes</option>
			<option value="Comida">Comida</option>
			<option value="Musica" selected>Musica</option>
			<option value="Cine">Cine</option>
			 <option value="Juegos">Juegos</option>
			 <option value="Dise�o">Diese�o</option>
			 <option value="Ilustracion">Ilustracion</option>
			</select>

			<p>Foto de la idea: <input type="file" name="foto" required/></p>

			<p>CV del equipo: <input type="file" name="archivo" required/></p>

			<textarea name="descripcion" rows="4" cols="50">Descripcion de la idea</textarea>

			 <p>�Quieres vender la idea?
			 <input name="vender" type="checkbox" value="on" id="check" onchange="javascript:showContent()"/></P>
			<div id="content" style="display: none;">
				<p>Precio de la idea: <input type="text" name="precio" onkeypress="return valida(event)" value="0" required/></p>
			</div>
			<button type="submit"> Aceptar</button>
		</fieldset>
	</form>
</div>
<hr>
<?php include 'layout/foot_page.php';?>

