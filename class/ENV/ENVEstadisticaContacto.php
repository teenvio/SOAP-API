<?php
/**
 * Datos de un contacto en una estadística concreta
 * @package ENV
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
class ENVEstadisticaContacto{
	
	/**
	 * @var string
	 */
	private $plan;
	
	/**
	 * @var int
	 */
	private $id_envio;
	
	/**
	 * @var int
	 */
	private $id_contacto;
	
	/**
	 * @var array
	 */
	private $row_data;
	
	/**
	 * @var array
	 */
	private $clicks_data;
	
	/**
	 * Objeto de la estadistica de un único contacto en un envio
	 * @param type $plan
	 * @param type $id_envio
	 * @param type $id_contacto
	 */
	public function __construct($plan,$id_envio,$id_contacto) {
		
	}
	
	/**
	 *
	 */
	private function getData(){
	
	}
	
	/**
	 * @return boolean
	 */
	public function isRead(){
		return ($this->row_data['leido']>0);
	}
	
	/**
	 * @return boolean
	 */
	public function isDelivered(){
		return ($this->isSend() && !$this->isBounced());
	}
	
	/**
	 * @return boolean
	 */
	public function isSend(){
		return (($this->row_data['no_mail']==0 || ($this->row_data['no_mail']==1 && $this->isRead())) && !$this->isEmailBadFormat());
	}
	
	/**
	 * @return boolean
	 */
	public function isBounced(){
		return ($this->row_data['devuelto']==1);
	}
	
	/**
	 * @return string
	 */
	public function getBouncedCode(){
		return $this->row_data['from_no_mail'];
	}
	
	/**
	 * @return boolean
	 */
	public function isEmailBadFormat(){
		return ($this->row_data['fallido']==1);
	}
	
	/**
	 * @return int
	 */
	public function getNumReads(){
		return $this->row_data['leido'];
	}
	
	/**
	 * @return boolean
	 */
	public function isInactive(){
		return ($this->row_data['no_mail']==1);
	}
	
	/**
	 * Obtiene una relacion de enlaces con su id,url y clicks
	 * @return array
	 */
	public function getClicks(){		
		return $this->clicks_data;
	}
}

?>