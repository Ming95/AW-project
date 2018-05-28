<?php
include 'Form.php';
require_once "../models/idea.php";
class FormularioCompra extends Form
{
    private $idea;
    private $comprada;
    public function __construct() {

        try{
          $this->idea = new Idea();
          $this->idea->load($_GET['id']);
        }catch(Exception $e){
          error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
          $_SESSION['data_error']=$e->getMessage();
          header("Location:/errorpage.php");
        }
        $opt = array();
        $opt['action']='../views/compraidea.php?id='.$_GET['id'];
        parent::__construct('FormPatrocina', $opt);
    }

    protected function generaCamposFormulario($datos)
    {
        $this->idea->load($_GET['id']);
        $id = $_GET['id'];
        $nombre = $this->idea->getNombre_Idea();
        $recaudado = $this->idea->getRecaudado();
        $total = $this->idea->getImporte_solicitado();
        $propietario = $this->idea->getNombreUsu();
        $precio = $this->idea->getImporte_venta();
        $max = $total - $recaudado;
        if($this->comprada){
          $loc = '../views/infoIdea.php?id_idea='.$this->idea->getId_idea();
          $html = <<<EOF
          <legend>Comprar Idea</legend>
            <div class="campos-formulario">
            <h1>Enhorabuena!</h1>
            <h4>¡La idea $nombre ahora es de tu propiedad!</h4>
            </div>
            <div class="submit-formulario">
              <input type="button" value="CONTINUAR" class ="boton-formulario" onclick="location.href='$loc'">
            </div>
EOF;
        }
        else{
        $html = <<<EOF
        			<legend>Comprar Idea</legend>
        				<div class="campos-formulario">
                <h2>$nombre</h2>
                <h4>Idea propiedad de $propietario.</h4>
                <h4>La idea ya ha recaudado $recaudado € del total de $total € solicitados.</h4>
                <h1>Vas a pagar $precio € por la idea</h1>
        				</div>
        				<div class="submit-formulario">
        					<input type="button" value="CANCELAR" class ="boton-formulario2" onclick="location.href='../views/infoIdea.php?id_idea=$id'">
        					<input type="submit" value="COMPRAR" class ="boton-formulario">
        				</div>
EOF;
}
        return $html;
    }

    protected function procesaFormulario($datos)
    {
      $result = array();

      $this->comprada=$this->idea->comprar($_SESSION['mail']);

      return $result;
    }
}
