<?php
	session_start();
	$username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
  $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["psw2"])));
	$mail = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));
	echo "Work in progress";
	if($password == $password2){
		//public metododesignup($username, $userlastname, $password, $mail);
	}
?>
