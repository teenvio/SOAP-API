<?php

/**
 * Encapsulado de datos de un contacto
 * @author Víctor J Chamorro - victor@ipdea.com
 * @copyright Ipdea Land, S.L.
 * @package CONT
 * @subpackage MDL 
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
class CONTMDLContacto{
	
	//Principales
	private $Nombre;
	private $Apellidos;
	private $Email;
	private $Observaciones;
	
	//Empresa
	private $Empresa;
	private $EmpDireccion;
	private $EmpCP;
	private $EmpCiudad;
	private $EmpProvincia;
	private $EmpPais;
	private $EmpTel;
	private $EmpTelMovil;
	
	//Personales
	private $PersonalesDireccion;
	private $PersonalesCP;
	private $PersonalesCiudad;
	private $PersonalesProvincia;
	private $PersonalesPais;
	private $PersonalesTel;
	private $PersonalesTelMovil;
	private $PersonalesNacimiento;	
	
	//Auxiliares
	private $Auxiliares=array();
	
	//Relaciones
	private $Grupos=array();
	private $Envios=array();
	private $Inactivos=array();
	
	
	//Metadatos
	/**
	 * @var int
	 */
	private $Id;
	
	/**
	 * @var string
	 */
	private $plan=null;
	
	/**
	 * @var UTLDateTime
	 */
	private $fechaAlta=null;
	
	/**
	 * @var UTLDateTime
	 */
	private $fechaMod=null;
	
	/**
	 * @var int
	 */
	private $IdUsuario;
	
	/**
	 * Devuelve un objeto MDL de contacto, si se pasa el plan y el id/email se autorellenará
	 * @param string $plan
	 * @param int $id
	 * @param string $email
	 */
	public function __construct($plan=null,$id=null,$email=null){
		$this->Id=$id;
		$this->plan=$plan;
		$this->Email=$email;
		if (($this->Id!=null || $this->Email!=null) && $this->plan!=null){
			$this->loadFromDB();
		}
	}
	
	/**
	 * Carga los datos desde la BBDD
	 */
	public function loadFromDB(){
		die('No implementado en api');
	}
	
	/**
	 * Guarda los datos a la BBDD
	 */
	public function saveToDB(){
		die('No implementado en api');
	}
	
	/**
	 * Devuelve el valor de Id
	 * @return int
	 */
	public function getId(){
	  return $this->Id;
	}
	
	/**
	 * Setea el valor de Id
	 * @param int $value
	 */
	public function setId($value){
	  $this->Id = $value;
	}
	
	/**
	 * Fecha de alta
	 * @return UTLDateTime
	 */
	public function getFechaAlta(){
		return $this->fechaAlta;
	}
	
	/**
	 * Fecha de última modificación (sin incluir datos relacionados como grupos, inactivos, envios,etc)
	 * @return UTLDateTime
	 */
	public function getFechaModificacion(){
		return $this->fechaMod;
	}
	
	/**
	 * Devuelve en un array los ids de los remitentes inactivos
	 * @return multitype:
	 */
	public function getInactivos(){
		return $this->Inactivos;
	}
	
	/**
	 * Devuelve el array con los Id de los envios en los que ha participado el contacto
	 * @return array
	 */
	public function getEnvios(){
		return $this->Grupos;
	}
	
	/**
	 * Setea el array de los id de los envios en los que ha participado el contacto
	 * @param array $value
	 */
	public function setEnvios($value){
		$this->Grupos = $value;
	}
	
	/**
	 * Devuelve el array con los Id de los grupos a los que pertenece el contacto
	 * @return array
	 */
	public function getGrupos(){
	  return $this->Grupos;
	}
	
	/**
	 * Setea el array de los id grupos del MDL del contacto
	 * @param array $value
	 */
	public function setGrupos($value){
	  $this->Grupos = $value;
	}
	
	/**
	 * Agrega un id grupo al mdl del contacto si no existe previamente
	 * @param int $id_grupo
	 */
	public function addGrupo($id_grupo){
		if (!in_array($id_grupo, $this->Grupos)) $this->Grupos[]=(int) $id_grupo;
	}
	
	/**
	 * Elimina, si es posible, el Id Grupo del MDL del contacto
	 * @param int $id_grupo
	 * @return boolean
	 */
	public function removeGrupo($id_grupo){
		$key=array_search((int) $id_grupo, $this->Grupos);
		if ($key===false) return false;
		unset($this->Grupos[$key]);
	}
	
	/**
	 * Obtiene el dato del auxiliar pedido
	 * @return array
	 */	
	public function getAuxiliar($numero){
		if (!isset($this->Auxiliares[$numero])) return "";
		return $this->Auxiliares[$numero];
	}
	
	/**
	 * Setea el valor de un auxiliar en el MDL del contacto
	 * @param int $numero Número de Auxiliar
	 * @param string $valor Contenido del Auxiliar
	 */
	public function setAuxiliar($numero,$valor){
		$this->Auxiliares[(int) $numero]=$valor;
	}
	
	/**
	 * Array completo de auxiliares
	 * @return array
	 */
	public function getAuxiliares(){
	  return $this->Auxiliares;
	}
	
	/**
	 * Setea los auxiliares completos mediante array
	 * @param array $value
	 */	
	public function setAuxiliares($value){
	  $this->Auxiliares = $value;
	}
	
	/**
	 * Devuele la fecha de nacimiento en el formato "AAAA-MM-DD"
	 * @return string [AAAA-MM-DD]
	 */
	public function getPersonalesNacimiento(){
	  return $this->PersonalesNacimiento;
	}
	
	/**
	 * Setea la fecha de nacimiento "AAAA-MM-DD"
	 * @param strint $value [AAAA-MM-DD]
	 */
	public function setPersonalesNacimiento($value){
	  $this->PersonalesNacimiento = $value;
	}
	
	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesTelMovil(){
	  return $this->PersonalesTelMovil;
	}
	
	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setPersonalesTelMovil($value){
	  $this->PersonalesTelMovil = $value;
	}
	
	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesTel(){
	  return $this->PersonalesTel;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setPersonalesTel($value){
	  $this->PersonalesTel = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesPais(){
	  return $this->PersonalesPais;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setPersonalesPais($value){
	  $this->PersonalesPais = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesProvincia(){
	  return $this->PersonalesProvincia;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setPersonalesProvincia($value){
	  $this->PersonalesProvincia = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesCiudad(){
	  return $this->PersonalesCiudad;
	}
	
	public function setPersonalesCiudad($value){
	  $this->PersonalesCiudad = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesCP(){
	  return $this->PersonalesCP;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setPersonalesCP($value){
	  $this->PersonalesCP = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getPersonalesDireccion(){
	  return $this->PersonalesDireccion;
	}
	
	public function setPersonalesDireccion($value){
	  $this->PersonalesDireccion = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpTelMovil(){
	  return $this->EmpTelMovil;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpTelMovil($value){
	  $this->EmpTelMovil = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpTel(){
	  return $this->EmpTel;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpTel($value){
	  $this->EmpTel = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpPais(){
	  return $this->EmpPais;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpPais($value){
	  $this->EmpPais = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpProvincia(){
	  return $this->EmpProvincia;
	}
	
	public function setEmpProvincia($value){
	  $this->EmpProvincia = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpCiudad(){
	  return $this->EmpCiudad;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpCiudad($value){
	  $this->EmpCiudad = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpCP(){
	  return $this->EmpCP;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpCP($value){
	  $this->EmpCP = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpDireccion(){
	  return $this->EmpDireccion;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpDireccion($value){
	  $this->EmpDireccion = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmpresa(){
	  return $this->Empresa;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmpresa($value){
	  $this->Empresa = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getObservaciones(){
	  return (string) $this->Observaciones;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setObservaciones($value){
	  $this->Observaciones = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getEmail(){
	  return $this->Email;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setEmail($value){
	  $this->Email = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getApellidos(){
	  return $this->Apellidos;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setApellidos($value){
	  $this->Apellidos = $value;
	}

	/**
	 * Obtiene el dato
	 * @return string
	 */
	public function getNombre(){
	  return $this->Nombre;
	}

	/**
	 * Establece el dato
	 * @param string $value
	 */
	public function setNombre($value){
	  $this->Nombre = $value;
	}
	
	/**
	 * @return int
	 */
	public function getIdUsuario(){
		return $this->IdUsuario;
	}
	
	/**
	 * @param int $id 
	 */
	public function setIdUsuario($id){
		$this->IdUsuario=$id;
	}
	
	/**
	 * Devuelve el valor concreto del campo en su nomenclatura de BBDD
	 * @param string $campo
	 * @return string 
	 */
	public function getCampo($campo){
		$campos=$this->toDBArray();
		if (isset($campos[$campo])) return $campos[$campo];
		return null;
	}	
	
	/**
	 * Setea el valor concreto del campo en su nomenclatura de BBDD
	 * @param string $campo
	 * @param string $valor
	 * @return type 
	 */
	public function setCampo($campo,$valor){
		$array=array();
		
		$array['id']='setId';
		$array['nombre']='setNombre';
		$array['apellidos']='setApellidos';
		$array['email']='setEmail';
		$array['observaciones']='setObservaciones';
		$array['empresa']='setEmpresa';
		$array['edireccion']='setEmpDireccion';
		$array['ecpostal']='setEmpCP';
		$array['eciudad']='setEmpCiudad';
		$array['eprovincia']='setEmpProvincia';
		$array['epais']='setEmpPais';
		$array['teltrabajo']='setEmpTel';
		$array['moviltrabajo']='setEmpTelMovil';
		$array['direccion']='setPersonalesDireccion';
		$array['cpostal']='setPersonalesCP';
		$array['ciudad']='setPersonalesCiudad';
		$array['provincia']='setPersonalesProvincia';
		$array['telperso']='setPersonalesTel';
		$array['movilperso']='setPersonalesTelMovil';
		$array['cumple']='setPersonalesNacimiento';
		
		for($i=1;$i<21;$i++){
			$array['dato_'.$i]=$i;
		}
		
		if (isset($array[$campo])){
			if (substr($campo,0,5)=='dato_'){
				$this->setAuxiliar(substr($campo,5), $valor);
			}else{
				$method=$array[$campo];
				$this->$method($valor);
			}
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * Devuelve un array con todos los datos del MDL, cuyas claves coinciden los los campos en BBDD tabla contactos
	 * @return array
	 */
	public function toDBArray(){
		$array=array();
		
		$array['id']=$this->getId();
		$array['nombre']=$this->getNombre();
		$array['apellidos']=$this->getApellidos();
		$array['email']=$this->getEmail();
		$array['clave_unica']=$this->getEmail();
		$array['observaciones']=$this->getObservaciones();
		$array['empresa']=$this->getEmpresa();
		$array['edireccion']=$this->getEmpDireccion();
		$array['ecpostal']=$this->getEmpCP();
		$array['eciudad']=$this->getEmpCiudad();
		$array['eprovincia']=$this->getEmpProvincia();
		$array['epais']=$this->getEmpPais();
		$array['teltrabajo']=$this->getEmpTel();
		$array['moviltrabajo']=$this->getEmpTelMovil();
		$array['direccion']=$this->getPersonalesDireccion();
		$array['cpostal']=$this->getPersonalesCP();
		$array['ciudad']=$this->getPersonalesCiudad();
		$array['provincia']=$this->getPersonalesProvincia();
		$array['telperso']=$this->getPersonalesTel();
		$array['movilperso']=$this->getPersonalesTelMovil();
		$array['cumple']=$this->getPersonalesNacimiento();
		$array['id_usuario']=$this->getIdUsuario();
		
		for($i=1;$i<21;$i++){
			$array['dato_'.$i]=$this->getAuxiliar($i);
		}
		
		return $array;
	}
	
}

?>