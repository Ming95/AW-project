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

  private function diffFechas($fecha){
    $date1 = new DateTime($fecha);
    $date2 = new DateTime("now");
    $diff = $date1->diff($date2);
    return ($diff->days);
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
    $top = ($num == 0) ? $posts : min($num, $posts);
          $i =0;
          while($i<$top){
            $id = $this->list[$i]["id"];
            $imagen = $this->list[$i]['imagen'];
            $nombre = $this->list[$i]['nombre'];
            $description =$this->list[$i]['desc_evento'];
            $dias =$this->diffFechas($this->list[$i]['fecha']);
            $fecha=(!$dias)?'Hoy':'Faltan '.$dias.' diás';

            echo '<div class="evento">';
            echo '<a href="../views/infoevento.php?id_evento='.$id.'">';
            echo '<img class="imgevent" src= "'.$imagen.'">';
        		echo '<div class="textevent">';
        		echo '<p class="nomevent">'.$nombre.'</p>';
            echo '<p class="descevent">'.$fecha.'</p>';
            echo '<p class="descevent">'.$description.'</p></a></div></div>';
            $i++;
          }
    echo '</div>';
  }
}
?>
