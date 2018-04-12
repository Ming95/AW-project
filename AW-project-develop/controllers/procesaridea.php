 <?php
	Include 'models/idea.php';
 
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
    $categorias = $_POST['categorias']; // requerido
    $descripcion = $_POST['descripcion']; // no requerido 
	$datefinal = $_POST['final'];
	$precio_idea=$_POST['precio'];
	$vender = false;
 
	$idea = new Idea;
	$idea->setNombre_Idea($name);
	$idea->setDinero_Idea($dinero);
	$idea->setId_Categoria($categorias); 
	$idea->setFecha_Limite($datefinal);
	$idea->setDescrip_Idea($descripcion); 
	$idea->setEnVenta($vender);
	$idea->setPrecioVenta($precio_idea);
	$idea->setCv_Equipo("/img/data");
	$idea->setId_Correo("correo3@ucm.es");
	$idea->getBy($name) 
	//$idea->setIdea($idea);

?> 
