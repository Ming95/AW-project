 <?php
	require_once '../models/entidadBase.php';
	Include '../models/Idea.php';
	Include '../models/UsuarioComentarioIdea.php';
	Include './UtilController.php';
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
	if(($_GET['id_idea']==null) or empty($_GET['id_idea'])) {
			$_SESSION['data_error']="Lo sentimos pero parece haber un problema con los datos enviados.";
			header("Location:/errorpage.php");
	}
	$idIdea= htmlspecialchars(trim(strip_tags($_GET["id_idea"])));

	try{
		$datoIdea=obtenerIdea($idIdea);
		$masIdeas=obtenerNumIdeasInteresantes($datoIdea,6);
		$diasFinalizar=ObtenerDiasFinalizacion($datoIdea,$idIdea);
		$data= array();
		$data['dato_idea'] = $datoIdea;
		$data['mas_ideas'] = $masIdeas;
		$data['dias_finalizar']=$diasFinalizar;
		$_SESSION['data'] = $data;
		require_once("../views/infoidea.php");
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	}

	function obtenerIdea($idIdea){
		$idea = new Idea();
		$datoIdea = $idea->getBy('id_idea',$idIdea);
		$idea->closeConnection();
		return $datoIdea;
	}

	function obtenerNumIdeasInteresantes($datoIdea,$numElems){
		$idea = new Idea();
		$ideasFiltradas= $idea->getNumElemsFiltered2AndOrdered("fecha_limite","id_categoria",$datoIdea[0]['id_categoria'],"id_idea",$datoIdea[0]['id_idea'],$numElems);
		$idea->closeConnection();
		return $ideasFiltradas;
	}

	function obtenerDiasFinalizacion($datoIdea,$idIdea){
		$utilController = new UtilController();
		$diasFinalizar=$utilController->diffFechas($datoIdea[0]['fecha_limite']);
		return $diasFinalizar;
	}


?>
