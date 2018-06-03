
<?php
require 'Form.php';
require $_SERVER['DOCUMENT_ROOT']."/models/usuario.php";

class FormularioLogin extends Form
{
    public function __construct() {
        parent::__construct('formLogin');
    }

    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        			<legend>Iniciar Sesion</legend>
        				<div class="campos-formulario">
        				<h4>Email</h4> <input class ="input-box" type="text" name="mail" placeholder="Introduce tu e-mail" required>

        				<h4>Contraseña</h4>	<input class ="input-box" type="password" name="psw" placeholder="Introduce una contraseña entre 8 y 16 caracteres"
        											pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required>
        				<p>La contraseña requiere al menos: un dígito, una minúscula, una mayúscula y un caracter no alfanumérico.</p>

        				</div>
        				<div class="submit-formulario">
							<input type="button" id="reestablecerPassButton" name= "reestablecerPassButton" value="REESTABLECER CONTRASEÑA"  class ="boton-formulario2" onclick="location.href='/views/signup.php'" style="visibility:hidden">
        					<input type="button" id= "registerButton" value="REGISTRARSE"  class ="boton-formulario2" onclick="location.href='/views/signup.php'">
        					<input type="submit" id="iniciaButton" value="INICIAR SESIÓN"  class ="boton-formulario">
        				</div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
      $result = array();
      $username = htmlspecialchars(trim(strip_tags($_REQUEST["mail"])));
      $password = htmlspecialchars(trim(strip_tags($_REQUEST["psw"])));
	  if ($username==null || empty($username) || $password ==null || empty($password )){
			$result[] = "Campos de entrada vacíos o nulos";
			return $result;
	  }
      if(!isset($_SESSION['intentos'])){
        $_SESSION['intentos'] = 0;
        $_SESSION["logged"]=false;
      }else{
	      $_SESSION['intentos'] = $_SESSION['intentos']+1; 
		  //$_SESSION['intentos'] = 0;
	  }
      if(!isset($_SESSION['logged'])){
        $_SESSION["logged"]=false;
      }
	  
      try{
        //Se crea el objeto usuario y se abre conexión
        $user = new Usuario();
        //Consultamos si existe el usuario
        $consulta = $user->getBy("id_correo",$username);
        //Cerramos la conexiónbl tras realizar la consulta
        $user->closeConnection();
        //Comparamos el nuevo hash con el existente en BBDD
        if($consulta!=null and password_verify($password,$consulta[0]['password'])){
          $_SESSION["logged"]	= true;
          $_SESSION['login'] = $consulta[0]['nombre'];
          $_SESSION['mail'] = $consulta[0]['id_correo'];
          $_SESSION['admin'] = $consulta[0]['admin'];
          $_SESSION['intentos'] = 0;
          $result = '../index.php';
        }
        else{ 
			if($_SESSION['intentos']==3){
				$_SESSION['intentos'] = 0;
				$result[] = "Ha superado el número máximo de intentos";
				$result = '../views/recuperarPass.php';
			}else{
				$result[] = "Email o contraseña incorrecta";
        		
			}
		}
		
      }catch (Exception $e) {
        error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
        $_SESSION['data_error']=$e->getMessage();
        $result = '../errorpage.php';
	  }
      return $result;
    }
}
?>
