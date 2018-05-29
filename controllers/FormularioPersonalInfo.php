<?php
require 'Form.php';
require $_SERVER['DOCUMENT_ROOT']."/models/usuario.php";
class FormularioPersonalInfo extends Form
{
    public function __construct() {
        parent::__construct('formPersonalInfo');
    }

    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        <legend>Modificar datos personales</legend>
          <div class="campos-formulario">
		      <h4>Email</h4>
              <input class ="input-box" type="text" name="fname" value='{$_SESSION['mail']}' disabled><br>
		      <h4>Nombre de usuario</h4>
              <input class ="input-box" type="text" name="uname" value='{$_SESSION['login']}'><br>
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

        $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
      	$mail = $_SESSION['mail'];
		if ($username!=null && !empty($username)){
			try{
				$user = new Usuario();
				if($user->getBy("id_correo",$mail)!=null){
						$user->setIdCorreo($mail);
						$user->cambiarNombre($username);
						//Inicia sesión con el nuevo usuario
						$_SESSION["logged"]	= true;
						$_SESSION['login'] = $username;
						//$_SESSION['mail'] = $mail;
						$result[] = "Datos personales modificados correctamente";
						Header("Location: ../views/cambiarPersonalInfo.php");
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
