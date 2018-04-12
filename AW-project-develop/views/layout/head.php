<?php
	echo"<header id="."main-header".">";
		
		$log = $_SESSION["login"];//la variable login viene de modelo.
			
		echo"<a id="."logo-header"." href="."index.php".">";
			echo"<span class="."site-name".">SelfIdea</span>";
		echo"</a>";
	 
		echo"<nav>";
			echo"<ul class="."user".">";
				if($log == true){
					echo"<li><a href='logout.php'>Cerrar Sesion</a></li>";
				}else{
					echo"<li><a href="."login.php".">Login/SignUp"."</a></li>";
				}
			echo"</ul>";
		echo"</nav>";
	echo"</header>";
		
	echo"<hr>";
?>