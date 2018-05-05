 <?php
	Include '../models/idea.php';
	Include '../models/usuarioComentarioIdea.php';
	Include 'UtilController.php';
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
	if(($_GET['id_idea']==null) or empty($_GET['id_idea'])) {
			$_SESSION['data_error']="Lo sentimos pero parece haber un problema con los datos enviados.";
			header("Location:/errorpage.php");
	}
	$id_idea= htmlspecialchars(trim(strip_tags($_GET["id_idea"])));
	
	$utilController = new UtilController();
	
	try{
		$idea = new Idea();
		$dato_idea=obtenerIdea($idea,$id_idea);
		$masIdeas=obtenerMasIdeas($dato_idea,$utilController,$idea);
		$dias_finalizar=ObtenerDiasFinalizacion($dato_idea,$id_idea,$utilController);
		$idea->closeConnection();
		$data= array();
		$data['dato_idea'] = $dato_idea;
		$data['mas_ideas'] = $masIdeas;
		$data['dias_finalizar']=$dias_finalizar;
		$_SESSION['data'] = $data;
		require_once("../views/infoidea.php");
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	} 
	
	function obtenerIdea($idea,$id_idea){
		$dato_idea = $idea->getBy('id_idea',$id_idea);
		return $dato_idea;
	}
	
	function obtenerMasIdeas($dato_idea,$utilController,$idea){
		$ideasFiltradas= $idea->getAllFilteredAndOrderASC("fecha_limite","id_categoria",$dato_idea[0]['id_categoria'],"id_idea",$dato_idea[0]['id_idea']);
		$masIdeas=$utilController->mostrarNElementos(3,$ideasFiltradas);
		return $masIdeas;
	}
	
	function obtenerDiasFinalizacion($dato_idea,$id_idea,$utilController){
		$dias_finalizar=$utilController->diffFechas($dato_idea[0]['fecha_limite']);
		return $dias_finalizar;
	}

	
?>
