<?php
include 'Form.php';
require_once "../models/idea.php";
require '../models/usuarioIncidencia.php';
if(!isset($_SESSION['mail'])) header('Location: ../views/login.php');
class FormularioReporta extends Form
{
    private $idea;
    public function __construct() {

        try{
          $this->idea = new Idea();
          $this->idea->load($_GET['id']);
        }catch(Exception $e){
          error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
          $_SESSION['data_error']=$e->getMessage();
          //header("Location:/errorpage.php");
        }
        $opt = array();
        $opt['action']='../views/reportaincidencia.php?id='.$_GET['id'];
        parent::__construct('FormReporta', $opt);
    }

    protected function generaCamposFormulario($datos)
    {
        $this->idea->load($_GET['id']);
        $id = $_GET['id'];
        $nombre = $this->idea->getNombre_Idea();
        $html = <<<EOF
        			<legend>Reportar Idea</legend>
        				<div class="campos-formulario">
                <h4>$nombre</h4>
                <p>Tu reporte será revisado por el administrador.</p>
        				<textarea class ="input-text" name="reporte" placeholder="Introduce tus sugerencias o problemas" required></textarea>
        				</div>
        				<div class="submit-formulario">
        					<input type="button" value="CANCELAR" class ="boton-formulario2" onclick="location.href='../views/infoIdea.php?id_idea=$id'">
        					<input type="submit" value="REPORTAR" class ="boton-formulario">
        				</div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
      $result = array();
      if(!isset($datos)) $result[] = "Error al realizar el reporte";
      else{
        $report = new usuarioIncidencia();
        $text = nl2br(htmlentities($_POST['reporte'], ENT_QUOTES, 'UTF-8'));
        $report->nuevaIncidencia($_GET['id'], $text, $_SESSION['mail']);
        $result = "../views/infoIdea.php?id_idea=".$_GET['id'];
      }

      return $result;
    }
}
