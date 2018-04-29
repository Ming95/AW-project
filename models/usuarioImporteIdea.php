<?php

class UsuarioImporteIdea extends EntidadBase {
  private $id_idea;
  private $id_correo;
  private $importe_aportado;
  private $recaudado;
  private $lim_recaudacion;

    public function __construct() {
		$this->table = "usuario_importe_idea";
        $class = "UsuarioImporteIdea";
        parent::__construct($this->table, $class);
    }

	public function getId_idea() {
		return $this->id_idea;
	}
	public function setId_idea($id_idea) {
		$this->id_idea = $id_idea;
	}
	
	public function getId_correo() {
		return $this->id_correo;
	}
	public function setId_correo($id_correo) {
		$this->id_correo = $id_correo;
	}
	public function getImporte_aportado() {
		return $this->importe_aportado;
	}
	public function setImporte_aportado($importe_aportado) {
		$this->importe_aportado = $importe_aportado;
	}

	public function setUsuarioImporteIdea(){			
 		$query="INSERT INTO usuario_importe_idea (id_idea,id_correo,importe_aportado)
               VALUES('".$this->getId_idea()."',
          			  '".$this->getId_correo()."',
          			  '".$this->getImporte_aportado()."');";
         if($this->db()->query($query) == false) 
			throw new Exception('MySQL: Error al realizar la inserción SQL');
	}
  }

?>
