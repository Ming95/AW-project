<?php

require '../models/comentario.php';
session_start();
if(!isset($_SESSION['mail'])) header('Location: ../views/login.php');
$com = new Comentario();
$comentario = nl2br(htmlentities($_POST['comment'], ENT_QUOTES, 'UTF-8'));
$com->newComentario($_GET['id'], $comentario, $_SESSION['mail'], date("Y-m-d"));
header("Location: ../views/infoIdea.php?id_idea=".$_GET['id']."");

 ?>
