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
echo '<br/>Llamada a $client->__getFunctions();<br/>';
var_dump($client->__getFunctions());

echo '<br/>Llamada a $client->getVersion();<br/>';
echo "Version API: ".$client->getVersion().'<br/>';

echo '<br/>Llamada a (cambiar por los datos reales) $client->loggin("usuario","plan","********");<br/>';
var_dump($client->loggin('usuario','plan','********'));

echo '<br/>Llamada a $client->checkLoggin();<br/>';
try{
	var_dump($client->checkLoggin());
}catch(SoapFault $e){
	var_dump($e);
}catch(Exception $e){
	var_dump($e);
}


echo '<br/>Llamada a $client->getUserData();<br/>';
try{
var_dump($client->getUserData());
}catch(SoapFault $e){
	var_dump($e);
}catch(Exception $e){
	var_dump($e);
}


echo '<br/>Llamada a $client->getStats(774);<br/>';
$objEstadistica=$client->getStats(774);
var_dump($objEstadistica);

echo '<br/>Usando el objeto devuelto ENVMDLEstadistica::getAsunto() y ENVMDLEstadistica::getContactos_enviados_leidos()</br>';
echo "<b>Asunto:</b> ".$objEstadistica->getAsunto();
echo "<br/><b>Leídos únicos:</b> ".$objEstadistica->getContactos_enviados_leidos();

echo '<br/>Llamada a $client->getContactData(55);<br/>';
$objContacto=$client->getContactData(55);
var_dump($objContacto);


echo "\n".'<br/>Llamada a $client->getGroupData(1);<br/>';
$objGrupo=$client->getGroupData(1);
var_dump($objGrupo);

echo "\n".'<br/>Llamada a $client->getGroups();<br/>';
$objGroups=$client->getGroups();
var_dump($objGroups);

echo "\n".'<br/>Llamada a $client->getGroupContacts(255);<br/>';
$objGroupContacts=$client->getGroupContacts(255);
var_dump($objGroupContacts);
?>
