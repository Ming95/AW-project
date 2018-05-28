<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<link rel="stylesheet" type="text/css" href="../css/crearidea.css" />
	<link rel="shortcut icon" href="../images/icon.png" />
	<meta charset="utf-8">
	<title>Crear Idea</title>
</head>
<body>
	<?php
			include 'layout/head.php';
			include '../controllers/FormularioIdea.php';

			$form = new FormularioIdea();
			$form->gestiona();

			include 'layout/foot_page.php';
	?>
</body>
</html>
