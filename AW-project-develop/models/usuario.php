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

	public function getUser($user, $pass){
    echo "</br>";
    //Hace la consulta
    $sql = "SELECT id_correo,password FROM usuario WHERE id_correo = '$user'";
    //Guarda el resultado de la consulta en la variable.
    $consulta = mysqli_query($this->db(), $sql);
    //Comprueba si la consulta es vacia
    if (mysqli_num_rows($consulta) == 0) return false;
    //Lee la primera fila
    $fila = mysqli_fetch_array($consulta);


    //Comprueba los resultados
    if($fila['id_correo'] == $user)
      if($fila['password'] == $pass) return true;
    return false;

  }

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
