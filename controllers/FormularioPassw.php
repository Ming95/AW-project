<?php
require 'Form.php';
require $_SERVER['DOCUMENT_ROOT']."/models/usuario.php";
class FormularioPassw extends Form
{
    private $exito;
    public function __construct() {
      $this->exito = false;
      $opt = array();
      $opt['action']='../views/cambiarPass.php';
      parent::__construct('formPass', $opt);
    }

    protected function generaCamposFormulario($datos)
    {
        if(!$this->exito){
        $html = <<<EOF
        <legend>Modificar contraseña</legend>
          <div class="campos-formulario">
              <h4>Nueva Contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña entre 8 y 16 caracteres" name="psw"
                      pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
              <p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

              <h4>Repite la contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña que coincida" name="psw2"
                      pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
            </div>
            <div class="submit-formulario">
			  <input type="button" value="CANCELAR" class ="boton-formulario2" onclick="location.href='/views/profile.php'">
              <input type="submit" value="GUARDAR" class ="boton-formulario">

            </div>
EOF;
      }
      else{
        $html = <<<EOF
        <h2>Contraseña modificada correctamente</h2>
        <p>Utiliza tu nueva contraseña para tu próximo acceso</p>
        <div class="submit-formulario">
			     <input type="button" value="CONTINUAR" class ="boton-formulario" onclick="location.href='../views/profile.php'">
        </div>
EOF;
      }
        return $html;
    }


    protected function procesaFormulario($datos)
    {
        $result = array();

        $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
      	$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["psw2"])));
      	$mail =  $_SESSION['mail'];
      	//comprueba que las dos contrasenas coincidan
      	if($password==null || empty($password) || $password2==null || empty($password2) || $password != $password2){
      		$result[] = "Las contraseñas no coinciden.";
      	}
      	else{
      		try{
      			$user = new Usuario();
      			if($user->getBy("id_correo",$mail)!=null){
      				$user->setIdCorreo($mail);
      				$user->cambiarPass($password);
					    $this->exito = true;
      			}
      			$user->closeConnection();
      		}catch(Exception $e){
      			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
      			$_SESSION['data_error']=$e->getMessage();
      			$result = '../errorpage.php';
      		}
      	}
        return $result;
    }
}
