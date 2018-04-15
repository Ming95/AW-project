<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/head.css" />
<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
<title>Login</title>

<!--?php include 'layout/head.php';?-->
<div id="contenedor">
	<?php
			echo"<form action="."../controllers/login_process.php"." method="."post".">";

				echo"<label for="."mail"."><b>Email</b></label>";
				echo"<input type="."text"." placeholder="."Enter email"." name="."mail"." required>";
				echo"</br>";

				echo"<label for="."psw"."><b>Password</b></label>";
				echo"<input type="."password"." placeholder="."Enter Password"." name="."psw"." required>";
				echo"</br>";
				
				if(!isset($_SESSION['intentos'])or($_SESSION['intentos'] )< 3){
						echo'<button name="login" type="."submit".">Login</button></br>';
						if(isset($_SESSION['intentos']))
							echo "<p>Usuario o contraseña incorrectos</p>";
				}else{
					$_SESSION['intentos'] = 0;
					echo'<a href="../index.php">Recuperar contraseña</a>';
					echo"<p>Ha realizado 3 intentos</p>";
				}
				echo"</br>";
				echo"</form>";

	?>
	
	
</div>
<hr>
<?php include 'layout/foot_page.php';?>
