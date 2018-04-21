<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<link rel="stylesheet" type="text/css" href="/css/formulario.css" />
<title>Login</title>

<?php include 'layout/head.php';?>
<div class="contenedor">
		<form action="/controllers/login_process.php" method="post" class="formulario">
			<legend>Iniciar Sesion</legend>
				<div class="campos-formulario">
				<h4>Email</h4> <input class ="input-box" type="text" name="mail" placeholder="Introduce tu e-mail" required>

				<h4>Contraseña</h4>	<input class ="input-box" type="password" name="psw" placeholder="Introduce una contraseña entre 8 y 16 caracteres"
											pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
				<p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>
				<?php
						if(!isset($_SESSION['intentos'])or($_SESSION['intentos'] )< 3){
								if(isset($_SESSION['intentos']))
									echo "<p class="."error".">Usuario o contraseña incorrectos.</p>";
						}else{
							$_SESSION['intentos'] = 0;
							echo"<p class="."error".">¿Has olvidado tu contraseña?</p>";
							echo'<a href="../index.php">Recuperar contraseña.</a>';
						}
				?>
				</div>
				<div class="submit-formulario">
					<input type="button" value="REGISTRARSE" class ="boton-formulario2" onclick="location.href='/views/signup.php'">
					<input type="submit" value="INICIAR SESIÓN" class ="boton-formulario">
				</div>
			</form>
</div>
<?php include 'layout/foot_page.php';?>
