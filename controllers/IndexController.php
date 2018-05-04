 <?php
	Include '../models/idea.php';
	Include 'UtilController.php';
	session_start();
	if(($_GET['numIdeas']==null) or empty($_GET['numIdeas'])) {
		$_SESSION['data_error']="Ha ocurrido un problema con los datos enviados";
		header("Location:/errorpage.php");
	}
	$num_ideas= htmlspecialchars(trim(strip_tags($_GET["numIdeas"])));
	$utilController = new UtilController();
	try{
		$idea = new Idea();
		$top_ideas=$utilController->obtenerIdeas($idea,$num_ideas,"popularidad");
		$idea->closeConnection();
		$data= array();
		$data['top_ideas'] = $top_ideas;
		$_SESSION['data'] = $data;
		header("Location:../index.php");
		
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	} 

?>
