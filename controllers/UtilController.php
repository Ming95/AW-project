 <?php

 class UtilController{
	 
	public function __construct() {
    
	}
	 /*Calcular la diferencia de fechas*/
	function diffFechas($fecha){
		$date1 = new DateTime($fecha);
		$date2 = new DateTime("now");
		$diff = $date1->diff($date2);
		return ($diff->days);
	}
	/*Muestra el numero de elementos indicados*/
	function mostrarNElementos($numElementos,$listaDatos){
		$listaDef = array();
		$contador = 0; 
		if($listaDatos){
			while (($contador < $numElementos) and ($listaDatos[$contador]!=null)) {
				$listaDef[$contador]=$listaDatos[$contador];
				$contador++;
			}
			return $listaDef;    
		}
		
	}
	/*Recibe el número de elementos a mostrar y la columna por la que se ordenan los elementos*/
	function obtenerIdeas($idea, $numElementos, $orderBy){
		try{
			$datos=$idea->getNumElementsOrderBy($orderBy,3);
			return $datos;
		}catch(Exception $e){
			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
			throw new Exception($e);
		} 
	}
	
 }
?>