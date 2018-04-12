<?php
	$username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
	$userlastname = htmlspecialchars(trim(strip_tags($_REQUEST["ulast"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["psw2"])));
	$mail = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));
	if($password == password2){
		//public metododesignup($username, $userlastname, $password, $mail);
	}
?>