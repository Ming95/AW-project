<?php
include 'entidadBase.php';
class Usuario extends EntidadBase {
    private $id_correo;
	  private $password;
    private $nombre;
    private $imagen;
    private $admin;


    public function __construct(){
		$this->table = "usuario";
        $class = "Usuario";
        parent::__construct($this->table, $class);
    }

    public function getIdCorreo() {
        return $this->idCorreo;
    }

    public function setIdCorreo($idCorreo) {
        $this->id_correo = $idCorreo;
    }

	public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

	// public function getUser($user, $pass){
    //Hace la consulta
    // $consulta = $this->getBy('id_correo', $user);
    //Comprueba los resultados
	// if($consulta==null)
		// return null;
    // else if(($consulta[0]['id_correo'] == $user) and ($consulta[0]['password'] == $pass))
		// return $consulta;
	// else 
		// return null;
    

  // }

	public function setUser($user){
		//echo "Guardando usuario..";
        $query="INSERT INTO usuario (id_correo,password,nombre,imagen,admin)
                VALUES('".$user->id_correo."',
                       '".$user->password."',
                       '".$user->nombre."',
                       '".$user->imagen."',
                       '".$user->admin."');";
        if($this->db()->query($query) == TRUE){
			echo "Usuario creado correctamente";
		}
    }
}
?>
