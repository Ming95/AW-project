<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Cambiar Nombre</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include './layout/head.php';
			require '../controllers/FormularioPersonalInfo.php';

			$form = new FormularioPersonalInfo();
			$form->gestiona();
			include './layout/foot_page.php';
	?>
</body>
</html>
