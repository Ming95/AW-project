<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="shortcut icon" href="../images/icon.png" />
    <?php
       require_once "../models/idea.php";
        session_start();
        $idea = new Idea();
		$idea->load($_GET['id_idea']);
    ?>
</head>
<body>

<h2>Comfirmacion de reporte</h2>

<div class="container">
    <div class="row">
        <label class="texto2">El reporte ha sido envidado correctamente</label>
    </div>
    <?php
    echo '<input class="submit" type="button" value="Aceptar" onclick = "location=\'../views/infoidea.php?id_idea='.$idea->getId_idea().'\'"/>';
    ?>
</div>

</body>
</html>