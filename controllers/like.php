<?php

require '../models/rating.php';

$like = new Rating();
if($_GET['liked']){
	$like->dislike($_GET['id'], $_GET['mail']);
	return "false";
}else {
	$like->like($_GET['id'], $_GET['mail']);
	return "true";
}

 ?>
