<?php
require_once 'entidadBase.php';
class Comentario extends EntidadBase {

    public function __construct() {
		$this->table = "usuario_comentario_idea";
        $class = "Comentario";
        parent::__construct($this->table, $class);
    }

  public function getLista($id){
    return $this->getAllFilteredAndOrderDESC("fecha_creacion","id_idea",$id);
  }

	public function newComentario($id, $comentario, $mail, $fecha){
        $query="INSERT INTO usuario_comentario_idea (id_correo,id_idea,comentario,fecha_creacion)
               VALUES('".$mail."','".$id."','".$comentario."','".$fecha."')";
        if($this->db()->query($query) == false)
			throw new Exception('MySQL: Error al publicar el comentario');

	}

}

?>
