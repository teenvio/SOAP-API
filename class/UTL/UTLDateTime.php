<?php

/**
 * Clase para el manejo de fechas en PHP, incluyendo el manejo de Zonas Horarias.
 * Extiende la clase nativa DateTime (PHP 5 >= 5.2.0)
 * @author Victor J Chamorro - victor@ipdea.com
 * @package UTL
 * @see http://es1.php.net/manual/es/class.datetime.php
 */
class UTLDateTime extends DateTime{
	
	/**
	 * Crea un objeto UTLDateTime
	 * @param string $strdatetime Fecha y hora en el formato AAAA-MM-DD HH:MM:SS (like MySQL DATETIME)
	 * @param string $timezone Por defecto Europe/Madrid
	 * @throws TeException
	 */
	public function __construct($strdatetime="",$timezone="Europe/Madrid"){
		//Miramos si el TimeZone es correcto
		$datetimezone=null;
		try{
			$datetimezone=new DateTimeZone($timezone);
		}catch (Exception $e){
			try{throw new TeException("Error al intentar establecer '$timezone' como TimeZone, se utilizará Europe/Madrid".$e->getMessage(), __LINE__,__CLASS__);
			}catch(TeException $e){
				echo "\n\tError al intentar establecer '$timezone' como TimeZone, se utilizará Europe/Madrid";
				$datetimezone=new DateTimeZone('Europe/Madrid');
			}
		}
		parent::__construct($strdatetime,$datetimezone);
	}
	
	/**
	 * Obtiene la fecha en el TimeZone seleccionado formateado con el patron pasado
	 * @param string $newTimeZone
	 * @param string $format Formato, por defecto DD/MM/AAAA HH:MM
	 * @throws TeException
	 * @return string DD/MM/AAAA HH:MM
	 */
	public function getInTimeZone($newTimeZone,$format="d/m/Y H:i\h"){
		//Miramos si el TimeZone es correcto
		$datetimezone=null;
		try{
			$datetimezone=new DateTimeZone($newTimeZone);
		}catch (Exception $e){
		try{throw new TeException("Error al intentar establecer '$timezone' como TimeZone, se utilizará Europe/Madrid".$e->getMessage(), __LINE__,__CLASS__);
			}catch(TeException $e){
				echo "\n\tError al intentar establecer '$newTimeZone' como TimeZone, se utilizará Europe/Madrid";
				$datetimezone=new DateTimeZone('Europe/Madrid');
			}
		}
		$this->setTimezone($datetimezone);
		return $this->format($format);
	}
	
	/**
	 * Obtiene la fecha en el TimeZone seleccionado y formateada, partiendo siempre de la zona Europe/Madrid
	 * @param string $strdatetime Fecha original con el uso horiario de Europe/Madrid
	 * @param string $newtimezone nueva Zona horaria 
	 * @return string DD/MM/AAAA HH:MM
	 * @throws TeException
	 */
	static function toNewTimeZoneFormat($strdatetime,$newtimezone){
		$obj=new UTLDateTime($strdatetime);
		return $obj->getInTimeZone($newtimezone);
	}
	
	/**
	 * Devuelve el objeto con la fecha actual
	 * @return UTLDateTime
	 */
	static function now(){
		return new UTLDateTime();
	}
	
	/**
	 * Devuelve la fecha en formato AAAA-MM-DD HH:MM:SS (like MySQL DATETIME)
	 * @return string
	 */
	public function getDateTimeBD(){
		return $this->format("Y-m-d H:i:s");
	}
	
	/**
	 * Devuelve el año en formato AAAA
	 * @return string
	 */
	public function getYear(){
		return $this->format("Y");
	}
	
	/**
	 * Devuelve el mes en formato MM
	 * @return string
	 */
	public function getMonth(){
		return $this->format("m");
	}
	
	/**
	 * Devuelve el día del mes en formato DD
	 * @return string
	 */
	public function getDay(){
		return $this->format("d");
	}
	
	/**
	 * Devuelve la hora del día en formato HH
	 * @return string
	 */
	public function getHour(){
		return $this->format("H");
	}
	
	/**
	 * Devuelve el minuto de la hora del día en formato MM
	 * @return string
	 */
	public function getMinute(){
		return $this->format("i");
	}
	
	/**
	 * Devuelve el segundo del mes de la hora del día en formato SS
	 * @return string
	 */
	public function getSecond(){
		return $this->format("s");
	}
	
	/**
	 * Método mágico que es llamado directamente al intentar utilizar una instancia como un string (echo $instanciaUTLDateTime) d/m/Y H:i
	 * @return string 
	 */
	public function __toString(){
		return $this->format("d/m/Y H:i");
	}
	
	/**
	 * Devuelve la fecha en formato string (d/m/Y H:i)
	 * @return string
	 */
	public function toString(){
		return $this->format("d/m/Y H:i");
	}
	
	/** 
	 * @see DateTime::format()
	 */
	public function format($format) {
		$english = array('January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','Novemeber','December');
		$spanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre','Octubre','Noviembre','Diciembre');
		return str_replace($english, $spanish, parent::format($format));
	}
	
	/**
	 * Devuelve la fecha en formato largo
	 * @param string $newTimeZone
	 */
	public function getDateLong($newTimeZone='Europe/Madrid'){
		return $this->getInTimeZone($newTimeZone,'j \d\e F \d\e Y');		
	}
	
	/**
	 * Devuelve la fecha en formato largo
	 * @param string $newTimeZone
	 */
	public function getDateLongHour($newTimeZone='Europe/Madrid'){
		return $this->getInTimeZone($newTimeZone,'j \d\e F \d\e Y H:i\h');
	}
}
?>