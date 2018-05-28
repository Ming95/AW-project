<?php
require_once 'entidadBase.php';
class Subscription extends EntidadBase {

  public function __construct() {

	    $this->table = "usuario_asiste_evento";
      $class = "Subscription";
      parent::__construct($this->table, $class);
      $this->comentarios=array();
  }
  //boolean indica si al usuario le ha gustado
  public function isSub($id, $mail){
    $req=$this->db()->query("SELECT * FROM ".$this->table." WHERE id_evento = '".$id."' AND mail = '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    return (count($filas)>0);
  }
  //crea un me gusta en db
  public function sub($id, $mail){
    $query="INSERT INTO ".$this->table." (id_evento, mail)
            VALUES ('".$id."','".$mail."')";

    if($this->db()->query($query) == false)
       throw new Exception('MySQL: Error al realizar subscripcion');
  }
  //elimina un me gusta en db
  public function unsub($id, $mail){
    $req=$this->db()->query("DELETE FROM ".$this->table." WHERE id_evento = '".$id."' AND mail = '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar desubscripcion');
  }

}
?>
