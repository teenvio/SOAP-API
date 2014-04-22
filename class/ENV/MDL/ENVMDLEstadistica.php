<?php 

/**
  <xsd:complexType name="ENVMDLEstadistica">
			<xsd:all>
				<xsd:element name="idEnvio" type="xsd:int"/>
				<xsd:element name="idRemitente" type="xsd:int"/>
				<xsd:element name="idPieza" type="xsd:int"/>
				<xsd:element name="asunto" type="xsd:string"/>
				<xsd:element name="nombreEnvio" type="xsd:string"/>
				<xsd:element name="fechaEnvio" type="xsd:string"/>
				<xsd:element name="fechaFin" type="xsd:string"/>
				<xsd:element name="fechaCreacion" type="xsd:string"/>
				<xsd:element name="contactos_totales" type="xsd:int"/>
				<xsd:element name="contactos_enviados" type="xsd:int"/>
				<xsd:element name="contactos_enviados_leidos" type="xsd:int"/>
				<xsd:element name="contactos_enviados_leidos_inactivos" type="xsd:int"/>
				<xsd:element name="contactos_enviados_leidos_activos" type="xsd:int"/>
				<xsd:element name="contactos_enviados_no_leidos" type="xsd:int"/>
				<xsd:element name="contactos_enviados_no_leidos_rebotados" type="xsd:int"/>
				<xsd:element name="contactos_enviados_no_leidos_entregados" type="xsd:int"/>
				<xsd:element name="contactos_no_enviados" type="xsd:int"/>
				<xsd:element name="contactos_no_enviados_por_inactivos" type="xsd:int"/>
				<xsd:element name="contactos_no_enviados_por_inactivos_baja_manual" type="xsd:int"/>
				<xsd:element name="contactos_no_enviados_por_inactivos_baja_automatica" type="xsd:int"/>
				<xsd:element name="contactos_no_enviados_por_fallidos" type="xsd:int"/>
				<xsd:element name="contactos_no_enviados_por_fallidos_en_nomenclatura" type="xsd:int"/>
				<xsd:element name="visualizaciones_total" type="xsd:int"/>
				<xsd:element name="clicks_totales" type="xsd:int"/>
				<xsd:element name="clicks_unicos" type="xsd:int"/>
			</xsd:all>
		</xsd:complexType>
 */

/**
 * Modelo para los datos estadísticos de un envío
 * @author Víctor J. Chamorro <victor@ipdea.com>
 * @package ENV
 * @subpackage MDL
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

class ENVMDLEstadistica{
	
	/**
	 * @var int
	 */
	private $idEnvio=0;

	/**
	 * @var int
	 */
	private $idRemitente=0;
	
	/**
	 * @var int
	 */
	private $idPieza=0;
	
	/**
	 * Asunto (subject) del envío
	 * @var string
	 */
	private $asunto="";
	
	/**
	 * Nombre descriptivo del envío
	 * @var string
	 */
	private $nombreEnvio="";
	/**
	 * Fecha del lanzamiento del envío
	 * @var string (DATE)
	 */
	private $fechaEnvio="";
	
	/**
	 * @var int
	 */
	private $fechaFin="";
	
	/**
	 * Fecha del lanzamiento del envío
	 * @var string (DATE)
	 */
	private $fechaCreacion="";
	
	/**
	 * @var int
	 */
	private $contactos_totales=0;
	/**
	 * @var int
	 */
	private $contactos_enviados=0;
	/**
	 * @var int
	 */
	private $contactos_enviados_leidos=0;
	/**
	 * @var int
	 */
	private $contactos_enviados_leidos_inactivos=0;
	/**
	 * @var int
	 */
	private $contactos_enviados_leidos_activos=0;
	/**
	 * @var int
	 */
	private $contactos_enviados_no_leidos=0;
	/**
	 * @var int
	 */
	private $contactos_enviados_no_leidos_rebotados=0;
	/**
	 * @var int
	 */
	private $contactos_enviados_no_leidos_entregados=0;
	/**
	 * @var int
	 */
	private $contactos_no_enviados=0;
	/**
	 * @var int
	 */
	private $contactos_no_enviados_por_inactivos=0;
	/**
	 * @var int
	 */
	private $contactos_no_enviados_por_inactivos_baja_manual=0;
	/**
	 * @var int
	 */
	private $contactos_no_enviados_por_inactivos_baja_automatica=0;
	/**
	 * @var int
	 */
	private $contactos_no_enviados_por_fallidos=0;
	/**
	 * @var int
	 */
	private $contactos_no_enviados_por_fallidos_en_nomenclatura=0;
	/**
	 * @var int
	 */
	private $visualizaciones_total=0;
	/**
	 * @var int
	 */
	private $clicks_totales=0;
	/**
	 * @var int
	 */
	private $clicks_unicos=0;
		
	/**
	 * @return int
	 */
	public function getIdEnvio(){
		return (int) $this->idEnvio;
	}
	
	/**
	 * @param int $value
	 */
	public function setIdEnvio($value){
		$this->idEnvio = $value;
	}
	
	/**
	 * @return int
	 */
	public function getIdRemitente(){
		return (int) $this->idRemitente;
	}
	
	/**
	 * @param int $value
	 */
	public function setIdRemitente($value){
		$this->idRemitente = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getIdPieza(){
		return (int) $this->idPieza;
	}
	
	/**
	 * @param int $value
	 */
	public function setIdPieza($value){
		$this->idPieza = (int) $value;
	}
	
	/**
	 * @return string
	 */
	public function getAsunto(){
		return $this->asunto;
	}
	
	/**
	 * @param string $value
	 */
	public function setAsunto($value){
		$this->asunto = $value;
	}
	
	/**
	 * @return string
	 */
	public function getNombreEnvio(){
		return $this->nombreEnvio;
	}
	
	/**
	 * @param string $value
	 */
	public function setNombreEnvio($value){
		$this->nombreEnvio = $value;
	}
	
	/**
	 * @return string (DATE)
	 */
	public function getFechaEnvio(){
		return $this->fechaEnvio;
	}
	
	/**
	 * @param string (DATE) $value
	 */
	public function setFechaEnvio($value){
		$this->fechaEnvio = $value;
	}
	
	/**
	 * Devuelve el promedio de Clicks por Leido
	 * @return float
	 */
	public function getClicks_leido(){
	  return (($this->getContactos_enviados_leidos()>0)
				? round(($this->getClicks_totales() / $this->getContactos_enviados_leidos()),2)
				: 0
			);
	}
	
	/**
	 * @return int
	 */
	public function getClicks_unicos(){
	  return (int) $this->clicks_unicos;
	}
	
	/**
	 * @param int $value
	 */
	public function setClicks_unicos($value){
	  $this->clicks_unicos = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getClicks_totales(){
	  return (int) $this->clicks_totales;
	}
	
	/**
	 * @param int $value
	 */
	public function setClicks_totales($value){
	  $this->clicks_totales = (int) $value;
	}
	
	/**
	 * Devuelve el promedio de Visualizaciones por total Enviado
	 * @return float
	 */
	public function getVisualizaciones_enviado(){
	  return (($this->getContactos_enviados()>0)
					? round(($this->getVisualizaciones_total() / $this->getContactos_enviados()),2)
					: 0
				);
	}
		
	/**
	 * Devuelve el promedio de Visualizaciones por Leido
	 * @return float
	 */
	public function getVisualizaciones_leido(){
	  return (($this->getContactos_enviados_leidos()>0)
					? round(($this->getVisualizaciones_total() / $this->getContactos_enviados_leidos()),2)
					: 0
				);
	}
	
	/**
	 * @return int
	 */
	public function getVisualizaciones_total(){
	  return (int) $this->visualizaciones_total;
	}
	
	/**
	 * @param int $value
	 */
	public function setVisualizaciones_total($value){
	  $this->visualizaciones_total = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_no_enviados_por_fallidos_en_nomenclatura(){
	  return (int) $this->contactos_no_enviados_por_fallidos_en_nomenclatura;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_no_enviados_por_fallidos_en_nomenclatura($value){
	  $this->contactos_no_enviados_por_fallidos_en_nomenclatura = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_no_enviados_por_fallidos(){
	  return (int) $this->contactos_no_enviados_por_fallidos;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_no_enviados_por_fallidos($value){
	  $this->contactos_no_enviados_por_fallidos = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_no_enviados_por_inactivos_baja_automatica(){
	  return (int) $this->contactos_no_enviados_por_inactivos_baja_automatica;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_no_enviados_por_inactivos_baja_automatica($value){
	  $this->contactos_no_enviados_por_inactivos_baja_automatica = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_no_enviados_por_inactivos_baja_manual(){
	  return (int) $this->contactos_no_enviados_por_inactivos_baja_manual;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_no_enviados_por_inactivos_baja_manual($value){
	  $this->contactos_no_enviados_por_inactivos_baja_manual = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_no_enviados_por_inactivos(){
	  return (int) $this->contactos_no_enviados_por_inactivos;
	}
	
	/**
	 * @param nomber $value
	 */
	public function setContactos_no_enviados_por_inactivos($value){
	  $this->contactos_no_enviados_por_inactivos = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_no_enviados(){
	  return (int) $this->contactos_no_enviados;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_no_enviados($value){
	  $this->contactos_no_enviados = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_enviados_no_leidos_entregados(){
	  return (int) $this->contactos_enviados_no_leidos_entregados;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados_no_leidos_entregados($value){
	  $this->contactos_enviados_no_leidos_entregados = (int) $value;
	}
	    
	/**
	 * @return int
	 */
	public function getContactos_enviados_no_leidos_rebotados(){
	  return (int) $this->contactos_enviados_no_leidos_rebotados;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados_no_leidos_rebotados($value){
	  $this->contactos_enviados_no_leidos_rebotados = (int) $value;
	}

	/**
	 * @return int
	 */
	public function getContactos_enviados_no_leidos(){
	  return (int) $this->contactos_enviados_no_leidos;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados_no_leidos($value){
	  $this->contactos_enviados_no_leidos = (int) $value;
	}

	/**
	 * @return int
	 */
	public function getContactos_enviados_leidos_activos(){
	  return (int) $this->contactos_enviados_leidos_activos;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados_leidos_activos($value){
	  $this->contactos_enviados_leidos_activos = (int) $value;
	}

	/**
	 * @return int
	 */
	public function getContactos_enviados_leidos_inactivos(){
	  return (int) $this->contactos_enviados_leidos_inactivos;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados_leidos_inactivos($value){
	  $this->contactos_enviados_leidos_inactivos = (int) $value;
	}

	/**
	 * @return int
	 */
	public function getContactos_enviados_leidos(){
	  return (int) $this->contactos_enviados_leidos;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados_leidos($value){
	  $this->contactos_enviados_leidos = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_enviados(){
	  return (int) $this->contactos_enviados;
	}
	
	/**
	 * @param int $value
	 */
	public function setContactos_enviados($value){
	  $this->contactos_enviados = (int) $value;
	}
	
	/**
	 * @return int
	 */
	public function getContactos_totales(){
	  return (int) $this->contactos_totales;
	}
	/**
	 * @param int $value
	 */
	public function setContactos_totales($value){
	  $this->contactos_totales = (int) $value;
	}
	
	/**
	 * Fecha de creación del envío (AAAA-MM-DD HH:MM:SS)
	 * @return string
	 */
	public function getFechaCreacion(){
		return $this->fechaCreacion;
	}
	
	/**
	 * Fecha de creación del envío (AAAA-MM-DD HH:MM:SS)
	 * @param string $value
	 */
	public function setFechaCreacion($value){
		$this->fechaCreacion = $value;
	}
	
	/**
	 * Devuelve el porcentaje de No Enviados por Inactivos
	 * @return float
	 */
	public function getPorcentaje_no_enviados_por_inactivos(){		
		return (	($this->getContactos_no_enviados()>0)
						?	round(($this->getContactos_no_enviados_por_inactivos() *100) / $this->getContactos_no_enviados(),2)
						:	0
				);
	}
	
	/**
	 * Devuelve el porcentaje de No enviados por Inactivos Baja Manual
	 * @return float
	 */
	public function getPorcentaje_no_enviados_por_inactivos_baja_manual(){
		return (	($this->getContactos_no_enviados_por_inactivos()>0)
						?	round(($this->getContactos_no_enviados_por_inactivos_baja_manual() *100) / $this->getContactos_no_enviados_por_inactivos(),2)
						:	0
				);
	}
	
	/**
	 * Devuelve el porcentaje de No enviados por Inactivos Baja Automática
	 * @return float
	 */
	public function getPorcentaje_no_enviados_por_inactivos_baja_automatica(){
		return (	($this->getContactos_no_enviados_por_inactivos()>0)
				?	round(($this->getContactos_no_enviados_por_inactivos_baja_automatica() *100) / $this->getContactos_no_enviados_por_inactivos(),2)
				:	0
		);
	}
	
	/**
	 * Devuelve el porcentaje de No Enviados por Fallidos
	 * @return float
	 */
	public function getPorcentaje_no_enviados_por_fallidos(){
		return (	($this->getContactos_no_enviados()>0)
				?	round(($this->getContactos_no_enviados_por_fallidos() *100) / $this->getContactos_no_enviados(),2)
				:	0
		);
	}
	
	/**
	 * Devuelve el porcentaje de No Enviados por Fallidos En nomenclatura 
	 * 100% si hay algun fallido o 0 si no hay ninguno, ya que no hay otro tipo de no enviado por fallido 
	 * @return float
	 */
	public function getPorcentaje_no_enviados_por_fallidos_por_nomenclatura(){
		return ( ($this->getContactos_no_enviados_por_fallidos()>0)
				? 100
				: 0
		);
	}
	
	/**
	 * Devuelve el porcentaje de No Enviados 
	 * @return float
	 */
	public function getPorcentaje_no_enviados(){
		return (	($this->getContactos_totales()>0)
				?	round(( $this->getContactos_no_enviados() * 100) / $this->getContactos_totales(), 2)
				:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados Leidos
	 * @return float
	 */
	public function getPorcentaje_enviados_leidos(){
		return (	($this->getContactos_enviados()>0)
					?	round(($this->getContactos_enviados_leidos() *100) / $this->getContactos_enviados(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados Leidos Inactivos
	 * @return float
	 */
	public function getPorcentaje_enviados_leidos_inactivos(){
		return (	($this->getContactos_enviados_leidos()>0)
					?	round(($this->getContactos_enviados_leidos_inactivos() *100) / $this->getContactos_enviados_leidos(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados Leidos Activos
	 * @return float
	 */
	public function getPorcentaje_enviados_leidos_activos(){
		return (	($this->getContactos_enviados_leidos()>0)
					?	round(($this->getContactos_enviados_leidos_activos() *100) / $this->getContactos_enviados_leidos(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados No Leidos
	 * @return float
	 */
	public function getPorcentaje_enviados_no_leidos(){
		return (	($this->getContactos_enviados()>0)
					?	round(($this->getContactos_enviados_no_leidos() *100) / $this->getContactos_enviados(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados No Leidos Rebotados
	 * @return float
	 */
	public function getPorcentaje_enviados_no_leidos_rebotados(){
		return (	($this->getContactos_enviados_no_leidos()>0)
					?	round(($this->getContactos_enviados_no_leidos_rebotados() *100) / $this->getContactos_enviados_no_leidos(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados No Leidos Entregados
	 * @return float
	 */
	public function getPorcentaje_enviados_no_leidos_entregados(){
		return (	($this->getContactos_enviados_no_leidos()>0)
					?	round(($this->getContactos_enviados_no_leidos_entregados() *100) / $this->getContactos_enviados_no_leidos(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve el porcentaje de Enviados
	 * @return float
	 */
	public function getPorcentaje_enviados(){
		return (	($this->getContactos_totales()>0)
					?	round(($this->getContactos_enviados() *100) / $this->getContactos_totales(),2)
					:	'0'
		);
	}
	
	/**
	 * Devuelve la fecha y hora de finalización del envío
	 * @return string (DATE)
	 */
	public function getFechaFin(){
		return $this->fechaFin;
	}
	
	/**
	 * Fecha y hora de finalización del envío
	 * @param string $value
	 */
	public function setFechaFin($value){
		$this->fechaFin = $value;
	}
	
}
?>