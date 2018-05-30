<?php
require_once 'entidadBase.php';
class IdeasList extends EntidadBase {
/*
  Clase que permite cargar distintas listas de ideas
*/
  private $list;

  public function __construct() {
      $list = array();
	    $this->table = "idea";
      $class = "IdeasList";
      parent::__construct($this->table, $class);
  }
  public function getList(){
    return $this->list;
  }
  public function getAll(){
    return $this->getAllOrderByAsc('fecha_limite');
  }
  /*Muestra las ideas mas valoradas por orden
    Parametro $num:
      - Muestra el numero de elementos indicados.
      - si $num == 0 , muestra todos los elementos disponibles
  */
  public function topRated(){
    $req=$this->db()->query("SELECT *,COUNT(idea.id_idea) AS rated
                              FROM likes JOIN idea on(idea.id_idea = likes.id_idea)
                              GROUP BY idea.id_idea ORDER BY rated DESC");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $this->list = $this->showData($req);
  }
  //Muestra las ideas de la categoria indicada
  public function categoria($cat){
    $req=$this->db()->query("SELECT * FROM idea JOIN categorias
                            on(idea.id_categoria = categorias.id_categoria)
                            WHERE idea.id_categoria = '".$cat."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL: no se han podido mostrar las categorias');
    $this->list = $this->showData($req);
  }
  //Muestra las ideas de un determinado usuario
  public function perfil($mail){
    $req=$this->db()->query("SELECT * FROM idea JOIN categorias
                            on(idea.id_categoria = categorias.id_categoria)
                            WHERE idea.id_correo = '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL: no se han podido mostrar las ideas del usuario');
    $this->list = $this->showData($req);
  }

  //consulta ideas relacionadas
  public function ideasRelacionadas($id, $cat){
    $req=$this->db()->query("SELECT * FROM idea JOIN categorias on(idea.id_categoria = categorias.id_categoria)
                              WHERE idea.id_categoria = '".$cat."' AND idea.id_idea != '".$id."'
                              ORDER BY idea.fecha_limite ASC");
    if($req==false)
      throw new Exception('MySQL: Error al consultar topIdeas por categoria');
    $filas = $this->showData($req);
    if(count($filas)) $this->list = $filas;
    else {
      $req=$this->db()->query("SELECT * FROM idea JOIN categorias on(idea.id_categoria = categorias.id_categoria)
                                WHERE idea.id_idea != '".$id."'
                                ORDER BY idea.fecha_limite ASC");
      if($req==false)
        throw new Exception('MySQL: Error al consultar topIdeas por fecha');
      $this->list = $this->showData($req);
    }
  }

  //Muestra todas las ideas pasadas por parametro
  public function showNList($num){
    if(!isset($this->list)) $this->rectentEvents();
    $posts=count($this->list);
    $top = ($num == 0) ? $posts : min($num, $posts);
    echo '<div class=topentradas>';
          $i =0;
          while($i<$top){
            $id = $this->list[$i]["id_idea"];
            $imagen = $this->list[$i]['imagen'];
            $nombre = $this->list[$i]['nombre_idea'];
            $description = $this->list[$i]['desc_idea'];

            echo '<div class="i_thumbnail">';
            echo '<a href="../views/infoIdea.php?id_idea='.$id.'">';
            echo '<img class ="previewImg" src= "'.$imagen.'">';
            echo '<p class= "title">'.$nombre.'</p>';
            echo '<p class= "description">'.$description.'</p></a></div>';
            $i++;
          }
    echo '</div>';
  }
}
?>
