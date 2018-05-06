  <?php
	include '../models/EntidadBase.php';
	Include '../models/Evento.php';
	Include 'UtilController.php';

	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
	if(($_GET['id_evento']==null) or empty($_GET['id_evento'])) {
			$_SESSION['data_error']="Lo sentimos pero parece haber un problema con los datos enviados.";
			header("Location:/errorpage.php");
	}
	$idEvento= htmlspecialchars(trim(strip_tags($_GET["id_evento"])));

	

	try{
		$datoEvento=obtenerEvento($idEvento);
		$masEventos=obtenerMasEventos($datoEvento,6);
		$diasFinalizar=ObtenerDiasFinalizacion($datoEvento);
		$data1= array();
		$data1['dato_evento'] = $datoEvento;
		$data1['mas_eventos'] = $masEventos;
		$data1['dias_finalizar']=$dias_finalizar;
		$_SESSION['data1'] = $data1;
		require_once("../views/infoevento.php");
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	}

	function obtenerEvento($idEvento){
		$evento = new Evento();
		$datoEvento = $evento->getBy('id',$idEvento);
		$evento->closeConnection();
		return $datoEvento;
	}

	function obtenerMasEventos($datoEvento,$numElem){
		$evento = new Evento();
		$masEventos= $evento->getNumElemsOrderByAsc("fecha",$numElem);
		$evento->closeConnection();
		return $masEventos;
	}

	function obtenerDiasFinalizacion($datoEvento){
		$utilController = new UtilController();
		$diasFinalizar=$utilController->diffFechas($datoEvento[0]['fecha']);
		return $diasFinalizar;
	}


?>
