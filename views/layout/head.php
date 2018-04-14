<?php
	echo"<header id="."main-header".">";
		session_start();
		//var_dump($_SESSION["logged"]);
		//var_dump($_SESSION["login"]);
		//$log = $_SESSION["logged"];//la variable login viene de modelo.
		echo"<a id="."logo-header"." href="."../index.php".">";
			echo"<span class="."site-name".">SelfIdea</span>";
		echo"</a>";
	 
		echo"<nav>";
			echo"<ul class="."user".">";
				if (isset($_SESSION["logged"]) && ($_SESSION["logged"]===true)) {
					echo"<li>Bienvenido, {$_SESSION['login']} <a href='../views/logout.php'>Cerrar Sesion</a></li>";
				}else{
					//echo"<li><a href="."../views/login.php".">SignUp"."</a></li>";
					echo "<li><a href='./views/login.php'>Login</a> / <a href='views/signup.php'>Registro</a></li>";
				}
			echo"</ul>";
		echo"</nav>";
	echo"</header>";
		
	echo"<hr>";
?>