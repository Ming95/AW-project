 <?php
	Include '../models/idea.php';
	Include '../models/usuarioComentarioIdea.php';
	Include 'util_controller.php';
	session_start();
	if(($_GET['id_idea']==null) or empty($_GET['id_idea'])) {
			echo " Lo sentimos pero parece haber un problema con los datos enviados.";
	}
	if(isset($_SESSION['mail'])){
		$id_correo= htmlspecialchars(trim(strip_tags($_SESSION["mail"])));
	}
	
	if(isset($_SESSION['mail'])){
		$id_correo= htmlspecialchars(trim(strip_tags($_SESSION["mail"])));
	}
	
	$id_idea= htmlspecialchars(trim(strip_tags($_GET["id_idea"])));
	
	if(isset($_GET['inserta'])) {
			$coment= base64_decode(htmlspecialchars(trim(strip_tags($_GET["inserta"]))));
		try{
			$usuarioComentarioIdea = new UsuarioComentarioIdea();
			$usuarioComentarioIdea->setId_idea($id_idea);
			$usuarioComentarioIdea->setId_correo($id_correo);
			$fecha=strftime( "%Y-%m-%d", time());
			$usuarioComentarioIdea->setFecha_creacion($fecha);
			$usuarioComentarioIdea->setComentario($coment);
			$usuarioComentarioIdea->setUsuarioComentarioIdea();
			$usuarioComentarioIdea->closeConnection();
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		} 
	}
	
	
	if(isset($_GET['comentario'])) {
		try{
			$usuarioComentarioIdea = new UsuarioComentarioIdea();
			$utilController = new UtilController();
			$comentarios= $usuarioComentarioIdea->getAllFilteredAndOrderDESC("fecha_creacion","id_idea",$id_idea);
			$usuarioComentarioIdea->closeConnection();
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		} 
	}
	
	try{
		$idea = new Idea();
		$utilController = new UtilController();
		$dato_idea = $idea->getBy('id_idea',$id_idea);
		$dias_finalizar=$utilController->diffFechas($dato_idea[0]['fecha_limite']);
		$ideasFiltradas= $idea->getAllFilteredAndOrderASC("fecha_limite","id_categoria",$dato_idea[0]['id_categoria'],"id_idea",$id_idea);
		$masIdeas=$utilController->mostrarNElementos(3,$ideasFiltradas);
		$idea->closeConnection();
		require_once("../views/infoidea.php");
	}catch(Exception $e){
		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
		$_SESSION['data_error']=$e->getMessage();
		header("Location:/errorpage.php");
	} 
	
/* 	function consultarComentarios($id_idea){
		try{
			$usuarioComentarioIdea = new UsuarioComentarioIdea();
			$utilController = new UtilController();
			$comentarios= $usuarioComentarioIdea->getAllFiltered("id_idea",$id_idea);
			$usuarioComentarioIdea->closeConnection();
			return $comentarios;
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		} 
	} */
	
?>
