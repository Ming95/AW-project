<?php
require_once 'entidadBase.php';
class Comentario extends EntidadBase {

    public function __construct() {
		$this->table = "usuario_comentario_idea";
        $class = "Comentario";
        parent::__construct($this->table, $class);
    }

  public function getListaIdea($id){
    $req=$this->db()->query("SELECT * FROM usuario_comentario_idea
      JOIN usuario on(usuario_comentario_idea.id_correo = usuario.id_correo)
      WHERE usuario_comentario_idea.id_idea = '$id' ORDER by 'fecha_creacion' DESC ");
    if($req==false){
     throw new Exception('MySQL: Error al realizar la consulta SQL');
   }
       $filas = $this->showData($req);
       return $filas;
  }

  public function getListaUsuario($mail){
    return $this->getAllFilteredAndOrderDESC("fecha_creacion","id_correo",$mail);
  }

	public function newComentario($id, $comentario, $mail, $fecha){
        $query="INSERT INTO usuario_comentario_idea (id_correo,id_idea,comentario,fecha_creacion)
               VALUES('".$mail."','".$id."','".$comentario."','".$fecha."')";
        if($this->db()->query($query) == false)
			throw new Exception('MySQL: Error al publicar el comentario');

	}

}

?>
