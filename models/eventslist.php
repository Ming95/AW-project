<?php
require_once 'entidadBase.php';
class EventsList extends EntidadBase {
/*
  Clase que permite cargar distintas listas de ideas
*/
  public function __construct() {

	    $this->table = "evento";
      $class = "EventsList";
      parent::__construct($this->table, $class);
  }
  /*

  Genera la lista de eventos recientes

  Parametro $num:
    - Muestra el numero de elementos indicados.
    - si $num == 0 , muestra todos los elementos disponibles

  */
  public function rectentEvents($num){
    $req=$this->db()->query("SELECT * FROM `evento`
                              ORDER BY evento.fecha DESC");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $this->showNList($filas, $num);
  }

  /*

    Muestra los eventos pasados por parametro

  */
  private function showNList($filas, $num){
    $posts=count($filas);
    $height=600+(floor(($posts-1)/3))*450;
    if(!$posts)$height=580;
    $top = ($num == 0) ? $posts : min($num, $posts);
    echo '<div id=topentradas style="height:'.$height.'px">';
    echo '<ul>';
          $i =0;
          while($i<$top){
            $id = $filas[$i]["id"];
            $imagen = $filas[$i]['imagen'];
            $nombre = $filas[$i]['nombre'];

            echo '<div class="thumbnail">';
            echo '<a href="../controllers/ConsultarEventoController.php?id_evento='.$id.'">';
            echo '<img class ="previewImg" src= "'.$imagen.'">';
            echo '<p class= "description">'.$nombre.'</p></a></div>';
            $i++;

          }
    echo '</ul></div>';
  }
}
?>
