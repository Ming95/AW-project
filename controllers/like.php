<?php

require '../models/rating.php';

$like = new Rating();
$like->like($_GET['id'], $_GET['mail']);
header("Location: ../views/infoidea.php?id_idea=".$_GET['id']."");

 ?>
