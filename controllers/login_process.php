<?php
	session_start();

    $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	//public metododelogin($user, $passw);
?>