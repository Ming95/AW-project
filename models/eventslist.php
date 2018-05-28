<?php
require_once 'entidadBase.php';
class EventsList extends EntidadBase {
/*
  Clase que permite cargar distintas listas de ideas
*/
  private $list;

  public function __construct() {

	    $this->table = "evento";
      $class = "EventsList";
      parent::__construct($this->table, $class);
  }
  public function getList(){
    return $this->list;
  }
  /*

  Genera la lista de eventos recientes

  */
  public function rectentEvents(){
    $req=$this->db()->query("SELECT * FROM `evento`
                              ORDER BY evento.fecha DESC");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $this->list = $this->showData($req);
  }

  /*

    Muestra los eventos pasados por parametro
    Parametro $num:
      - Muestra el numero de elementos indicados.
      - si $num == 0 , muestra todos los elementos disponibles
  */
  public function showNList($num){
    if(!isset($this->list)) $this->rectentEvents();
    $posts=count($this->list);
    $height=600+(floor(($posts-1)/3))*450;
    if(!$posts)$height=580;
    $top = ($num == 0) ? $posts : min($num, $posts);
    echo '<div id=topentradas style="height:'.$height.'px">';
    echo '<ul>';
          $i =0;
          while($i<$top){
            $id = $this->list[$i]["id"];
            $imagen = $this->list[$i]['imagen'];
            $nombre = $this->list[$i]['nombre'];

            echo '<div class="thumbnail">';
            echo '<a href="../views/infoevento.php?id_evento='.$id.'">';
            echo '<img class ="previewImg" src= "'.$imagen.'">';
            echo '<p class= "description">'.$nombre.'</p></a></div>';
            $i++;

          }
    echo '</ul></div>';
  }
}
?>
