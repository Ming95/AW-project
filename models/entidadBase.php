<?php

class EntidadBase{

    private $table;
    private $class;

    private $db;

    public function db() {
        return $this->db;
    }

    /**
     * EntityBase constructor.
     * @param $table, $class
     */
    public function __construct($table, $class) {
        $this->table=(string) $table;
        $this->class=(string) $class;
    		require_once './config/conectar.php';
    		$conectar=new Conectar();
        $this->db=$conectar->conexion();

		    if ($this->db->connect_error)
			       die("Connection failed: " . $db->connect_error);
    }

	/*Selecciona todos los elementos ordenados por la columna indicada y orden ascendente*/
	public function getAllOrderByAsc($column){
		 $req=$this->db()->query("SELECT * FROM $this->table ORDER by $column ASC ");
    		$filas = $this->showData($req);
        return $filas;
	}
	/*Selecciona todos los elementos ordenados por la columna indicada y orden descendente*/
	public function getAllOrderByDesc($column){
		 $req=$this->db()->query("SELECT * FROM $this->table ORDER by $column DESC");
    		$filas = $this->showData($req);
        return $filas;
	}

	private function showData($resultSet){
		$filas= array();
		while ($fila = $resultSet->fetch_assoc()) {
			$filas[] = $fila;
		}
    return $filas;
	}

    public function getById($id){
        $id = intval($id);
        $req = $this->db->prepare("SELECT * FROM $this->table  WHERE id = :id");
        //$req->execute(array('id' => $id));
        //$result = $req->fetchAll(PDO::FETCH_CLASS, $this->class);
		    $filas = $this->showData($req);
        return $result;
    }

	/*Selecciona todas las filas correspondientes a la columna y valor indicados*/
    public function getBy($column, $value){
		    $consulta ="SELECT * FROM $this->table WHERE $column = '$value'";
        $req = $this->db()->query($consulta);
		    $filas = $this->showData($req);
        return $filas;
    }

    public function deleteById($id){
        $id = intval($id);
        $query=$this->db()->query("DELETE FROM $this->table WHERE id = $id");
        return $query;
    }

    public function deleteBy($column,$value){
        $query=$this->db()->query("DELETE FROM $this->table WHERE $column = '$value'");
        return $query;
    }
	
	

}
?>
