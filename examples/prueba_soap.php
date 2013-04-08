<?php 
ini_set("soap.wsdl_cache_enabled", 0);
require_once '../class/UTL/UTLHttp.php';
require_once '../class/ENV/MDL/ENVMDLEstadistica.php';

$wsdl="https://secure.teenvio.com/v4/public/api/v4/wsdl.xml";
$client = new SoapClient($wsdl,array('classmap'=>array('ENVMDLEstadistica'=>'ENVMDLEstadistica')));

UTLHttp::sendCharsetUTF8();
echo '<br/>Llamada a $client->__getFunctions();<br/>';
var_dump($client->__getFunctions());

echo '<br/>Llamada a $client->getVersion();<br/>';
echo "Version API: ".$client->getVersion().'<br/>';

echo '<br/>Llamada a (cambiar por los datos reales) $client->loggin("usuario","plan","********");<br/>';
var_dump($client->loggin('usuario','plan','********'));

echo '<br/>Llamada a $client->checkLoggin();<br/>';
var_dump($client->checkLoggin());

echo '<br/>Llamada a $client->getUserData();<br/>';
var_dump($client->getUserData());

echo '<br/>Llamada a $client->getStats(774);<br/>';
$objEstadistica=$client->getStats(774);
var_dump($objEstadistica);

echo '<br/>Usando el objeto devuelto ENVMDLEstadistica::getAsunto() y ENVMDLEstadistica::getContactos_enviados_leidos()</br>';
echo "<b>Asunto:</b> ".$objEstadistica->getAsunto();
echo "<br/><b>Leídos únicos:</b> ".$objEstadistica->getContactos_enviados_leidos();
?>