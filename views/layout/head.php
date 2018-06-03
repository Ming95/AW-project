
<link rel="stylesheet" type="text/css" href="../css/head.css" />
    <?php if(!isset($_SESSION)) { session_start(); } ?>
    <!--header es el contenedor principal -->
  <header id="container">
      <div class="wrapper">
          <!--El logo de la pagina que la pinchar lleva a la pagina principal -->
          <a href="../index.php">
          <img class="logo" src="../images/selfidea.png" alt="Logotipo Selfidea"></a>

          <!--esta caja permite al usuario hacer login, registrarse o cerrar sesion. -->
          <div id="derecha">
              <?php
                  if (isset($_SESSION["logged"]) && ($_SESSION["logged"]===true)) {
                      echo"<a class="."sesion"." href='../views/logout.php'>Cerrar Sesion</a><a href='../views/profile.php' class="."sesion".">Bienvenido, {$_SESSION['login']}</a>";

                  }else{
                      //echo"<li><a href="."../views/login.php".">SignUp"."</a></li>";
                      echo "<a class="."sesion"." href='../views/login.php'>Login</a>";
                  }
              ?>
          </div>
      </div>
  </header>
