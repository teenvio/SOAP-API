<?php
/**
 * Modelo de datos de un envío
 * 
 * @package ENV
 * @subpackage MDL
 * @author Víctor J. Chamorro - victor@ipdea.com
 * @copyright Ipdea Land, S.L.
 *
 * LGPL v3 - GNU LESSER GENERAL PUBLIC LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU LESSER General Public License as published by
 * the Free Software Foundation, either version 3 of the License.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU LESSER General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
class ENVMDLEnvio {

	private $plan='';
	private $idEnvio=0;
	private $fechaCreacion;
	private $fecha;
	private $envios=0;
	private $estado=0;
	private $asunto="";
	private $idRemitente=0;
	private $nombre;
	private $idPieza=0;
	private $analytics=false;
	private $analytics_utm_campaign='';
	
	
	/**
	 * Constructor del Modelo de datos de un envío.
	 * @param int $idEnvio
	 * @param string $fechaCreacion
	 * @param string $fecha
	 * @param int $envios
	 * @param int $estado
	 */
	public function __construct($idEnvio=null,$fechaCreacion=null,$fecha=null,$envios=null,$estado=null){
		if (isset($idEnvio))		$this->idEnvio=(int) $idEnvio;
		if (isset($fechaCreacion))	$this->fechaCreacion=$fechaCreacion;
		if (isset($fecha))			$fhis->fecha=$fecha;
		if (isset($envios))			$this->envios=(int) $envios;
		if (isset($estado))			$this->estado=(int) $estado;
	}
	
	/**
	 * Fecha de creación del envío
	 * @return string "AAAA-MM-DD HH:MM:SS"
	 */
	public function getFechaCreaccion(){
		return $this->fechaCreacion;
	}
	
	/**
	* Fecha del envío, puede ser en el futuro si es programado o coincidir con la fecha de creación
	* @return string "AAAA-MM-DD HH:MM:SS"
	*/
	public function getFecha(){
		return $this->fecha;
	}
	
	/**
	 * Devuelve el número de contactos totales del envio
	 * @return int
	 */
	public function getEnvios(){
		return $this->envios;
	}
	
	/**
	 * Devuelve el identificador del envío
	 * @return int
	 */
	public function getIdEnvio(){
		return (int) $this->idEnvio;
	}
	
	/**
	 * Devuelve un boleano en función de si está activo o no las estadísticas de Analytics en este envío.
	 * @return bool
	 */
	public function getAnalytics(){
		return (bool) $this->analytics;
	}
	
	/**
	 * Indica si el envío tendrá activo el traking de Analytics
	 * @param bool $activo
	 */
	public function setAnalytics($activo){
		$this->analytics = (bool) $activo;
	}
	
	/**
	 * Establece el valor de la fecha de creación a la facilitada o a la actual si se omite.
	 * @param string $str_fechaCreacion "AAAA-MM-DD HH:MM:SS"
	 */
	public function setFechaCreacion($str_fechaCreacion=null){
		
	}
	/**
	 * Establece la fecha del envío o la actual si ésta no es pasada
	 * @param string $str_fecha "AAAA-MM-DD HH:MM:SS"
	 */
	public function setFecha($str_fecha=null){
		
	}
	
	/**
	 * Setea el número de envíos totales (contactos) del envío.
	 * @param integer $num_envios
	 */
	public function setEnvios($num_envios){
		$this->envios=(int) $num_envios;
	}
	
	/**
	 * Setea el identificador del envío.
	 * @param int $idEnvio
	 */
	public function setIdEnvio($idEnvio){
		$this->idEnvio=(int) $idEnvio;
	}
	
	/**
	 * Asunto del envío
	 * @param string $asunto
	 */
	public function setAsunto($asunto){
		$this->asunto=$asunto;
	}
	
	/**
	 * Asunto del envío
	 * @return string
	 */
	public function getAsunto(){
		return $this->asunto;
	}

	/**
	 * Id del remitente
	 * @param int $idRemitente
	 */
	public function setIdRemitente($idRemitente){
		$this->idRemitente=(int) $idRemitente;
	}
	
	/**
	 * Id del remitente
	 * @return int
	 */
	public function getIdRemitente(){
		return $this->idRemitente;
	}
	
	/**
	* Nombre del envío
	* @param string $asunto
	*/
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
	
	/**
	 * Nombre del envío
	 * @return string
	 */
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	 * Establece el id de la Pieza del envío
	 * @param int $id_pieza
	 */
	public function setIdPieza($id_pieza){
		$this->idPieza = (int) $id_pieza;
	}
	
	/**
	 * Id de la Pieza
	 * @return int
	 */
	public function getIdPieza(){
		return $this->idPieza;
	}
	
	/**
	 * Setea el valor de utm_campaign para Analytics
	 * @param string $utm_campaign
	 */
	public function setAnalyticsUtm_campaign($utm_campaign){
		$this->analytics_utm_campaign=$utm_campaign;	
	}
	
	/**
	 * El valor de utm_campaign para Analytics
	 * @return string
	 */
	public function getAnalyticsUtm_campaign(){
		return $this->analytics_utm_campaign;
	}
	
	/**
	 * @param string $plan
	 */
	public function setPlan($plan){
		$this->plan=$plan;
	}
	
	/**
	 * @return string
	 */
	public function getPlan(){
		return $this->plan;
	}

}
?>