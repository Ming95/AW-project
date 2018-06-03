<?php
require_once 'entidadBase.php';
class Evento extends EntidadBase {
  private $id;
  private $nombre;
  private $fecha;
  private $descripcion;
  private $imagen;
  private $num_asistentes;
  private $max_asistentes;



  public function __construct() {
		$this->table = "evento";
        $class = "evento";
        parent::__construct($this->table, $class);
  }

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getFecha() {
		return $this->fecha;
	}
	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}

  public function getDescripcion() {
    return $this->descripcion;
  }
  public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  public function getImagen() {
    return $this->imagen;
  }
  public function setImagen($imagen) {
    $this->imagen = $imagen;
  }

  public function getNum_asistentes() {
    return $this->num_asistentes;
  }
  public function setNum_asistentes($num_asistentes) {
    $this->num_asistentes = $num_asistentes;
  }

  public function getMax_asistentes() {
    return $this->max_asistentes;
  }
  public function setMax_asistentes($max_asistentes) {
    $this->max_asistentes = $max_asistentes;
  }

  //Carga los campos desde db
  public function load($id){
      $req=$this->db()->query("SELECT *  FROM evento
                              WHERE evento.id = '".$id."'");
      if($req==false)
        throw new Exception('MySQL: Error al realizar la consulta SQL');
      $filas = $this->showData($req);

      $this->setId($filas[0]['id']);
      $this->setNombre($filas[0]['nombre']);
      $this->setFecha($filas[0]['fecha']);
      $this->setDescripcion($filas[0]['desc_evento']);
      $this->setNum_asistentes($filas[0]['num_usuarios']);
      $this->setMax_asistentes($filas[0]['max_usuarios']);
      $this->setImagen($filas[0]['imagen']);
    }

  public function setEvento(){
        $query="INSERT INTO evento (id,nombre,fecha,imagen,desc_evento,num_usuarios,max_usuarios)
               VALUES('".$this->getId()."',
                       '".$this->getNombre()."',
                       '".$this->getFecha()."',
                       '".$this->getImagen()."',
          					   '".$this->getDescripcion()."',
          					   '".$this->getNum_asistentes()."',
          					   '".$this->getMax_asistentes()."');";
        if($this->db()->query($query) == false)
			throw new Exception('MySQL: Error al realizar la inserción SQL');
	}


}
?>
