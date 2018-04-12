<?php
	include '../models/usuario.php';
	session_start();
  $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	$user = new Usuario();
	if($user->getUser($username, $password))
		echo "Login correcto";
	else echo "error de login";
?>
