<?php
include 'Form.php';
include '../models/entidadBase.php';
include '../models/idea.php';
class FormularioIdea extends Form
{
    public function __construct() {
        parent::__construct('formIdea');
    }

    protected function generaCamposFormulario($datos)
    {
      //Carga categorias de entorno.ini
      $categorias = parse_ini_file("../config/entorno.ini", true);
      if($categorias==null)
        throw new Exception('MySQL: Error al cargar las categorias');
      else{
        $cat="";
        $i = 0;
        while(isset($categorias['CATEGORIAS']['categoria'][$i])){
          $cat .= '<option value="';
          $cat .= $categorias['CATEGORIAS']['categoria'][$i];
          $cat .= '">';
          $cat .= $categorias['CATEGORIAS']['categoria'][$i];
          $cat .= '</option>';
          $i++;
      }
    }
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
  				$cat
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

        //Comprueba campos del formulario
        if(($datos['nombre']==null) || ($datos['dinero']==null) || ($datos['descripcion']==null))
            $result[] = "Lo sentimos, parece haber un problema con los datos enviados.";

        //Comprueba que la imagen sea un archivo de imagen
        $image_dir = "images/ideas/";
        $image_file = $image_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($image_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
            $result[] = "El archivo debe ser una imagen";

        //Comprueba que el curriculum sea un pdf
        $curr_dir = "images/ideas/";
        $curr_file = $curr_dir . basename($_FILES["archivo"]["name"]);
        $currFileType = strtolower(pathinfo($curr_file,PATHINFO_EXTENSION));

        if($currFileType != "pdf") $result[] = "El Curriculum debe tener extensión .pdf";

        /* Da error de directorio
        //Sube la Imagen
        if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file))
            $result[]="Error al subir la imagen";

        //Sube el cv
        if (!move_uploaded_file($_FILES["archivo"]["tmp_name"], "../images/ideas".basename($_FILES["foto"]["name"])))
            $result[]="Error al subir el Curriculum";
        */

        //Crea objeto idea y atributos

      	$idea = new Idea;
      	$idea->setNombre_Idea($datos['nombre']);
      	$idea->setId_Categoria($datos['categoria']);
      	$idea->setFecha_Limite($datos['final']);
      	$idea->setDesc_idea($_POST['descripcion']);
      	$idea->setEnVenta(isset($_REQUEST['vender']));
        $idea->setImporte_Solicitado($datos['dinero']);
      	$idea->setImporte_venta($datos['precio']);
      	$idea->setCv_Equipo($curr_file);
      	$idea->setId_Correo($_SESSION['mail']);
        $idea->setImagen($image_file);

      	try{
      		$idea->setIdea();
      	  $idea->closeConnection();
          $result = "../controllers/ConsultarIdeaController.php?id_idea=".$idea->getId_idea();
      	}catch(Exception $e){
      		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
      		$_SESSION['data_error']=$e->getMessage();
      		$result = '../errorpage.php';
      	}
        return $result;
    }
}
?>
