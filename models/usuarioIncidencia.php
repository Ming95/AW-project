<?php
require_once 'entidadBase.php';
class usuarioIncidencia extends EntidadBase {

    public function __construct() {
		$this->table = "usuario_incidencia_idea";
        $class = "usuarioIncidencia";
        parent::__construct($this->table, $class);
    }

  public function getLista(){
    $req=$this->db()->query("SELECT * FROM $this->table
      JOIN idea on (idea.id_idea = usuario_incidencia_idea.id_idea) ORDER by 'id_idea' ASC ");
    if($req==false){
     throw new Exception('MySQL: Error al realizar la consulta SQL');
   }
       $filas = $this->showData($req);
       return $filas;
  }

  public function delete($id){
    $this->deleteById($id);
  }

	public function nuevaIncidencia($id, $incidencia, $mail){
        $query="INSERT INTO usuario_incidencia_idea (id_correo,id_idea,comentario_incidencia)
               VALUES('".$mail."','".$id."','".$incidencia."')";
        if($this->db()->query($query) == false)
			throw new Exception('MySQL: Error al publicar el comentario');

	}

}

?>
