<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/head.css" />
<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
<link rel="stylesheet" type="text/css" href="/css/formulario.css" />
<link rel="stylesheet" type="text/css" href="/css/contenedor.css" />
<title>Login</title>

<?php include 'layout/head.php';?>
<div class="contenedor">
		<form action="/controllers/login_process.php" method="post">
			<div class="formulario">
				<div class="campos-formulario">
				<h4>Email</h4> <input class ="input-box" type="text" name="mail" placeholder="Introduce tu e-mail" required>

				<h4>Password</h4>	<input class ="input-box" type="password" name="psw" placeholder="Introduce contraseña entre 8 y 16 caracteres">
				<p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>
				<?php
						if(!isset($_SESSION['intentos'])or($_SESSION['intentos'] )< 3){
								if(isset($_SESSION['intentos']))
									echo "<p>Usuario o contraseña incorrectos</p>";
						}else{
							$_SESSION['intentos'] = 0;
							echo'<a href="../index.php">Recuperar contraseña</a>';
							echo"<p>Ha realizado 3 intentos</p>";
						}
				?>
				</div>
				<div class="submit-formulario">
					<input type="submit" value="LOGIN" class ="boton-formulario">
				</div>
				</div>
			</form>
</div>
<?php include 'layout/foot_page.php';?>
