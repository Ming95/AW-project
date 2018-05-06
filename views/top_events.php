<div id="box">
        <h2 id="event_title">Top Eventos</h2>
        <div id="all_events">
            <a href="../views/MasEventos.php">Ver más eventos &#62&#62</a>
        </div>    
        
		<?php
			$i = 0;
			while($i <3){
				$id = $_SESSION["data1"]["mas_eventos"][$i]["id"];
				$imagen = $_SESSION['data1']['mas_eventos'][$i]['imagen'];
				$nombre = $_SESSION['data1']['mas_eventos'][$i]['nombre'];
				echo '<div class="thumbnail">';
				echo '<a href="../controllers/ConsultarEventoController.php?id_evento='.$id.'">';
				echo '<img class ="previewImg" src= "'.$imagen.'">';
				echo '<p class= "description">'.$nombre.'</p></a></div>';
				
				$i++;
			}
		?>
    
	</div>