 <?php
	Include '../models/idea.php';
	session_start();
	if(($_GET['numIdeas']==null) or empty($_GET['numIdeas'])) {
		$_SESSION['data_error']="Ha ocurrido un problema con los datos enviados";
		header("Location:/errorpage.php");
	}
	$numIdeas= htmlspecialchars(trim(strip_tags($_GET["numIdeas"])));
	try{
		$idea = new Idea();
		$topIdeas=obtenerIdeas("popularidad");
		$idea->closeConnection();
		$data= array();
		$data['topIdeas'] = $topIdeas;
		$_SESSION['data'] = $data;
		header("Location:../index.php");
		
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	} 
	
	function obtenerIdeas($orderBy){
		global $numIdeas, $idea;
		try{
			$datos=$idea->getNumElemsOrderBy($orderBy,$numIdeas);
			return $datos;
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			throw new Exception($e);
		} 
	}



?>
