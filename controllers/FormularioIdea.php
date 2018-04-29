<?php
include 'Form.php';
include '../models/idea.php';
class FormularioIdea extends Form
{
    public function __construct() {
        parent::__construct('formIdea');
    }

    protected function generaCamposFormulario($datos)
    {
        $date = date("Y-m-d");
        $html = <<<EOF

        <script type="text/javascript">
          function showContent() {
            element = document.getElementById("content");
            check = document.getElementById("check");
            if (check.checked) {
              element.style.display='block';
            }
            else {
              element.style.display='none';
            }
          }
          function valida(e){
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8){
              return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron =/[0-9-.]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
          }
        </script>

        <legend>Crear Idea</legend>
  			<h4>Nombre de la idea</h4><input type="text" name="nombre" required class ="input-box">
  			<h4>Recaudación</h4>
  			<p>Indica la cantidad en euros que deseas recaudar.</p>
  			<input type="text" name="dinero" onkeypress="return valida(event)" required class ="input-box">
  			<h4>Fin de recaudacion</h4>
  			<p>Indica la fecha en la que se cerrará la recaudación.</p>
  			<input type="date" name="final" step="1" min="$date" max="2033-12-31" value="$date" class ="input-box">

  			<h4>Categoría</h4>
  			<p>Elige a qué categoría pertenece tu idea</p>
  			<select name="categoria" class ="input-box">
  				<option value="Deportes">Deportes</option>
  				<option value="Comida">Comida</option>
  				<option value="Musica" selected>Musica</option>
  				<option value="Cine">Cine</option>
  				<option value="Juegos">Juegos</option>
  				<option value="Diseño">Diseño</option>
  				<option value="Ilustracion">Ilustración</option>
  			</select>

  			<h4>Imagen de la idea</h4>
  			<div class="input-file">
  				Selecciona una imagen que describa tu idea.
  				<input type="file" name="foto" required>
  			</div>
  			<h4>CV del equipo</h4>
  			<div class="input-file">
  				Selecciona el currículum de los miembros de tu equipo.
  				<input type="file" name="archivo" required>
  			</div>
  			<h4>Descripcion de la idea</h4>
  			<textarea class="input-text" name="descripcion" rows="12" cols="140" placeholder="Explica en qué consiste tu proyecto"></textarea>


  			 <div class="checkbox">
  			 	<input name="vender" type="checkbox" value="on" id="check" onchange="javascript:showContent()" label="hola">
  			 	<label for="check">¿Quieres poner tu idea a la venta?</label>
  			</div>

  			<div id="content" style="display: none;">
  				<h4>Precio de la idea (€)</h4> <input type="text" name="precio" onkeypress="return valida(event)" placeholder="1000" class ="input-box">
  			</div>
  			<div class="submit-formulario">
  				<input type="submit" value="ACEPTAR" class ="boton-formulario">
  			</div>
EOF;
        return $html;
    }


    protected function procesaFormulario($datos)
    {
        $result = array();
        if(($_POST['nombre']==null) ||
      		($_POST['dinero']==null) ||
      		($_POST['foto']==null) ||
      		($_POST['archivo']==null) ||
      		($_POST['descripcion']==null)){
            $result[] = "Lo sentimos, parece haber un problema con los datos enviados.";
      	}
      	//Controlar que el propietario de la idea existe. Consultar en bbdd a usuario si el usuario de sesion existe en la bbdd.
        $name = $_POST['nombre']; // requerido
        $dinero = $_POST['dinero']; // requerido
        $categoria = $_POST['categoria']; // requerido
        $descripcion = $_POST['descripcion']; // no requerido
        $datefinal = $_POST['final'];
        $foto = "/images/idea.jpg";
        $precio_idea=$_POST['precio'];
        $vender = false;
      	if (isset($_REQUEST['vender'])){
      				$vender=true;
      			}

      	$idea = new Idea;
      	$idea->setNombre_Idea($name);
      	$idea->setId_Categoria($categoria);
      	$idea->setFecha_Limite($datefinal);
      	$idea->setDesc_idea($descripcion);
      	$idea->setEnVenta($vender);
        $idea->setImporte_Solicitado($dinero);
      	$idea->setImporte_venta($precio_idea);
      	$idea->setCv_Equipo("/img/data");
      	$idea->setId_Correo($_SESSION['mail']);
        $idea->setImagen($foto);
      	try{
      		$idea->getBy('id_idea',sha1($name));
      		$idea->setIdea();
      	  $idea->closeConnection();
          $result = '../index.php';
      	}catch(Exception $e){
      		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
      		$_SESSION['data_error']=$e->getMessage();
      		$result = '../errorpage.php';
      	}
        return $result;
    }
}
