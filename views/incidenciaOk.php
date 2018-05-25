<!DOCTYPE html>
<?php

require '../models/usuarioIncidencia.php';
require_once "../models/idea.php";
session_start();
if(!isset($_SESSION['mail'])) header('Location: ../views/login.php');
$report = new usuarioIncidencia();
$report->nuevaIncidencia($_GET['id_idea'], $_POST['reporte'], $_SESSION['mail']);
//header("Location: ../views/infoIdea.php?id_idea=".$_GET['id']."");
 $idea = new Idea();
 $idea->load($_GET['id_idea']);

 ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/styleforms.css" />
<link rel="shortcut icon" href="../images/icon.png" />

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