<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<link rel="shortcut icon" href="../images/icon.png" />
	<title>Patrocinar Idea</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
			include './layout/head.php';
			include '../controllers/FormularioPatrocina.php';
			$form = new FormularioPatrocina();
			$form->gestiona();
			include './layout/foot_page.php';
	?>

</body>
</html>
