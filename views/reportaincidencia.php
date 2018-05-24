<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" type="text/css" href="../css/styleforms.css"/>
    <?php
        require_once "../models/idea.php";
        session_start();
        $idea = new Idea();
		$idea->load($_GET['id_idea']);

    ?>
</head>
<body>
<h2>Reportando incidencia...</h2>
<div class="container">
    <div class="row">
        <label class="texto">Introduzca los comentarios que desea reportar:</label>
    </div>
    <div class="row">
        <textarea class="input-text" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    </div>
    <div class="row">
    <?php
      echo '<input class="submit" type="submit" value="Enviar" onclick = "location=\'incidenciaOk.php?id_idea='.$idea->getId_idea().'\'"/> ';
	   
    echo ' <input class="submit" type="button" value="Cancelar" onclick = "location=\'../views/infoidea.php?id_idea='.$idea->getId_idea().'\'"/>';
    ?>
    </div>
</div>

</body>
</html>
