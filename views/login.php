<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include './layout/head.php';
			require '../controllers/FormularioLogin.php';

			$form = new FormularioLogin();
			$form->gestiona();
			include './layout/foot_page.php';
	?>
</body>
</html>
