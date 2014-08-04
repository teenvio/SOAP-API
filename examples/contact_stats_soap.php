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
require_once '../class/ENV/ENVEstadisticaContacto.php';
require_once '../class/ENV/MDL/ENVMDLEnvio.php';

$wsdl="https://secure.teenvio.com/v4/public/api/soap/wsdl.xml?";

$client = new SoapClient($wsdl,array('classmap'=>array(
    'ENVEstadisticaContacto'=>'ENVEstadisticaContacto',
    'ENVMDLEnvio'=>'ENVMDLEnvio'
)));

UTLHttp::sendCharsetUTF8();

if ($client->loggin('usuario','plan','******')==false){
	echo "<h1>incorrect user or pass / usuario o contraseña incorrectas</h1>";
	die;
}

echo "\n".'<br/>Call to/Llamada a $client->getEnvio(774);<br/>';
$obj=$client->getEnvio(774);
echo "<pre>";
var_dump($obj);
echo "</pre>";

echo "\n".'<br/>Call to/Llamada a $client->getStatsContact(774,9512);<br/>';
$obj=$client->getStatsContact(774,9512);
echo "<pre>";
var_dump($obj);
echo "</pre>";

echo "<pre><b>Call To ENVEstadisticaContacto::BouncedCode()</b>\n";
var_dump($obj->getBouncedCode());

echo "<b>ENVEstadisticaContacto::getClicks()</b>\n";
var_dump($obj->getClicks());

echo "<b>ENVEstadisticaContacto::getNumReads()</b>\n";
var_dump($obj->getNumReads());

echo "<b>ENVEstadisticaContacto::isBounced()</b>\n";
var_dump($obj->isBounced());

echo "<b>ENVEstadisticaContacto::isDelivered()</b>\n";
var_dump($obj->isDelivered());

echo "<b>ENVEstadisticaContacto::isEmailBadFormat()</b>\n";
var_dump($obj->isEmailBadFormat());

echo "<b>ENVEstadisticaContacto::isInactive()</b>\n";
var_dump($obj->isInactive());

echo "<b>ENVEstadisticaContacto::isRead()</b>\n";
var_dump($obj->isRead());

echo "<b>ENVEstadisticaContacto::isSend()</b>\n";
var_dump($obj->isSend());

?>
