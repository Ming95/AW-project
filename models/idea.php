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
  private $importe_solicitado;
  private $imagen;


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
	public function getImporte_solicitado() {
		return $this->importe_solicitado;
	}
	public function setImporte_Solicitado($importe_solicitado) {
		$this->importe_solicitado = $importe_solicitado;
	}
  public function getImagen() {
    return $this->imagen;
  }
  public function setImagen($imagen) {
    $this->imagen = $imagen;
  }
  public function setIdea(){
        $query="INSERT INTO idea (nombre_idea,id_categoria,fecha_limite,desc_idea,enVenta,popularidad,id_correo,importe_venta,cv_equipo,imagen,importe_solicitado)
               VALUES('".$this->getNombre_Idea()."',
                       '".$this->getId_Categoria()."',
                       '".$this->getFecha_Limite()."',
                       '".$this->getDesc_idea()."',
          					   '".$this->getEnVenta()."',
          					   '".$this->getPopularidad()."',
          					   '".$this->getId_Correo()."',
          					   '".$this->getImporte_Venta()."',
          					   '".$this->getCv_Equipo()."',
                       '".$this->getImagen()."',
							   '".$this->getImporte_solicitado()."');";
        if($this->db()->query($query) == false)
			      throw new Exception('MySQL: Error al realizar la inserción SQL');
          //Consigue el ID de la BBDD
         $query = $this->getBy('nombre_idea', $this->getNombre_Idea());
         
         $this->id_idea =$query[0]['id_idea'];
	}


}
?>
