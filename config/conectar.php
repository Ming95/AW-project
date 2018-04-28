<?php
class Conectar{
    //Realiza la conexion co la base de datos
    private $servername, $username, $password, $database, $driver;
    /*
      construct: lee los datos de entorno.ini
    */
    public function __construct() {
		$ini_array = parse_ini_file("entorno.ini", true);
		if($ini_array==null)
			throw new Exception('MySQL: Error al abrir entorno configuración para conexión BBDD');
		else{
			$this->servername=$ini_array['SELFIDEA']['servername'];
			$this->username=$ini_array['SELFIDEA']['username'];
			$this->password=$ini_array['SELFIDEA']['password'];
			$this->database=$ini_array['SELFIDEA']['database'];
			if ($this->servername==null or empty($this->servername) or
			$this->username==null or empty($this->username) or
			$this->password==null or empty($this->password) or
			$this->database==null or empty($this->database)){
				throw new Exception('MySQL: Error al leer datos de configuración para conexión BBDD');
			}
		}
    }

    /*
      conexion: extablece la conexion con la base de datos
    */
    public function getConexion(){
        if($this->driver=="mysql" || $this->driver==null){
        	$db = new mysqli($this->servername, $this->username, $this->password, $this->database);
        	if ($db->connect_error) {
					die("Connection failed: " . $db->connect_error);
					throw new Exception('MySQL: Error al realizar la conexión con la BBDD');
			}
        }
        return $db;
    }
	
	public function closeConexion($db){
		mysqli_close($db);
	}
}
?>
