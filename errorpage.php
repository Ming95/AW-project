<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="shortcut icon" href="./images/icon.png" />
<link rel="stylesheet" type="text/css" href="../css/errorpage.css" />
<script type="text/javascript" src="../js/utilidea.js"></script>
<title>Oops!</title>
</head>
<body>


<div class="container">

    <div class="row">
        <div class="image-error">
            <img class="error" src="../images/robot-error.png" alt="Imagen de un robot que muestra cara de no saber lo que falla.">
        </div>
        <div class="error-msg">
            <h1>Oops!</h1>
            <?php
                session_start();
                if(isset($_SESSION['data_error']))
                echo '<label class="texto2">'.$_SESSION['data_error'].'</label>';
            ?>
        </div>

    </div>
    <input class="submit" type="submit" value="Cerrar" onclick="volver()">
</div>

</body>
</html>
