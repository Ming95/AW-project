<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/evento.css" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
	function cambiarboton(){
    var i=document.getElementById("boton").value = "suscrito";

}
</script>
<?php include 'layout/head.php'?>

<div class="contenido">

	<div class="evento">
		<div class="imagen">
		<?php $imagen = $_SESSION['data1']['dato_evento'][0]['imagen'];
			  echo'<img src= "'.$imagen.'" alt="evento 2" style="width:100%">'?>
		</div>
       <h1>
            <?php echo  $_SESSION['data1']['dato_evento'][0]['nombre'];?>
        </h1>
		<div class="descripcion" id="datos1"

			<p>
                <?php echo $_SESSION['data1']['dato_evento'][0]['desc_evento'];?>
			</p>
		</div>
	<input type="button"  class="button" value="Suscribete" id="boton" onclick="cambiarboton()">
</div>

	<div class="lateral">
	  <h2>Eventos relacionados</h2>
		<div class="evento1">
			<a href="../controllers/ConsultarEventoController.php?id_evento=<?php echo $_SESSION['data1']['mas_eventos'][0]['id'];?>" target="_blank">
			  <?php $imagen1 = $_SESSION['data1']['mas_eventos'][0]['imagen'];
			  echo'<img src= "'.$imagen1.'" alt="evento 1" style="width:100%">'?>
			  <div class="caption">
				<p><a href="../controllers/ConsultarEventoController.php?id_evento=<?php echo $_SESSION['data1']['mas_eventos'][0]['id'];?>"><?php echo $_SESSION['data1']['mas_eventos'][0]['nombre'];?>
			  </a></p>
			  </div>
			</a>
		</div>
		<br>
		<div class="evento1">
			<a href="../controllers/ConsultarEventoController.php?id_evento=<?php echo $_SESSION['data1']['mas_eventos'][1]['id'];?>" target="_blank">
			  <?php $imagen2 = $_SESSION['data1']['mas_eventos'][1]['imagen'];
			  echo'<img src= "'.$imagen2.'" alt="evento 2" style="width:100%">'?>
			  <div class="caption">
				<p><a href="../controllers/ConsultarEventoController.php?id_evento=<?php echo $_SESSION['data1']['mas_eventos'][1]['id'];?>"><?php echo $_SESSION['data1']['mas_eventos'][1]['nombre'];?>
			  </a></p>
			  </div>
			</a>
		</div>
		<br>
		<div class="evento1">
			<a href="../controllers/ConsultarEventoController.php?id_evento=<?php echo $_SESSION['data1']['mas_eventos'][2]['id'];?>" target="_blank">
			  <?php $imagen3 = $_SESSION['data1']['mas_eventos'][2]['imagen'];
			  echo'<img src= "'.$imagen3.'" alt="evento 3" style="width:100%">'?>
			  <div class="caption">
				<p><a href="../controllers/ConsultarEventoController.php?id_evento=<?php echo $_SESSION['data1']['mas_eventos'][2]['id'];?>"><?php echo $_SESSION['data1']['mas_eventos'][2]['nombre'];?>
			  </a></p>
			  </div>
			</a>
		</div>
	  <p class="texto3"><a href="../views/MasEventos.php">Ver mas</a></p>
	</div>

<div class="pie">
	<?php include 'layout/foot_page.php';?>
</div>
</div>
