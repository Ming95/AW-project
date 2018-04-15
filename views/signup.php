
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/head.css" />
<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
<title>Login</title>

<?php include './layout/head.php';?>
<div id="contenedor">
	<?php
			echo"<form action="."/controllers/signup_process.php"." method="."post".">";

				echo"<label for="."uname"."><b>Username</b></label>";
				echo"<input type="."text"." placeholder="."Enter Username"." name="."uname"." required>";
				echo"</br>";

				echo"<label for="."mail"."><b>Email</b></label>";
				echo"<input type="."email"." placeholder="."Enter Email"." name="."mail"." required>";
				echo"</br>";

				echo"<label for="."psw"."><b>Password</b></label>";
				echo"<input type="."password"." placeholder="."Enter Password"." name="."psw"." required>";
				echo"</br>";
				echo"<label for="."psw2"."><b>Repeat password</b></label>";
				echo"<input type="."password"." placeholder="."Enter Password again"." name="."psw2"." required>";
				echo"</br>";

				echo"<button type="."submit".">Signup</button>";
				echo"</br>";
			echo"</form>";
			//Muestra error, si existe
			if(isset($_SESSION['error'])) echo "<p>Error: ".$_SESSION['error']."</p>";

	?>
</div>
<hr>
<?php include './layout/foot_page.php';?>
