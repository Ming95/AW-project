
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<title>Login</title>

<!--?php include './layout/head.php';?-->
<div id="contenedor">
	<?php
			echo"<form action="."/controllers/signup_process.php"." method="."post".">";

				echo"<label for="."uname"."><b>Username</b></label>";
				echo"<input type="."text"." placeholder="."Enter Username"." name="."uname"." required>";
				echo"</br>";

				echo"<label for="."mail"."><b>Email</b></label>";
				//echo"<input type="."email"." placeholder="."Enter Email"." name="."mail"." required>";
				echo'<input type="email" name="mail" placeholder="prueba@mail.com" required>';
				echo"</br>";

				echo"<label for="."psw"."><b>Password</b></label>";
				//echo"<input type="."password"." placeholder="."Enter Password"." name="."psw"." required>";
				echo'<input type="password" name="psw" placeholder="Enter Password" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required >';
				echo"</br>";
				echo"<label for="."psw2"."><b>Repeat password</b></label>";
				//echo"<input type="."password"." placeholder="."Enter Password again"." name="."psw2"." required>";
				echo'<input type="password" name="psw2" placeholder="Enter password again" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>';
				echo"<p>(La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.)</p>";
				echo"</br>";

				echo"<button type="."submit".">Signup</button>";
				echo'<button name="cancelar" type="."submit"."><a href="/views/logout.php">Cancelar</a></button></br>';
				echo"</br>";
			echo"</form>";
			//Muestra error, si existe
			if(isset($_SESSION['error'])) echo "<p>Error: ".$_SESSION['error']."</p>";

	?>
</div>
<hr>
<?php include './layout/foot_page.php';?>
