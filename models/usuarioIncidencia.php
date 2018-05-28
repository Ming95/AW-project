<?php
require_once 'entidadBase.php';
class usuarioIncidencia extends EntidadBase {

    public function __construct() {
		$this->table = "usuario_incidencia_idea";
        $class = "usuarioIncidencia";
        parent::__construct($this->table, $class);
    }

  public function getLista(){
    return $this->getAllOrderByAsc("id_idea");
  }

	public function nuevaIncidencia($id, $incidencia, $mail){
        $query="INSERT INTO usuario_incidencia_idea (id_correo,id_idea,comentario_incidencia)
               VALUES('".$mail."','".$id."','".$incidencia."')";
        if($this->db()->query($query) == false)
			throw new Exception('MySQL: Error al publicar el comentario');

	}

}

?>
