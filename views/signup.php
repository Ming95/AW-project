
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<link rel="stylesheet" type="text/css" href="/css/contenedor.css" />
<link rel="stylesheet" type="text/css" href="/css/formulario.css" />
<title>Login</title>

<?php include './layout/head.php';?>
<div class="contenedor">

			<form action="/controllers/signup_process.php"method="post">
				<div class="formulario">
					<div class="campos-formulario">
							<h4>Username</h4>
							<input class ="input-box" type="text" placeholder="Enter Username" name="uname" required>


							<h4>Email</h4>
							<input class ="input-box" type="email" placeholder="Enter Email" name="mail" required>


							<h4>Password</h4>
							<input class ="input-box" type="password" placeholder="Enter Password" name="psw" required>

							<h4>Repeat password</h4>
							<input class ="input-box" type="password" placeholder="Enter Password" name="psw2" required>
						</div>
						<div class="submit-formulario">
							<input type="submit" value="SIGN UP" class ="boton-formulario">
						</div>
					</div>
				</form>

			<?php
				//Muestra error, si existe
				if(isset($_SESSION['error'])) echo "<p>Error: ".$_SESSION['error']."</p>";
			?>
</div>
<?php include './layout/foot_page.php';?>
