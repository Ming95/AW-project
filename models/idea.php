<?php

class Idea extends EntidadBase {
  private $id_idea;
  private $nombre_Idea;
  private $id_categoria;
  private $fecha_limite;
  private $desc_idea;
  private $enVenta;
  private $popularidad;
  private $id_correo;
  private $importe_venta;
  private $cv_equipo;
  
    
     
    public function __construct() {
		$this->table = "idea";
        $class = "Idea";
        parent::__construct($this->table, $class);
    }
     
	public function getId_idea() {
		return $this->id_idea;
	}
	public function setId_idea($id_idea) {
		$this->id_idea = $id_idea;
	}
	public function getNombre_Idea() {
		return $this->nombre_Idea;
	}
	public function setNombre_Idea($nombre_Idea) {
		$this->nombre_Idea = $nombre_Idea;
	}
	public function getId_categoria() {
		return $this->id_categoria;
	}
	public function setId_categoria($id_categoria) {
		$this->id_categoria = $id_categoria;
	}
	public function getFecha_limite() {
		return $this->fecha_limite;
	}
	public function setFecha_limite($fecha_limite) {
		$this->fecha_limite = $fecha_limite;
	}
	public function getDesc_idea() {
		return $this->desc_idea;
	}
	public function setDesc_idea($desc_idea) {
		$this->desc_idea = $desc_idea;
	}
	public function getEnVenta() {
		return $this->enVenta;
	}
	public function setEnVenta($enVenta) {
		$this->enVenta = $enVenta;
	}
	public function getPopularidad() {
		return $this->popularidad;
	}
	public function setPopularidad($popularidad) {
		$this->popularidad = $popularidad;
	}
	public function getId_correo() {
		return $this->id_correo;
	}
	public function setId_correo($id_correo) {
		$this->id_correo = $id_correo;
	}
	public function getImporte_venta() {
		return $this->importe_venta;
	}
	public function setImporte_venta($importe_venta) {
		$this->importe_venta = $importe_venta;
	}
	public function getCv_equipo() {
		return $this->cv_equipo;
	}
	public function setCv_equipo($cv_equipo) {
		$this->cv_equipo = $cv_equipo;
	}
	public function setIdea($idea){
		echo "Guardando idea..";
        $query="INSERT INTO idea (nombre_idea,id_categoria,fecha_limite,desc_idea,enVenta,popularidad,id_correo,importe_venta,cv_equipo)
               VALUES('".$idea->getNombre_Idea()."',
                       '".$idea->getId_Categoria()."',
                       '".$idea->getFecha_Limite()."',
                       '".$idea->getDesc_idea()."',
					   '".$idea->getEnVenta()."',
					   '".$idea->getPopularidad()."',
					   '".$idea->getId_Correo()."',
					   '".$idea->getImporte_Venta()."',
					   '".$idea->getCv_Equipo()."');";
        if($this->db()->query($query) == TRUE){
			echo "Idea creada correctamente";
		}
    }
}
?>