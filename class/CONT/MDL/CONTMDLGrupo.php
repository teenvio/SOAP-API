<?php

/**
 * Objeto MDL Grupo
 * @package CONT
 * @subpackage MDL
 * @author Victor J Chamorro - victor@ipdea.com
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
class CONTMDLGrupo{
	
	/**
	 * @var string
	 */
	private $plan;
	
	/**
	 * @var int
	 */
	private $Id;
	
	/**
	 * @var string
	 */
	private $Nombre;
	
	/**
	 * @var string
	 */
	private $Descripcion;
	
	/**
	 * @var UTLDateTime
	 */
	private $FechaCreacion;
	
	/**
	 * @var UTLDateTime
	 */
	private $FechaModificacion;
	
	/**
	 * @var int
	 */
	private $Borrado;
	
	/**
	 * Objeto MDL Grupo
	 * @param string $plan
	 * @param int $id 
	 */
	public function __construct($plan,$id=null) {
		$this->plan=$plan;
		if (!is_null($id)){
			$this->Id=$id;
			$this->loadFromDB();
		}
		$this->FechaCreacion=new UTLDateTime();
		$this->FechaModificacion=new UTLDateTime();
	}
	
	/**
	 * Rellena el MDL
	 */
	public function loadFromDB(){
		die('No implementado en api');
	}
	
	/**
	 * Guarda en BBDD el grupo
	 */
	public function saveToDB(){
		die('No implementado en api');		
	}
	
	/**
	 * Devuelve el valor de Borrado
	 * @return int
	 */
	public function getBorrado(){
	  return $this->Borrado;
	}
	
	/**
	 * Setea el valor de Borrado
	 * @param int $value
	 */
	public function setBorrado($value){
	  $this->Borrado = $value;
	}
	
	/**
	 * Devuelve el valor de FechaModificacion
	 * @return UTLDateTime
	 */
	public function getFechaModificacion(){
	  return $this->FechaModificacion;
	}
	
	/**
	 * Setea el valor de FechaModificacion
	 * @param UTLDateTime $value
	 */
	private function setFechaModificacion(UTLDateTime $value){
	  $this->FechaModificacion = $value;
	}
	
	/**
	 * Devuelve el valor de FechaCreacion
	 * @return UTLDateTime
	 */
	public function getFechaCreacion(){
	  return $this->FechaCreacion;
	}
	
	/**
	 * Setea el valor de FechaCreacion
	 * @param UTLDateTime $value
	 */
	public function setFechaCreacion(UTLDateTime $value){
	  $this->FechaCreacion = $value;
	}
	
	/**
	 * Devuelve el valor de Descripcion
	 * @return string
	 */
	public function getDescripcion(){
	  return $this->Descripcion;
	}
	
	/**
	 * Setea el valor de Descripcion
	 * @param string $value
	 */
	public function setDescripcion($value){
	  $this->Descripcion = $value;
	}
	
	/**
	 * Devuelve el valor de Nombre
	 * @return string
	 */
	public function getNombre(){
	  return $this->Nombre;
	}
	
	/**
	 * Setea el valor de Nombre
	 * @param string $value
	 */
	public function setNombre($value){
	  $this->Nombre = $value;
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
	
}

?>