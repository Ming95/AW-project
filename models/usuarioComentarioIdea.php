<?php
//include 'entidadBase.php';
class UsuarioComentarioIdea extends EntidadBase {
  private $id;
  private $id_correo;
  private $id_idea;
  private $comentario;
  private $fecha_creacion;

    public function __construct() {
		$this->table = "usuario_comentario_idea";
        $class = "UsuarioComentarioIdea";
        parent::__construct($this->table, $class);
    }

	public function getId_idea() {
		return $this->id_idea;
	}
	public function setId_idea($id_idea) {
		$this->id_idea = $id_idea;
	}
	
	public function getId_correo() {
		return $this->id_correo;
	}
	public function setId_correo($id_correo) {
		$this->id_correo = $id_correo;
	}
	public function getComentario() {
		return $this->comentario;
	}
	public function setComentario($comentario) {
		$this->comentario = $comentario;
	}

	public function getFecha_creacion() {
		return $this->fecha_creacion;
	}
	public function setFecha_creacion($fecha_creacion) {
		$this->fecha_creacion = $fecha_creacion;
	}
	public function setUsuarioComentarioIdea(){
        $query="INSERT INTO usuario_comentario_idea (id_correo,id_idea,comentario,fecha_creacion)
               VALUES('".$this->id_correo."',
                       '".$this->id_idea."',
					   '".$this->comentario."',
					   '".$this->fecha_creacion."');";
        if($this->db()->query($query) == false) 
			throw new Exception('MySQL: Error al realizar la inserción SQL');
		else
			echo "Idea guardada correctamente";
	}
  }

?>
