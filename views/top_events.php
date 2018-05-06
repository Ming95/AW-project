<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
    <!--box contendra a los 3 eventos -->
	<div id="box">
        <h2 id="event_title">Top Eventos</h2>
        <div id="all_events">
            <a href="">Ver más eventos</a>
        </div>    
        <!--thumbnail es la caja que contiene la imagen del evento, su descripción, y una imagen del logo de twitter que
redirige a la página principal de Twitter. La idea es que lleve en el futuro a la pagina de Twitter de SelfIdea.-->
		<div class="thumbnail">
            <!--Esta parte se ha hecho con href para que pinche donde se pinche lleve a la pagina del evento. -->
            <a href ="/controllers/ConsultarEventoController.php?id_evento=1">
                <img class ="previewImg" src="images/img_forest.jpg">
                <p class="description">descripción del evento corto</p>
            </a>
            <div id ="social">
            <a href ="https://twitter.com/?lang=es">
                <img class="twitter" src= "../images/twitter.jpg">
            </a>
            </div>
		</div>
        <div class="thumbnail">
            <a href ="/controllers/ConsultarEventoController.php?id_evento=1">
                <img class ="previewImg" src="../images/img_forest.jpg">
                <p class="description">descripción del evento corto asjhdfasefijwaeghñ asdfghawepghasidgiohaew</p>
            </a>
            <a href ="https://twitter.com/?lang=es">
                <img class="twitter" src= "../images/twitter.jpg">
            </a>
		</div>
        <div class="thumbnail">
            <a href ="/controllers/ConsultarEventoController.php?id_evento=1">
                <img class ="previewImg" src="../images/img_forest.jpg">
                <p class= "description">descripción del evento corto</p>
            </a>
            <a href ="https://twitter.com/?lang=es">
                <img class="twitter" src= "images/twitter.jpg">
            </a>
		</div>
	</div>
</body>
</html>
=======
<div id="box">
        <h2 id="event_title">Top Eventos</h2>
        <div id="all_events">
            <a href="../views/MasEventos.php">Ver más eventos &#62&#62</a>
        </div>    
        
		<?php
			$i = 0;
			while($i <3){
				$id = $_SESSION['data']['topEventos'][$i]["id"];
				$imagen = $_SESSION['data']['topEventos'][$i]['imagen'];
				$nombre = $_SESSION['data']['topEventos'][$i]['nombre'];
				echo '<div class="thumbnail">';
				echo '<a href="../controllers/ConsultarEventoController.php?id_evento='.$id.'">';
				echo '<img class ="previewImg" src= "'.$imagen.'">';
				echo '<p class= "description">'.$nombre.'</p></a></div>';
				
				$i++;
			}
		?>
    
	</div>
>>>>>>> ff6ea5c63219951b65d003ca2a8d5cf6b4c0525e
