<?php
require_once 'entidadBase.php';
class Rating extends EntidadBase {

  public function __construct() {

	    $this->table = "likes";
      $class = "Rating";
      parent::__construct($this->table, $class);
      $this->comentarios=array();
  }
  //boolean indica si al usuario le ha gustado
  public function isLiked($id, $mail){
    $req=$this->db()->query("SELECT * FROM likes WHERE id_idea = '".$id."' AND mail = '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    return (count($filas)>0);
  }
  //crea un me gusta en db
  public function like($id, $mail){
    $query="INSERT INTO likes(id_idea, mail)
            VALUES ('".$id."','".$mail."')";

    if($this->db()->query($query) == false)
       throw new Exception('MySQL: Error al realizar la inserción SQL');
  }
  //elimina un me gusta en db
  public function dislike($id, $mail){
    $req=$this->db()->query("DELETE FROM likes WHERE id_idea = '".$id."' AND mail = '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
  }

}
?>
