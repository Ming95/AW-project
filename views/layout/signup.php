
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/head.css" />
<link rel="stylesheet" type="text/css" href="css/foot_page.css" />
<title>Login</title>

<?php include 'views/layout/head.php';?>
<div id="contenedor">
	<?php
			echo"<form action="."signup_process.php"." method="."post".">";

				echo"<label for="."uname"."><b>name</b></label>";
				echo"<input type="."text"." placeholder="."Enter User name"." name="."uname"." required>";
				echo"</br>";
				echo"<label for="."ulast"."><b>Lastname</b></label>";
				echo"<input type="."text"." placeholder="."Enter Last name"." name="."ulast"." required>";
				echo"</br>";
				
				echo"<label for="."mail"."><b>Email</b></label>";
				echo"<input type="."email"." placeholder="."Enter Email"." name="."mail"." required>";
				echo"</br>";

				echo"<label for="."psw"."><b>Password</b></label>";
				echo"<input type="."password"." placeholder="."Enter Password"." name="."psw"." required>";
				echo"</br>";
				echo"<label for="."psw2"."><b>Password2</b></label>";
				echo"<input type="."password"." placeholder="."Enter Password again"." name="."psw2"." required>";
				echo"</br>";
				
				echo"<button type="."submit".">Signup</button>";
				echo"</br>";
			echo"</form>";
	?>
</div>
<hr>
<?php include 'views/layout/foot_page.php';?>

