<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css"/>
</head>
<body>
<h2>Reportando incidencia...</h2>
<div class="container">
  <form action="pagoOK.php">
    <div class="row">
        <label class="texto">Introduzca los comentarios que desea reportar:</label>
    </div>
    <div class="row">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    </div>
    <div class="row">
      <input class="submit" type="submit" value="Enviar">
	  <input class="submit" type="button" value="Cancelar" onclick = "location='../views/infoidea.php'">
    </div>
  </form>
</div>

</body>
</html>
