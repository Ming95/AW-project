  <?php
	include '../models/entidadBase.php';
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

		$data1= array();
		$data1['dato_evento'] = $dato_evento;
		$data1['mas_eventos'] = $masEventos;
		$data1['dias_finalizar']=$dias_finalizar;
		$_SESSION['data1'] = $data1;
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
		$eventosFiltrados= $evento->getAllOrderByAsc("fecha");
		$masEventos=$utilController->mostrarNElementos(6,$eventosFiltrados);
		return $masEventos;
	}
	var_dump(masEventos);

	function obtenerDiasFinalizacion($dato_evento,$id_evento,$utilController){
		$dias_finalizar=$utilController->diffFechas($dato_evento[0]['fecha']);
		return $dias_finalizar;
	}


?>
