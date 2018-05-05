<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/head.css" />
	<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include 'layout/head.php';
			include '../controllers/FormularioLogin.php';
			$form = new FormularioLogin();
			$form->gestiona();
			include 'layout/foot_page.php';
	?>

</body>
</html>
