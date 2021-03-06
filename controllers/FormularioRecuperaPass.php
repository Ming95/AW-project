<?php
require 'Form.php';
require $_SERVER['DOCUMENT_ROOT']."/models/usuario.php";
class FormularioRecuperaPass extends Form
{
    public function __construct() {
        parent::__construct('formPersonalInfo');
    }

    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        <legend>Recuperar contraseña</legend>
          <div class="campos-formulario">
			  <h4>Ha superado el número de intentos. Por favor, introduzca su correo electronico y le enviaremos su nueva password</h4>
			  <h4>Email</h4> <input class ="input-box" type="text" name="mail" placeholder="Introduce tu e-mail" required>
            </div>
            <div class="submit-formulario">
			  <input type="button" value="REGISTRAR" class ="boton-formulario2" onclick="location.href='/views/signup.php'">
                <input type="button" value="ENVIAR" class ="boton-formulario" onclick="location.href='../index.php'">
        </div>
EOF;
        return $html;
    }


    protected function procesaFormulario($datos)
    {
        $result = array();

        $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
		if ($username==null || empty($username)){
			$result[] = "Campos de entrada vacíos o nulos";
			return $result;
		}
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
