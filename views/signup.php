
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<link rel="stylesheet" type="text/css" href="/css/formulario.css" />
<title>Login</title>

<?php include './layout/head.php';?>
<div class="contenedor">

			<form action="/controllers/signup_process.php" method="post" class="formulario">
				<legend>Registro</legend>
					<div class="campos-formulario">
							<h4>Nombre de usuario</h4>
							<input class ="input-box" type="text" placeholder="Introduce tu nombre de usuario" name="uname" required>


							<h4>Email</h4>
							<input class ="input-box" type="email" placeholder="Introduce tu Email" name="mail" required>

							<h4>Contraseña</h4>
							<input class ="input-box" type="password" placeholder="Introduce una contraseña entre 8 y 16 caracteres" name="psw"
											pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
							<p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

							<h4>Repite la contraseña</h4>
							<input class ="input-box" type="password" placeholder="Introduce una contraseña que coincida" name="psw2"
											pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
											<?php
												//Muestra error, si existe
												if(isset($_SESSION['error'])) echo "<p class="."error".">Error: ".$_SESSION['error']."</p>";
											?>
						</div>
						<div class="submit-formulario">
							<input type="submit" value="SIGN UP" class ="boton-formulario">
						</div>
				</form>

</div>
<?php include './layout/foot_page.php';?>
