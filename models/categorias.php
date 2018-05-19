<?php
require_once 'entidadBase.php';
class Categorias extends EntidadBase {

  private $categorias;

  public function __construct() {

	    $this->table = "categorias";
      $class = "Categorias";
      parent::__construct($this->table, $class);
      $this->categorias=array();
      $this->load();
  }
//Carga todas las categorias en el array
  private function load(){
    $req=$this->db()->query("SELECT valor FROM categorias");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $i=0;
    while(isset($filas[$i]['valor'])){
      $this->categorias[$i] = $filas[$i]['valor'];
      $i++;
    }
  }

  public function getPos($value){
    return array_search($value, $this->categorias)+1;
  }

  public function getValue($id){
    return $this->categorias[($id-1)];
  }

  public function getCategorias(){
    return $this->categorias;
	}

}
?>
