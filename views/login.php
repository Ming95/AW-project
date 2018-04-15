<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/head.css" />
<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
<title>Login</title>

<!--?php include 'layout/head.php';?-->
<div id="contenedor">
	<?php
			echo"<form action="."../controllers/login_process.php"." method="."post".">";

				echo"<label for="."mail"."><b>Email</b></label>";
				echo'<input type="text" name="mail" placeholder="prueba@mail.com" required>';
				echo"</br>";

				echo"<label for="."psw"."><b>Password</b></label>";
				echo'<input type="password" name="psw" placeholder="Elije una contraseña fuerte" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>';
				
				echo"<p>(La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.)</p>";
				echo"</br>";
				//echo"<li>Bienvenido, {$_SESSION['login']} <a href='/views/logout.php'>Cerrar Sesion</a></li>";
				
				if(!isset($_SESSION['intentos'])or($_SESSION['intentos'] )< 3){
					if(isset($_SESSION['intentos']))
							echo "</br><p>Usuario o contraseña incorrectos</p>";
					echo'<button name="login" type="."submit".">Login</button>';

				}else{
					$_SESSION['intentos'] = 0;
					echo'<a href="../index.php">Recuperar contraseña</a>';
					echo"<p>Ha realizado 3 intentos</p>";
				}
				echo'<button name="cancelar" type="."submit"."><a href="/views/logout.php">Cancelar</a></button></br>';
				echo"</br>";
				echo"</form>";

	?>
	
	
</div>
<hr>
<?php include 'layout/foot_page.php';?>
