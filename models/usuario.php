<?php
require_once 'entidadBase.php';
class Usuario extends EntidadBase {

    private $id_correo;
	  private $password;
    private $nombre;
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
        return $this->id_correo;
    }

    public function setIdCorreo($idCorreo) {
        $this->id_correo = $idCorreo;
    }

	   public function getPassword() {
        return $this->password;
    }
	
/* 	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}  */
	
	public function generaPass($newPassword){
		$salt=base64_encode(random_bytes(16));
		$options=[
			'cost'=>8,
			'salt'=>"$salt",
		]	;
		return password_hash($newPassword, PASSWORD_DEFAULT);
	}

    public function setPassword($newPassword) {
		$this->password= $this->generaPass($newPassword);
		//var_dump($this->password);
        //$this->password = encriptar($newPassword);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    //cambiar nombre de usuario en db
    public function cambiarNombre($nuevoNombre){
        $query="UPDATE usuario SET nombre='".$nuevoNombre."'
                WHERE usuario.id_correo = '".$this->getIdCorreo()."'";

        if($this->db()->query($query) == false)
           throw new Exception('MySQL: Error al cambiar el nombre del usuario');
    }

    //cambiar contrasenia de usuario en db
    public function cambiarPass($nuevaPass){
		$encryptedNuevaPass=$this->generaPass($nuevaPass);
        if($nuevaPass==$this->getPassword()) return 0;
        $query="UPDATE usuario SET password='".$encryptedNuevaPass."'
                WHERE usuario.id_correo = '".$this->getIdCorreo()."'";

        if($this->db()->query($query) == false)
           throw new Exception('MySQL: Error al cambiar el nombre del usuario');

        return 1;
    }

    public function getAll(){
        if(!$this->isAdmin())return 0;
        else return $this->getAllOrderByAsc('id_correo');
    }

    //Carga los campos desde db
    public function load($mail){
        $req=$this->db()->query("SELECT *  FROM usuario
                                WHERE usuario.id_correo = '".$mail."'");
        if($req==false)
          throw new Exception('MySQL: Error al cargar el usuario');
        $filas = $this->showData($req);

        $this->setIdCorreo($filas[0]['id_correo']);
        $this->password = $filas[0]['password'];
        $this->setNombre($filas[0]['nombre']);
        $this->setAdmin($filas[0]['admin']);
    }

    //Carga los campos desde db
    public function aportaciones(){
        $req=$this->db()->query("SELECT *, SUM(usuario_importe_idea.importe_aportado)
                                  AS aportado FROM usuario_importe_idea
                                  JOIN idea ON (idea.id_idea = usuario_importe_idea.id_idea)
                                  WHERE usuario_importe_idea.id_correo = '".$this->getIdCorreo()."'
                                  GROUP By usuario_importe_idea.id_idea");
        if($req==false)
          throw new Exception('MySQL: Error al cargar las aportaciones del usuario');
        $filas = $this->showData($req);
        return $filas;
    }

    //Carga los campos desde db
    public function eventos(){
        $req=$this->db()->query("SELECT * FROM usuario_asiste_evento
                                  JOIN evento ON (evento.id = usuario_asiste_evento.id_evento)
                                  WHERE usuario_asiste_evento.mail = '".$this->getIdCorreo()."'");
        if($req==false)
          throw new Exception('MySQL: Error al cargar los eventos del usuario');
        $filas = $this->showData($req);
        return $filas;
    }
    /*
      Borra cuenta de usuario
    */
    public function deleteAccount(){
      $req=$this->db()->query("DELETE FROM usuario_comentario_idea
                                WHERE usuario_comentario_idea.id_correo = '".$this->getIdCorreo()."'");
      $req=$this->db()->query("DELETE FROM usuario_incidencia_idea
                                WHERE usuario_incidencia_idea.id_correo = '".$this->getIdCorreo()."'");
      $req=$this->db()->query("DELETE FROM usuario_importe_idea
                                WHERE usuario_importe_idea.id_correo = '".$this->getIdCorreo()."'");
      $req=$this->db()->query("DELETE FROM likes
                                WHERE likes.mail = '".$this->getIdCorreo()."'");
      $req=$this->db()->query("DELETE FROM idea
                                WHERE idea.id_correo = '".$this->getIdCorreo()."'");
      $req=$this->db()->query("DELETE FROM usuario_asiste_evento
                                WHERE usuario_asiste_evento.mail = '".$this->getIdCorreo()."'");
      $this->deleteBy('id_correo',$this->getIdCorreo());
      header("Location: '../views/logout.php'");
    }
    /*
      Guarda el usuario en la base de datos
    */
  	public function signupUser(){
        $query="INSERT INTO usuario (id_correo,password,nombre,admin)
                  VALUES('".$this->id_correo."',
                         '".$this->password."',
                         '".$this->nombre."',
                         '".$this->admin."');";

        if($this->db()->query($query) == false)
  			   throw new Exception('MySQL: Error al crear usuario');
    }
}
?>
