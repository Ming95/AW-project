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
   <form method="post" action="incidenciaOk.php?id_idea=<?php echo $idea->getId_idea();?>" style="display: inline;">
				<textarea required class="input-text" name="reporte" placeholder="Escribe un comentario..." style="height:200px"></textarea></br>
		   	<input type="submit" id= "button"  class="submit" value="Enviar"/>
	</form>
    
    <?php
        
    echo ' <input class="submit" type="button" value="Cancelar" onclick = "location=\'../views/infoidea.php?id_idea='.$idea->getId_idea().'\'"/>';
    ?>
	</div>
    </div>
</div>

</body>
</html>
