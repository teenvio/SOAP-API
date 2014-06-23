<?php
/**
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

ini_set("soap.wsdl_cache_enabled", 0);
require_once '../class/UTL/UTLHttp.php';
require_once '../class/UTL/UTLDateTime.php';
require_once '../class/UTL/UTLTeException.php';
require_once '../class/ENV/MDL/ENVMDLEstadistica.php';
require_once '../class/CONT/MDL/CONTMDLContacto.php';
require_once '../class/CONT/MDL/CONTMDLGrupo.php';

$wsdl="https://secure.teenvio.com/v4/public/api/soap/wsdl.xml?";
$client = new SoapClient($wsdl,array('classmap'=>array(
    'ENVMDLEstadistica'=>'ENVMDLEstadistica',
    'CONTMDLContacto'=>'CONTMDLContacto',
    'UTLDateTime'=>'UTLDateTime',
    'CONTMDLGrupo'=>'CONTMDLGrupo'
)));

UTLHttp::sendCharsetUTF8();

if ($client->loggin('usuario','ipdea','******')==false){
	echo "<h1>incorrect user or pass / usuario o contraseña incorrectas</h1>";
	die;
}

$array_objgrupos=$client->getGroups();

echo "<style>
body{color:#4E575B;font-size:14px;}
table{border-collapse:collapse;border:1px solid #cccccc}
table tr td{padding:10px;}
</style>";

if (!empty($_GET['id'])){
	
	echo  "<table border='1'>";
	echo "<tr>";
	echo "<td> ID CONTACTO </td>";
	echo "<td> Nombre  </td>";
	echo "<td> Email  </td>";
	echo "</tr>";

	$array_objContactos = $client->getGroupContacts($_GET['id']);
	foreach($array_objContactos as $id_contacto){

		try{
			$objContacto = $client->getContactData($id_contacto);
			echo "<tr><td>".$objContacto->getId()."</td>";
			echo "<td>".$objContacto->getNombre()."</td>";
			echo "<td>".$objContacto->getEmail()."</td></tr>";
		}catch(SoapFault $e){
			var_dump($e);
		}
				
	}
}else{

	echo  "<table border='1'>";
	echo "<tr>";
	echo "<td> ID GRUPO </td>";
	echo "<td> Nombre  </td>";
	echo "<td> Descripción  </td>";
	echo "<td> Total Contactos  </td>";
	echo "</tr>";
	
	foreach($array_objgrupos as $mdl){
		/* @var $mdl CONTMDLGrupo */
		try{
			echo "<tr><td>".$mdl->getId()."</td>";
			echo "<td><a target='_blank' href='./ejercicio_soap.php?id=".$mdl->getId()."'>".$mdl->getNombre()."</a></td>";
			echo "<td>".$mdl->getDescripcion()."</td>";
			echo "<td>".count($client->getGroupContacts($mdl->getId()))."</td></tr>";		
		}catch(SoapFault $e){
			var_dump($e);
		}
	}
}

echo "<table>";

?>