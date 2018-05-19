<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="./css/errorpage.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
</head>
<body>


<div class="container">

    <div class="row">
        <div class="image-error">
            <img class="error" src="images/robot-error.png" alt="Imagen de un robot que muestra cara de no saber lo que falla.">
        </div>
        <div class="error-msg">
            <h1>Oops!</h1>
            <?php
                session_start();
                echo '<label class="texto2">'.$_SESSION['data_error'].'</label>';
            ?>
        </div>

    </div>
    <input class="submit" type="submit" value="Cerrar" onclick="volver()">
</div>

</body>
</html>
