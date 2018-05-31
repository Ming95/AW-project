<?php
require 'Form.php';
require '../models/idea.php';
require '../models/categorias.php';
class FormularioIdea extends Form
{
    private $categorias;

    public function __construct() {
        parent::__construct('formIdea');
        //Carga categorias de db
        $cat = new Categorias;
        $this->categorias = $cat->getCategorias();
        if($this->categorias==null)
          throw new Exception('MySQL: Error al cargar las categorias');
    }

    protected function generaCamposFormulario($datos)
    {
        $cat ="";
        $i = 0;
        while(isset($this->categorias[$i])){
          $cat .= '<option value="';
          $cat .= $this->categorias[$i];
          $cat .= '">';
          $cat .= $this->categorias[$i];
          $cat .= '</option>';
          $i++;
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
  			<input type="text" name="recaudacion" onkeypress="return valida(event)" required class ="input-box" placeholder="Ej: 500000">
  			<h4>Fin de recaudacion</h4>
  			<p>Indica la fecha en la que se cerrará la recaudación.</p>
  			<input type="date" name="fecha" step="1" min="$date" max="2033-12-31" value="$date" class ="input-box">

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
  			<h4>Curriculum del equipo</h4>
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
        if(($datos['nombre']==null) || ($datos['recaudacion']==null) || ($datos['descripcion']==null))
            $result[] = "Lo sentimos, parece haber un problema con los datos enviados.";

        $datos['categoria'] = array_search($datos['categoria'],$this->categorias)+1;
        $datos['enventa']=(isset($_REQUEST['vender']))?'1':'0';
        $datos['precio']=(isset($_REQUEST['precio']))?$_REQUEST['precio']:'0';
        $desc = nl2br(htmlentities($datos['descripcion'], ENT_QUOTES, 'UTF-8'));
        //Crea objeto idea y atributos
        if(empty($result)){
          try{
        	$idea = new Idea;
			$consulta = $idea->getBy("nombre_idea",$datos['nombre']); 
			$nombreIdea= $consulta ? $consulta[0]['nombre_idea']:null;
			$existe=strcasecmp($nombreIdea,$datos['nombre']);
			if($existe!=0){
				$idea->setNombre_Idea($datos['nombre']);
				$idea->setId_Categoria($datos['categoria']);
				$idea->setFecha_Limite($datos['fecha']);
				$idea->setDesc_idea($desc);
				$idea->setEnVenta($datos['enventa']);
			  $idea->setImporte_Solicitado($datos['recaudacion']);
				$idea->setImporte_venta($datos['precio']);
				$idea->setId_Correo($_SESSION['mail']);

				$idea->setIdea();

			  $newdir = "../images/ideas/idea".$idea->getId_idea()."/";
			  //Comprueba que la imagen sea un archivo de imagen
			  $image_file = $newdir . basename($_FILES["foto"]["name"]);
			  $imageFileType = strtolower(pathinfo($image_file,PATHINFO_EXTENSION));

			  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
				  $result[] = "La imagen debe tener extensión: ( .jpg | .png | .jpeg | .gif )";

			  //Comprueba que el curriculum sea un pdf
			  $curr_file = $newdir . basename($_FILES["archivo"]["name"]);
			  $currFileType = strtolower(pathinfo($curr_file,PATHINFO_EXTENSION));

			  if($currFileType != "pdf") $result[] = "El curriculum debe tener extensión .pdf";

			  if (!file_exists($newdir) && !is_dir($newdir))
				mkdir($newdir, 0777);
			  //Sube la Imagen
			  if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $image_file))
				  $result[]="Error al subir la imagen";

			  //Sube el cv
			  if (!move_uploaded_file($_FILES["archivo"]["tmp_name"], $curr_file))
				  $result[]="Error al subir el Curriculum";

				$idea->setFiles($curr_file,$image_file);
			  $idea->closeConnection();
				$result = "../views/infoIdea.php?id_idea=".$idea->getId_idea();
			}else{
				$result[]="Lo sentimos, esa idea ya existe";
			}
      	}catch(Exception $e){
      		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
      		$_SESSION['data_error']=$e->getMessage();
      		$result = '../errorpage.php';
      	}
      }
        return $result;
    }
}
?>
