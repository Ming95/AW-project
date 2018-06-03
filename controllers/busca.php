<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
<?php

require '../models/idea.php';
$idea = new Idea();
$target = $idea->getBy('id_idea', $_POST['busqueda']);
if(!count($target))
  header("Location: ../index.php");
else
  header("Location: ../views/infoIdea.php?id_idea=".$_POST['busqueda']);

 ?>
