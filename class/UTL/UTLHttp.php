<?php

/**
 * Clase de utilidades HTTP
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
class UTLHttp{

	/**
	 * Clase de métodos estáticos, no es posible su instanciación
	 */
	private function __construct(){
	}

	/**
	 * Envia el código de estado 404 Not Found
	 * Por defecto además envía la página de error 404 personalizada
	 * Termina la ejecución con un die()
	 *
	 * @param boolean $pagina_error
	 */
	public static function sendNotFound($pagina_error=true){
		header('HTTP/1.0 404 Not Found');
		if ($pagina_error){
			echo @file_get_contents('includes/errores/404.html',true);
			flush();
		}
		die();
	}

	/**
	 * Redireccion HTTP 301 Moved Permanently
	 * a la url indicada. Interrumpe la ejecución del script.
	 * @param string $url
	 */
	public static function sendRedirect301($url){
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: '.trim($url));
		die();
	}

	/**
	 * Redireccion HTTP 302 Moved Temporarily
	 * a la url indicada. Interrumpe la ejecución del script.
	 * @param string $url
	 */
	public static function sendRedirect302($url){
		header('HTTP/1.1 302 Found');
		header('Location: '.trim($url));
		die();
	}

	/**
	 * Envía la cabecera para UTF8.
	 * Content-Type: text/html; charset=UTF-8
	 * @param string $content_type 'text/html'
	 */
	public static function sendCharsetUTF8($content_type='text/html'){
		if (!headers_sent()) header('Content-Type: '.$content_type.'; charset=UTF-8');
	}
	
	/**
	 * Envía la cabecera para ISO-8859-15.
	 * Content-Type: text/html; charset=ISO-8859-15
	 * @param string $content_type 'text/html'
	 */
	public static function sendCharsetISO($content_type='text/html'){
		header('Content-Type: '.$content_type.'; charset=ISO-8859-15');
	}
	
	/**
	 * Envía la cabecera para XML utf8
	 * Content-Type: text/xml; charset=UTF-8	 
	 */
	public static function sendContentTypeXML(){
		header('Content-Type: text/xml; charset=UTF-8');
	}
	
	/**
	 * Envía la cabecera para descargar
	 * Content-Type: application/download
	 * @param string $name Nombre del fichero a descargar
	 * @param string $contentType Opcional, por defecto application/download
	 */
	public static function sendContentTypeDownload($name=null,$contentType='application/download'){
		header("Content-Type: ".$contentType);
		if (!empty($name)) header("Content-Disposition: attachment; filename=".$name);
	}
	
	/**
	 * Envía cabecera de prohibido (HTTP 403) y muere
	 * Si se pasa text, manda ese string antes de morir.
	 * @param $txt
	 */
	public static function sendForbidden($txt=""){
		header('HTTP/1.1 403 Forbidden');
		die($txt);
	}
	
	/**
	 * Envía cabecera de error interno de servidor (HTTP 500) y muere
	 * Si se pasa text, manda ese string antes de morir.
	 * @param $txt
	 */
	public static function sendErrorInternoDeServidor($txt="",$e=null){
		header('HTTP/1.1 500 Internal server error');
		if ($txt=='') $txt=@file_get_contents('v4/public/utl/error_500.html',true);
		
		if ($e instanceof Exception){
			
			$detalles="<h2>Detalles</h2>";
			$detalles.=$e->getMessage()."\n".$e->getTraceAsString();
			$detalles=str_replace("\n", "<br>", $detalles);
			$txt=str_replace('<!-- DETALLES -->',$detalles,$txt);

		}

		die($txt);
	}
	
	/**
	 * Envía cabecera de solicitud errónea (HTTP 400) y muere
	 * Si se pasa text, manda ese string antes de morir.
	 * @param $txt
	 */
	public static function sendBadRequest($txt=""){
		header('HTTP/1.1 400 Bad request');
		die($txt);
	}
	
	/**
	 * Devuelve true en el caso de que se detecte que el USER_AGENT contiene MSIE (Microsoft Internet Explorer)
	 * @return boolean
	 */
	public static function isIE(){
		if (!isset($_SERVER['HTTP_USER_AGENT'])) return false;
		return (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false);
	}
	
	/**
	 * Inicia una sesión a menos que fuese iniciada con anterioridad
	 */
	public static function sessionStart(){
		if (session_id()=="") session_start();
	}

	/**
	 * Devuelve el user agent del navegador o cadena en blanco en caso de no llegar
	 * @return string
	 */
	public static function getUserAgent(){
		if (isset($_SERVER['HTTP_USER_AGENT'])){
			return $_SERVER['HTTP_USER_AGENT'];
		}else{
			return "";
		}
	}
}

?>