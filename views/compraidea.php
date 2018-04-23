<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
</head>
<body>

<h2>Patrocina esta idea</h2>

<div class="container">
  <form action="pagoOK.php">
    <div class="row">
        <label class="texto">El precio de venta de la idea seleccionada es:</label>
        <!--input type="text" id="fname" name="firstname" placeholder="Your name.."!-->
    </div>
	<div class="row">
        <input type="text" id="lname" name="lastname" placeholder="55.000 €" disabled>
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
