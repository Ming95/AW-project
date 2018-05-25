<?php

require '../models/comentario.php';
session_start();
if(!isset($_SESSION['mail'])) header('Location: ../views/login.php');
$com = new Comentario();
$com->newComentario($_GET['id'], $_POST['comment'], $_SESSION['mail'], date("Y-m-d"));
header("Location: ../views/infoIdea.php?id_idea=".$_GET['id']."");

 ?>
