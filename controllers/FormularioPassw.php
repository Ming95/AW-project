<?php
require 'Form.php';
require $_SERVER['DOCUMENT_ROOT']."/models/usuario.php";
class FormularioPassw extends Form
{
    public function __construct() {
        parent::__construct('formPass');
    }

    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        <legend>Modificar contraseña</legend>
          <div class="campos-formulario">
              <h4>Contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña entre 8 y 16 caracteres" name="psw"
                      pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
              <p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

              <h4>Repite la contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña que coincida" name="psw2"
                      pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
            </div>
            <div class="submit-formulario">
			  <input type="button" value="VOLVER" class ="boton-formulario2" onclick="location.href='/views/profile.php'">
              <input type="submit" value="GUARDAR Y ACTUALIZAR DATOS" class ="boton-formulario">
			  
            </div>
EOF;
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
					$result[] = "Contraseña modificada correctamente";
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
