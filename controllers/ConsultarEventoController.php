 <?php
	Include '../models/evento.php';
	Include 'UtilController.php';

	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
	if(($_GET['id_evento']==null) or empty($_GET['id_evento'])) {
			$_SESSION['data_error']="Lo sentimos pero parece haber un problema con los datos enviados.";
			header("Location:/errorpage.php");
	}
	$id_evento= htmlspecialchars(trim(strip_tags($_GET["id_evento"])));

	$utilController = new UtilController();

	try{
		$evento = new Evento();
		$dato_evento=obtenerEvento($evento,$id_evento);
		$masEventos=obtenerMasEventos($dato_evento,$utilController,$evento);
		$dias_finalizar=ObtenerDiasFinalizacion($dato_evento,$id_evento,$utilController);
		$evento->closeConnection();

		$data= array();
		$data['dato_evento'] = $dato_evento;
		$data['mas_eventos'] = $masEventos;
		$data['dias_finalizar']=$dias_finalizar;
		$_SESSION['data'] = $data;
		require_once("../views/infoevento.php");
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	}

	function obtenerEvento($evento,$id_evento){
		$dato_evento = $evento->getBy('id',$id_evento);
		return $dato_evento;
	}

	function obtenerMasEventos($dato_evento,$utilController,$evento){
		$eventosFiltrados= $evento->getAllFilteredAndOrderASC("fecha","id",$dato_evento[0]['id']);
		$masEventos=$utilController->mostrarNElementos(3,$eventosFiltrados);
		return $masEventos;
	}

	function obtenerDiasFinalizacion($dato_evento,$id_evento,$utilController){
		$dias_finalizar=$utilController->diffFechas($dato_evento[0]['fecha']);
		return $dias_finalizar;
	}


?>
