<?php

require '../models/rating.php';

$like = new Rating();
if($_GET['liked'])$like->dislike($_GET['id'], $_GET['mail']);
else $like->like($_GET['id'], $_GET['mail']);
header("Location: ../views/infoidea.php?id_idea=".$_GET['id']."");

 ?>
