<?php
include 'Form.php';
require_once "../models/idea.php";
class FormularioPatrocina extends Form
{
    private $idea;
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
        $opt['action']='../views/patrocina.php?id='.$_GET['id'];
        parent::__construct('FormPatrocina', $opt);
    }

    protected function generaCamposFormulario($datos)
    {
        $this->idea->load($_GET['id']);
        $nombre = $this->idea->getNombre_Idea();
        $recaudado = $this->idea->getRecaudado();
        $total = $this->idea->getImporte_solicitado();
        $max = $total - $recaudado;
        if(isset($datos['aportacion'])){
          $aportado = $datos['aportacion'];
          $loc = '../views/infoIdea.php?id_idea='.$this->idea->getId_idea();
          $html = <<<EOF
          <legend>Idea patrocinada</legend>
            <div class="campos-formulario">
            <h1>¡Muchas gracias por tu aportación de $aportado €!</h1>
            <p>La idea ya ha recaudado $recaudado € del total de $total € solicitados.</p>
            </div>
            <div class="submit-formulario">
              <input type="button" value="CONTINUAR" class ="boton-formulario" onclick="location.href='$loc'">
            </div>
EOF;
        }
        else{
        $html = <<<EOF
        			<legend>Patrocinar Idea</legend>
        				<div class="campos-formulario">
                <h4>$nombre</h4>
                <p>La idea ya ha recaudado $recaudado € del total de $total € solicitados.</p>
        				<h4>Aportación (€)</h4> <input class ="input-box" type="number" name="aportacion" placeholder="Introduce tu aportación" min="1" max="$max" required>
        				</div>
        				<div class="submit-formulario">
        					<input type="button" value="CANCELAR" class ="boton-formulario2" onclick="location.href='/views/signup.php'">
        					<input type="submit" value="PATROCINAR" class ="boton-formulario">
        				</div>
EOF;
}
        return $html;
    }

    protected function procesaFormulario($datos)
    {
      $result = array();
      if(!isset($datos)) $result[] = "Error al realizar el pago";
      else
        $this->idea->patrocinar($_SESSION['mail'], $datos['aportacion']);

      return $result;
    }
}
