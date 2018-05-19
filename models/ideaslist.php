<?php
require_once 'entidadBase.php';
class IdeasList extends EntidadBase {
/*
  Clase que permite cargar distintas listas de ideas
*/
  public function __construct() {

	    $this->table = "idea";
      $class = "IdeasList";
      parent::__construct($this->table, $class);
  }
  /*Muestra las ideas mas valoradas por orden
    Parametro $num:
      - Muestra el numero de elementos indicados.
      - si $num == 0 , muestra todos los elementos disponibles
  */
  public function topRated($num){
    $req=$this->db()->query("SELECT *,COUNT(idea.id_idea) AS rated
                              FROM likes JOIN idea on(idea.id_idea = likes.id_idea)
                              GROUP BY idea.id_idea ORDER BY rated DESC");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $this->showNList($filas, $num);
  }
  //Muestra las ideas de la categoria indicada
  public function categoria($cat){
    /*$req=$this->db()->query("SELECT * FROM post JOIN categories on(post.id_category = categories.id_category)
                                JOIN user on(user.mail = post.mail) WHERE post.id_category= '".$cat."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $this->showAllList($filas);*/
  }
  //Muestra las ideas de un determinado usuario
  public function perfil($mail){
  /*  $req=$this->db()->query("SELECT * FROM post JOIN categories on(post.id_category = categories.id_category)
                                JOIN user on(user.mail = post.mail) WHERE post.mail= '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $this->showAllList($filas);*/
  }

  //Muestra todas las ideas pasadas por parametro
  private function showNList($filas, $num){
    $posts=count($filas);
    $height=600+(floor(($posts-1)/3))*450;
    if(!$posts)$height=580;
    $top = ($num == 0) ? $posts : min($num, $posts);
    echo '<div id=topentradas style="height:'.$height.'px">';
    echo '<ul>';
          $i =0;
          while($i<$top){
            $id = $filas[$i]["id_idea"];
            $imagen = $filas[$i]['imagen'];
            $nombre = $filas[$i]['nombre_idea'];

            echo '<div class="thumbnail">';
            echo '<a href="/controllers/ConsultarIdeaController.php?id_idea='.$id.'">';
            echo '<img class ="previewImg" src= "'.$imagen.'">';
            echo '<p class= "description">'.$nombre.'</p></a></div>';
            $i++;

          }
    echo '</ul></div>';
  }
}
?>
