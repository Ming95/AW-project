 <?php
 	include '../models/entidadBase.php';
	Include '../models/idea.php';
	Include '../models/evento.php';

	session_start();
	$numIdeas=3;
	$numEventos=3;
	try{
		$topIdeas=obtenerIdeas("popularidad");
		$topEventos=obtenerEventos("fecha");
		$data= array();
		$data['topIdeas'] = $topIdeas;
		$data['topEventos'] = $topEventos;
		$_SESSION['data'] = $data;
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	}

	function obtenerIdeas($orderBy){
		global $numIdeas;
		$idea = new Idea();
		try{
			$datos=$idea->getNumElemsOrderBy($orderBy,$numIdeas);
			$idea->closeConnection();
			return $datos;
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			throw new Exception($e);
		}
	}
	
	function obtenerEventos($orderBy){
		global $numEventos, $evento;
		$evento = new Evento();
		try{
			$datos=$evento->getNumElemsOrderBy($orderBy,$numEventos);
			$evento->closeConnection();
			return $datos;
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			throw new Exception($e);
		}
	}


?>
