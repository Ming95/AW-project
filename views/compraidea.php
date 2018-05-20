<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="../images/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<?php session_start();?>
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
</head>
<body>

<h2>Comprar esta idea</h2>

<div class="container">
  <form action="pagoOK.php">
    <div class="row">
        <label class="texto">El precio de venta de la idea seleccionada es:</label>
        <!--input type="text" id="fname" name="firstname" placeholder="Your name.."!-->
    </div>
	<div class="row">
        <input type="text" id="lname" name="lastname" placeholder="<?php echo $_SESSION['data']['dato_idea'][0]['importe_venta'];?> €" disabled>
    </div>
    <div class="row">
       <label class="texto">¿Está seguro que desea comprar la idea?</label>
	 </div>
     <div class="row">
      <input class="submit" type="submit" value="Enviar">
	  <input class="submit" type="button" value="Cancelar" onclick = "location='../views/infoidea.php'">
      </div>
  </form>
</div>

</body>
</html>
