	<div id="box">
        <div id="all_ideas">
            <a href="">Ver más ideas </a>
        </div>

            <?php
                $i = 0;
                while($i <3){
                    $id = $_SESSION["data"]["topIdeas"][$i]["id_idea"];
                    $imagen = $_SESSION['data']['topIdeas'][$i]['imagen'];
                    $nombre = $_SESSION['data']['topIdeas'][$i]['nombre_idea'];
                    echo '<div class="thumbnail">';
                    echo '<a href="/controllers/ConsultarIdeaController.php?id_idea='.$id.'">';
                    echo '<img class ="previewImg" src= "'.$imagen.'">';
                    echo '<p class= "description">'.$nombre.'</p></a></div>';
                    $i++;
                }
           ?>
	</div>
