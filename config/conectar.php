<?php
class Conectar{
    private $servername, $username, $password, $database, $driver;

    public function __construct() {
		//echo "iniciando conexión..";
		$ini_array = parse_ini_file("entorno.ini", true);
		$this->servername=$ini_array['SELFIDEA']['servername'];
		$this->username=$ini_array['SELFIDEA']['username'];
		$this->password=$ini_array['SELFIDEA']['password'];
		$this->database=$ini_array['SELFIDEA']['database'];
    }

    public function conexion(){
        //print($this->servername);
        if($this->driver=="mysql" || $this->driver==null){
		$db = new mysqli($this->servername, $this->username, $this->password, $this->database);
		if ($db->connect_error) {
			 die("Connection failed: " . $db->connect_error);
		}//else{
			// echo "conexión realizada ok";
		// }
        }
        return $db;
    }
}
?>
