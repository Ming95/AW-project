<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/head.css" />
<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
<title>Login</title>

<?php include 'layout/head.php';?>
<div id="contenedor">
	<?php
			echo"<form action="."../controllers/login_process.php"." method="."post".">";

				echo"<label for="."uname"."><b>Username</b></label>";
				echo"<input type="."text"." placeholder="."Enter Username"." name="."uname"." required>";
				echo"</br>";

				echo"<label for="."psw"."><b>Password</b></label>";
				echo"<input type="."password"." placeholder="."Enter Password"." name="."psw"." required>";
				echo"</br>";
				echo"<button type="."submit".">Login</button>";
				echo"</br>";
			echo"</form>";
			
			if(isset($_SESSION['intentos'])){
				echo "<p>Usuario o contraseña incorrectos</p>";
				if ($_SESSION['intentos'] > 3); //echo "Login incorrecto";
			}
	?>
</div>
<hr>
<?php include 'layout/foot_page.php';?>
