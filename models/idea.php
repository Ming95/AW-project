<?php
require_once 'entidadBase.php';
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
  private $categoria;
  private $recaudado;
  private $diasFin;

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
  public function getCategoria() {
    return $this->categoria;
  }
  public function setCategoria($cat) {
    $this->categoria = $cat;
  }
  public function getRecaudado() {
    return $this->recaudado;
  }
  public function setRecaudado($recaudado) {
    $this->recaudado = $recaudado;
  }
  public function getDiasFin() {
    return $this->diasFin;
  }
  public function setDiasFin($diasFin) {
    $this->diasFin = $diasFin;
  }

  private function diffFechas($fecha){
		$date1 = new DateTime($fecha);
		$date2 = new DateTime("now");
		$diff = $date1->diff($date2);
		return ($diff->days);
	}

  private function loadRecaudado(){
    $req=$this->db()->query("SELECT SUM(usuario_importe_idea.importe_aportado)AS recaudado
                            FROM idea JOIN usuario_importe_idea on (idea.id_idea = usuario_importe_idea.id_idea)
                            WHERE idea.id_idea = ".$this->getId_idea()." GROUP BY idea.id_idea");
    if($req==false)
      throw new Exception('MySQL: Error al cargar la recaudación');
    $filas = $this->showData($req);
    $this->setRecaudado((!count($filas))?0:$filas[0]['recaudado']);
  }
  private function loadPopularidad(){
    $req=$this->db()->query("SELECT COUNT(*) AS pop FROM likes WHERE likes.id_idea = ".$this->getId_idea()."");
    if($req==false)
      throw new Exception('MySQL: Error al cargar la popularidad');
    $filas = $this->showData($req);
    $this->setPopularidad((!count($filas))?0:$filas[0]['pop']);
  }

  //Carga los campos desde db
  public function load($id){
      $req=$this->db()->query("SELECT *  FROM idea JOIN categorias
                              on (idea.id_categoria=categorias.id_categoria)
                              WHERE idea.id_idea = ".$id." GROUP BY idea.id_idea");
      if($req==false)
        throw new Exception('MySQL: Error al cargar la idea');
      $filas = $this->showData($req);

      $this->setId_idea($filas[0]['id_idea']);
      $this->setNombre_Idea($filas[0]['nombre_idea']);
      $this->setId_categoria($filas[0]['id_categoria']);
      $this->setFecha_limite($filas[0]['fecha_limite']);
      $this->setDesc_idea($filas[0]['desc_idea']);
      $this->setEnVenta($filas[0]['enVenta']);
      $this->setId_correo($filas[0]['id_correo']);
      $this->setImporte_venta($filas[0]['importe_venta']);
      $this->setCv_equipo($filas[0]['cv_equipo']);
      $this->setImporte_Solicitado($filas[0]['importe_solicitado']);
      $this->setImagen($filas[0]['imagen']);
      $this->setCategoria($filas[0]['valor']);
      $this->setDiasFin($this->diffFechas($this->getFecha_Limite()));
      $this->loadRecaudado();
      $this->loadPopularidad();
  	}

    //Inserta los datos en la db
  public function setIdea(){
        $query="INSERT INTO idea (nombre_idea, id_categoria, fecha_limite, desc_idea, enVenta, id_correo, importe_venta, cv_equipo, importe_solicitado, imagen)
                VALUES('".$this->getNombre_Idea()."',
                       '".$this->getId_Categoria()."',
                       '".$this->getFecha_Limite()."',
                       '".$this->getDesc_idea()."',
          					   '".$this->getEnVenta()."',
          					   '".$this->getId_Correo()."',
          					   '".$this->getImporte_Venta()."',
          					   '".$this->getCv_Equipo()."',
							         '".$this->getImporte_solicitado()."',
                       '".$this->getImagen()."');";
        if($this->db()->query($query) == false)
			      throw new Exception('MySQL: Error al realizar la inserción SQL. setIdea()');

        $query="UPDATE idea SET enVenta = NULL WHERE idea.enVenta=0";
        if($this->db()->query($query) == false)
            throw new Exception('MySQL: Error al realizar la inserción SQL. Update');

        $query="UPDATE idea SET importe_venta = NULL WHERE idea.importe_venta=0";
        if($this->db()->query($query) == false)
            throw new Exception('MySQL: Error al realizar la inserción SQL. Update');

          //Consigue el ID de la BBDD
         $query = $this->getBy('nombre_idea', $this->getNombre_Idea());

         $this->setId_idea($query[0]['id_idea']);
	}

  public function setFiles($cv, $img){
        $query="UPDATE idea SET cv_equipo = '".$cv."' WHERE idea.id_idea='".$this->getId_idea()."'";
        if($this->db()->query($query) == false)
            throw new Exception('MySQL: Error al realizar la inserción SQL. setFiles()');
        $query="UPDATE idea SET imagen = '".$img."' WHERE idea.id_idea='".$this->getId_idea()."'";
        if($this->db()->query($query) == false)
            throw new Exception('MySQL: Error al realizar la inserción SQL. setFiles()');
          //Consigue el ID de la BBDD
         $query = $this->getBy('nombre_idea', $this->getNombre_Idea());

         $this->setId_idea($query[0]['id_idea']);
  }

}
?>
