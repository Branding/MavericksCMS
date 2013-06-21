<?PHP
/**-------------- Copyright (C) 2013 - Mavericks Trynity -------------------------
	
	 * Author: |Lion - All rights reserved.
     * This program is public: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.

     * This program is distributed in the hope that it will be useful,
     * but without any warranty without even the implied warranty of
     * merchantability or fitness for a particular purpose. See the
     * GNU General Public License for more details.

   ---------------------------------------------------------------------*/

class Mavericks{

	const Mavericks_version = "Trynity";
	const Mavericks_build	= "1922";
	
	static $Template;

	function __construct()
	{
		try
		{
			self::Prepare();
			self::GetPATH();
			self::Loadfiles();
		}

		catch(Exception $e)
		{
			self::Exception('fatal', 'Ocurrio un error al cargar el sistema.');
		}
	}

	static function Loadfiles()
	{
		Require 'Modules/Helpers.php';
		Require 'Modules/Database.php';
		Require 'Modules/Users.php';
	}

	static function GetPATH()
	{
		if(self::LoadconfigwithKey('SITEPATH') == "Auto")
		{
			if( !defined('PATH') ){
				define('PATH', "http://".$_SERVER['SERVER_NAME']);
			}
		}

		else
		{
			if( !defined('PATH') ){
				define('PATH', self::LoadconfigwithKey('SITEPATH'));
			}
		}
	}

	static function Exception($type = 'notice', $error)
	{	
		switch($type)
		{
			case "notice":
				Header("Exception notice: ". $error);
				echo "Exception capturada: ". $error;
			break;

			case "warning":
				Header("Exception type warning: ". $error);
				exit("Exception warning");
			break;

			case "fatal":
				$error .= " Mavericks edicion: ".self::Mavericks_version;
				Header("Exception type fatal: ". $error);
				Helpers::WriteInLogs('['. date('d/m/Y: h:i:s') .'] Fatal error: '. $error . PHP_EOL);

				self::$Template->assign('Exceptioname', $error);
				self::$Template->draw('Internalerror');
				exit;
			break;
		}
	}

	private static function Prepare()
	{
		self::Initsession();

		if (!version_compare(PHP_VERSION, '5.3.0', '>='))
	  	  exit('Lo sentimos, Mavericks edicion: '. self::Mavericks_version .' no funciona con esta version de PHP, actualizada a 5.4 o superior');

		if (!function_exists('curl_init'))
      	  self::Exception('fatal', 'Sé requiere el modulo curl activado');
	  
		if (!function_exists('json_decode'))
          self::Exception('fatal', 'Sé requiere el modulo json activado');
		
		Require 'Modules/RainTPL.php';

		raintpl::$cache_dir = 	self::LoadconfigwithKey('TPL_CACHE'). SEPARATOR;
		raintpl::$tpl_dir	=	self::LoadconfigwithKey('TPL_DIR'). self::LoadconfigwithKey('TPL_NAME'). SEPARATOR;
		
		Define('CDN', self::LoadconfigwithKey('CDN'));
		Define('SHORTNAME', self::LoadconfigwithKey('SITENAME'));
		
		self::$Template = new raintpl(); 
	}

	static function MakeRandom($length = 15)
	{
		$data = "";
		$possible = "0123456789ABCDEFGHIJKLMNOPQRSTWXYZY"; 
		$i = 0;
			while ($i < $length) 
			{ 
				$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
				$data .= $char;
				$i++;
			}
		return $data;
	}

	static function Hash($keyOne, $keyTwo)
	{
		switch(self::LoadconfigwithKey('HASH_TYPE'))
		{
			case "Mavericks":
				$str = hash('haval256,5', md5($keyOne. strtolower($keyTwo)) );
			break;

			case "Normal":
				$str = md5($keyOne . strtolower($keyTwo));
			break;

			default:
				self::Exception('fatal', 'El algoritmo de encriptacion '.self::LoadconfigwithKey('HASH_TYPE').' no existe.');
			break;
		}

		return $str;
	}

	static function LoadconfigwithKey($key)
	{
		Require 'configuration.inc';

		return (is_string($key)) ? $Mavericks['CONFIG'][$key] : self::Exception('fatal', 'Se debe definir un string.');
	}


	private static function Initsession()
	{
		if(session_id() == null) session_start();
	}
}