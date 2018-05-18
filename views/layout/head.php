<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="./css/head.css" />

<script type="text/javascript" src="../js/utilidea.js"></script>
</head>
<body>
    <?php if(!isset($_SESSION)) { session_start(); } ?>
    <!--header es el contenedor principal -->
    <header id="container">
        <div class="wrapper">
            <!--El logo de la pagina que la pinchar lleva a la pagina principal -->
            <a class="logo" href="../index.php">SelfIdea</a>

            <!--esta caja permite al usuario hacer login, registrarse o cerrar sesion. -->
            <div id="derecha">
                <?php
                    if (isset($_SESSION["logged"]) && ($_SESSION["logged"]===true)) {
                        echo"<label class="."sesion".">Bienvenido, {$_SESSION['login']} <a href='/views/logout.php'>Cerrar Sesion</a></label>";

                    }else{
                        //echo"<li><a href="."../views/login.php".">SignUp"."</a></li>";
                        echo "<label class="."sesion"."><a href='../views/login.php'>Login</a> / <a href='../views/signup.php'>Registro</a></li>";
                    }
                ?>
            </div>
        </div>
    </header>

</body>

</html>
