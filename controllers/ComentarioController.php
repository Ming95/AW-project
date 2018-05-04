 <?php
	Include '../models/idea.php';
	Include '../models/usuarioComentarioIdea.php';
	Include 'util_controller.php';
	session_start();
	if(($_GET['id_idea']==null) or empty($_GET['id_idea'])) {
			echo " Lo sentimos pero parece haber un problema con los datos enviados.";
	}
	
	if(($_GET['opcion']==null) or empty($_GET['opcion'])) {
			echo " Lo sentimos pero parece haber un problema con los datos enviados.";
	}
	
	$id_idea= htmlspecialchars(trim(strip_tags($_GET["id_idea"])));
	$opcion= htmlspecialchars(trim(strip_tags($_GET["opcion"])));
	
	if($opcion==1 and (($_GET['comentario']==null) or empty($_GET['comentario']))) {
			echo " Lo sentimos pero parece haber un problema con los datos enviados.";
	}
	
	switch($opcion){
		case 1: {
			actualizarComentario($id_idea);
			$comentarios=obtenerComentarios($id_idea);
		}
		case 2:{
			$comentarios=obtenerComentarios($id_idea);
		}
		
		$_SESSION['comentarios']=$comentarios;
		require_once("../views/infoidea.php");
	};
	
	function actualizarComentario($id_idea){
		if(isset($_SESSION['mail'])){
		$id_correo= htmlspecialchars(trim(strip_tags($_SESSION["mail"])));
		$comentario= htmlspecialchars(trim(strip_tags($_GET["comentario"])));
		}
		try{
			$usuarioComentarioIdea = new UsuarioComentarioIdea();
			$usuarioComentarioIdea->setId_idea($id_idea);
			$usuarioComentarioIdea->setId_correo($id_correo);
			$fecha=strftime( "%Y-%m-%d", time());
			$usuarioComentarioIdea->setFecha_creacion($fecha);
			$usuarioComentarioIdea->setComentario($comentario);
			$usuarioComentarioIdea->setUsuarioComentarioIdea();
			$usuarioComentarioIdea->closeConnection();
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		} 
	}
	
	function obtenerComentarios($id_idea){
		try{
			$usuarioComentarioIdea = new UsuarioComentarioIdea();
			$utilController = new UtilController();
			$comentarios= $usuarioComentarioIdea->getAllFilteredAndOrderDESC("fecha_creacion","id_idea",$id_idea);
			$usuarioComentarioIdea->closeConnection();
			return $comentarios;
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			$_SESSION['data_error']=$e->getMessage();
			header("Location:/errorpage.php");
		} 
	}
?>