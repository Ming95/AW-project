 <?php
	Include '../models/idea.php';
  session_start();
	if(($_POST['nombre']==null) ||
		($_POST['dinero']==null) ||
		($_POST['foto']==null) ||
		($_POST['archivo']==null) ||
		($_POST['descripcion']==null)){
			echo " Lo sentimos pero parece haber un problema con los datos enviados.";
	}
	//Controlar que el propietario de la idea existe. Consultar en bbdd a usuario si el usuario de sesion existe en la bbdd.
  $name = $_POST['nombre']; // requerido
  $dinero = $_POST['dinero']; // requerido
  $categoria = $_POST['categoria']; // requerido
  $descripcion = $_POST['descripcion']; // no requerido
  $datefinal = $_POST['final'];
  $precio_idea=$_POST['precio'];
  $vender = 0;
	if (isset($_REQUEST['vender'])){
				$vender=true;
			}

	$idea = new Idea;
	$idea->setNombre_Idea($name);
	$idea->setId_Categoria($categoria);
	$idea->setFecha_Limite($datefinal);
	$idea->setDesc_idea($descripcion);
	$idea->setEnVenta($vender);
	$idea->setImporte_venta($precio_idea);
	$idea->setCv_Equipo("/img/data");
	$idea->setId_Correo($_SESSION['mail']);
  //$idea->setImagen("/img/idea1");
	try{
		$idea->getBy('id_idea',sha1($name));
		$idea->setIdea();
	$idea->closeConnection();
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	}

?>
