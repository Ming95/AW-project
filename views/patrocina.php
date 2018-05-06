<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php session_start();?>
<link rel="stylesheet" type="text/css" href="../css/styleforms.css"/>
</head>
<body>

<h2>Patrocina esta idea</h2>

<div class="container">
  <form action="pagoOK.html">
    <div class="row">
        <label class="texto">Faltan <?php echo $_SESSION['data']['dias_finalizar']?> días para finalizar el proyecto</label>
        <!--input type="text" id="fname" name="firstname" placeholder="Your name.."!-->
    </div>
    <div class="row">
        <label class="texto">Cantidad solitada para llevar a cabo el proyecto:</label>
	</div>
	<div class="row">
        <input type="text" id="lname" name="lastname" placeholder="<?php echo $_SESSION['data']['dato_idea'][0]['importe_solicitado'];?> €" disabled>
    </div>
    <div class="row">
        <label class="texto">Cantidad total aportada:</label>
     </div>
	 <div class="row">
		<input type="text" id="lname" name="lastname" placeholder="0 €" disabled>
	 </div>
    <div class="row">
       <label class="texto">Por favor, introduzca la aportación que desea realizar:</label>
	 </div>
	 <div class="row">
        <input type="text" id="lname" name="lastname" placeholder="Ej: <?php echo (0.3*$_SESSION['data']['dato_idea'][0]['importe_solicitado']);?> €">
    </div>
     <div class="row">
      <input class="submit" type="submit" value="Enviar">
	  <input class="submit" type="button" value="Cancelar" onclick = "location='../views/infoidea.php'">
      </div>
  </form>
</div>

</body>
</html>
