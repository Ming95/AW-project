<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="/css/styleforms.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
</head>
<body>


<div class="container">
    <div class="row">
	<?php
		session_start();
        echo '<label class="texto2">'.$_SESSION['data_error'].'</label>';
	?>
    </div>
     <input class="submit" type="submit" value="Cerrar" onclick="volver()">
</div>

</body>
</html>
