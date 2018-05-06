<?php
include 'Form.php';
include '../models/Usuario.php';
class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }

    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        <legend>Registro</legend>
          <div class="campos-formulario">
              <h4>Nombre de usuario</h4>
              <input class ="input-box" type="text" placeholder="Introduce tu nombre de usuario" name="uname" required>

              <h4>Email</h4>
              <input class ="input-box" type="email" placeholder="Introduce tu Email" name="mail" required>

              <h4>Contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña entre 8 y 16 caracteres" name="psw"
                      pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
              <p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

              <h4>Repite la contraseña</h4>
              <input class ="input-box" type="password" placeholder="Introduce una contraseña que coincida" name="psw2"
                      pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
            </div>
            <div class="submit-formulario">
              <input type="button" value="INICIAR SESION" class ="boton-formulario2" onclick="location.href='/views/login.php'">
              <input type="submit" value="REGISTRASE" class ="boton-formulario">
            </div>
EOF;
        return $html;
    }


    protected function procesaFormulario($datos)
    {
        $result = array();

        $username = htmlspecialchars(trim(strip_tags($_REQUEST["uname"])));
        $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
      	$password2 = htmlspecialchars(trim(strip_tags($_REQUEST["psw2"])));
      	$mail = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));
      	//comprueba que las dos contrasenas coincidan
      	if($password != $password2){
      		$result[] = "Las contraseñas no coinciden.";
      	}
      	else{
      		try{
      			$user = new Usuario();
      			if($user->getBy("id_correo",$mail)!=null){
      				//comprueba que el email no este registrado
      				$result[] = "El email introducido ya existe.";
      			}
      			else{
      				//Crea usuario
      				$user->setIdCorreo($mail);
      				$user->setPassword($password);
      				$user->setNombre($username);
      				$user->setImagen('/images/user_icon.png');
      				$user->setAdmin(0);
      				//Registra el usuario en la base de datos
      				$user->signupUser();
      				//Inicia sesión con el nuevo usuario
      				$_SESSION["logged"]	= true;
      				$_SESSION['login'] = $username;
      				$_SESSION['mail'] = $mail;
      				$result = '../views/index.php';
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
