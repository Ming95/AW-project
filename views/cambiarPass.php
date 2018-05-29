<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Registro</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include './layout/head.php';
			require '../controllers/FormularioPassw.php';

			$form = new FormularioPassw();
			$form->gestiona();
			include './layout/foot_page.php';
	?>
</body>
</html>
