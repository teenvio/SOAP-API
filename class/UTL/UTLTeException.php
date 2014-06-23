<?php

/**
 * Clase de Excepciones para Teenvio
 * Genera un log con todas las excepciones
 * 
 * @author Victor J. Chamorro <victor@ipdea.com>
 * @package UTL
 *
 */
class TeException extends Exception{
	
	private $classname="";

	/**
	 * Devuelve un nuevo objeto de Excepción TeException
	 * Si $_GET['trace'] == 1 añadirá la traza al log
	 * @param string $mensaje
	 * @param int $codigo
	 * @param string $clase
	 */
	function __construct($mensaje,$codigo,$clase=""){
		if ($clase=="") $clase=__CLASS__;
		parent::__construct($mensaje,$codigo);
		//Si nos llega el parámetro trace, guardamos la traza en el log
		if (isset($_GET['trace']) && $_GET['trace']=="1") $this->message.="\n".$this->getTraceAsString();
		
		$this->classname=$clase;
		$this->guardaLog();
	}
	
	/**
	 * Registra la excepción en el log
	 */
	private function guardaLog(){
		//No implementado
	}
	
	/**
	 * Devuelve el nombre de la clase que lanzó la excepción o una cacena en blanco si no se indicó.
	 * @return string
	 */
	public function getClassName(){
		return $this->classname;
	}

}

?>