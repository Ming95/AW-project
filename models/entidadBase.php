<?php
/**
 * Created by IntelliJ IDEA.
 * User: mcardenas
 * Date: 10/05/17
 * Time: 12:21
 */

class EntidadBase{

    /**
     * @var string
     */
    private $table;
    private $class;

    private $db;

    public function db() {
        return $this->db;
    }

    /**
     * EntityBase constructor.
     * @param $table
     */
    public function __construct($table, $class) {
        $this->table=(string) $table;
        $this->class=(string) $class;
        //$this->db = ConnDB::getConn();
		require_once '../config/conectar.php';
		$conectar=new Conectar();
        $this->db=$conectar->conexion();
		if ($this->db->connect_error) {
			 die("Connection failed: " . $db->connect_error);
		}else{
			echo "conexión realizada ok";
		}
    }

    public function getAll(){
        $req=$this->db()->query("SELECT * FROM $this->table");
        //$resultSet = $query->fetch_assoc(PDO::FETCH_CLASS, $this->class);
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
