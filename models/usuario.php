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

    public function isAdmin() {
        return $this->admin;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
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

	public function signupUser(){
		//echo "Guardando usuario..";
        $query="INSERT INTO usuario (id_correo,password,nombre,imagen,admin)
                VALUES('".$this->id_correo."',
                       '".$this->password."',
                       '".$this->nombre."',
                       '".$this->imagen."',
                       '".$this->admin."');";
        if($this->db()->query($query) == TRUE){
			//echo "Usuario creado correctamente";
		}
    }
}
?>
