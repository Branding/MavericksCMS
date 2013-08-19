<?PHP
/**-------------- Copyright (C) 2013 - Mavericks Trynity -------------------------
    

     | ###      ###    ####  ##           ## ######### ########   ##  ###### ########
     | ## #    # ##  ##    ## ##         ##  ##        ##    ##   ##  ##     ##
     | ##  #  #  ##  ##    ##  ##       ##   ##        ########   ##  ##      ##
     | ##   ##   ##  ##    ##   ##     ##    ########  ##         ##  ##        ##
     | ##        ##  ########    ##   ##     ##        ###        ##  ##          ##
     | ##        ##  ##    ##     ## ##      ##        ##  ##     ##  ##           ##
     | ##        ##  ##    ##      ##        ######### ##     ##  ##  ###### #######

     * Author: |Lion (Kevin) - All rights reserved.
     * This program is private: you can not redistribute it and/or modify

   ----------------------------------------------------------------------*/
   
class Mavericks{

	const Mavericks_version = 'Thunderbold';
	const Mavericks_relase  = 'R7';
	const Mavericks_build	=  1922;
	
	static $Template;

	function __construct()
	{
		try
		{
			self::Prepare();
			self::GetPATH();
			self::Loader();
			self::MavericksLoad();
		}

		catch(Exception $e)
		{
			self::Exception('fatal', 'Ocurrio un error al cargar el sistema: '. $e);
		}
	}

	private static function Prepare()
	{
		self::Initsession();

		if (!version_compare(PHP_VERSION, '5.3.0', '>='))
	  	  exit('Lo sentimos, Mavericks edicion: '. self::Mavericks_version .' no funciona con esta version de PHP, actualizada a 5.4 o superior');

		if (!function_exists('curl_init'))
      	  exit('Sé requiere el modulo curl activado');
	  
		if (!function_exists('json_decode'))
          exit('Sé requiere el modulo json activado');
	}

	private static function MavericksLoad()
	{
		Require 'Modules/RainTPL.php';
		
		raintpl::$cache_dir = 	self::LoadconfigwithKey('TPL_CACHE'). SEPARATOR;
		raintpl::$tpl_dir	=	self::LoadconfigwithKey('TPL_DIR'). self::LoadconfigwithKey('TPL_NAME'). SEPARATOR;
		
		define('CDN', 		 self::LoadconfigwithKey('CDN') );
		define('SHORTNAME',  self::LoadconfigwithKey('SITENAME') );
		define('ABR_SITE',   self::LoadconfigwithKey('ABR_SITE') );
		define('ACTIONS_URL',self::LoadconfigwithKey('ACTIONS_URL') );
		
		self::$Template = new raintpl(); 

		if( self::LoadconfigwithKey('PROTECT_POST') )
		{
			if( defined('PROTECT_POST') )
			{
				self::__POST();
			}
		}

		if( self::LoadconfigwithKey('MAINTENANCE') )
		{
			exit(' Hcrazy se encuentra en mantenimiento ahora mismo, intentalo mas tarde');
		}

		if( self::LoadconfigwithKey('ENVIRONMENT') == "Production" )
		{
			error_reporting(0);
		}
	}

	static function Loader()
	{
		Require 'Modules/Utils.php';
		Require 'Modules/Database.php';
		Require 'Modules/Users.php';
		Require 'Modules/Memory.php';
		Require 'Modules/Html.php';
		Require 'Modules/Ase.php';
		Require 'Modules/Socketmus.php';
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
				Header('Exception notice:   '. $error);
				echo   'Exception capturada:'. $error;
			break;

			case "warning":
				Header('Exception type warning: '. $error);
				exit  ('Exception warning:      '. $error);
			break;

			case "fatal":

				$error .= " Mavericks edicion: ".self::Mavericks_version;
				Helpers::WriteInLogs('['. date('d/m/Y: h:i:s') .'] Fatal error: '. $error . ' FILE -> '.$_SERVER['SCRIPT_FILENAME'].' IP -> '. $_SERVER['REMOTE_ADDR']. PHP_EOL);
				
				if(Mavericks::LoadconfigwithKey('ENVIRONMENT') == "Developement")
				{
					self::$Template->assign('Exceptioname', $error);
					self::$Template->assign('Exceptiondate', date('d/m/Y: h:i:s'). ' (SERVER)' );
					self::$Template->assign('Exceptionline', __METHOD__);
					self::$Template->assign('Exceptionfile', __FILE__);
					self::$Template->assign('MavericksRelase', self::Mavericks_version);

					new CompressHtml( self::$Template->draw('Internalerror') );
				}
				exit;
			break;
		}
	}


	static function MakeRandom($length = 15)
	{
		$data 	  = "";
		$possible = "0123456789ABCDEFGHIJKLMNOPQRSTWXYZY"; 
		$i 		  = 0;

			while ($i < $length) 
			{ 
				$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
				$data .= $char;
				$i++;
			}
			
		return $data;
	}

	static function is_ajax()
	{
		return ( strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false;
	}

	static function MakeSSO()
	{
		return self::MakeRandom(8)."-".self::MakeRandom(4)."-".self::MakeRandom(4)."-".self::MakeRandom(4)."-".self::MakeRandom(12)."-".self::Mavericks_version;
	}

	static function Hash($keyOne, $keyTwo)
	{
		switch( self::LoadconfigwithKey('HASH_TYPE') )
		{
			case "Thunder":
				$str = hash('haval256,5', md5( $keyOne. strtolower( $keyTwo ) ).sha1( self::LoadconfigwithKey('HASH_KEY') ));
			break;

			case "Normal":
				$str = md5( $keyOne . strtolower($keyTwo) );
			break;

			default:
				self::Exception('fatal', 'El algoritmo de encriptacíon '.self::LoadconfigwithKey('HASH_TYPE').' no existe.');
			break;
		}

		return $str;
	}

	private static function __POST()
	{
		if(count($_POST) > 0) 
		{
			$url = $_SERVER['HTTP_REFERER'];
			$info = parse_url($url);

			$from = $info['host'];

			switch($from) 
			{
				case $_SERVER['SERVER_NAME'];
					break;

				case 'facebook.com':
					break;

				default:
					self::Exception('fatal', 'La peticion no es aceptada por que viene desde otra direccion');
					break;
			}
		} 
	} 

	static function ShowAdsense($dimension = '300px')
	{
		switch ($dimension) 
		{
			case '728px':
				if( self::LoadconfigwithKey('ADSENSE_BY') == 'Kevin' )
					$ads = '<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								 <ins class="adsbygoogle"
								     style="display:inline-block;width:728px;height:90px"
								     data-ad-client="ca-pub-3349164495616121"
								     data-ad-slot="1667608550"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>';
				else
					$ads = "";

			break;

			case '300px':
				if( self::LoadconfigwithKey('ADSENSE_BY') == 'Kevin')
					$ads = '<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								 <ins class="adsbygoogle"
								     style="display:inline-block;width:300px;height:250px"
								     data-ad-client="ca-pub-3349164495616121"
								     data-ad-slot="9114993352"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>';
				else
					$ads = "";
			break;
		}

		echo $ads;
	}

	static function LoadconfigwithKey($key)
	{
		Require 'configuration.inc';

		return ( is_string($key) ) ? $Mavericks['CONFIG'][$key] : self::Exception('fatal', 'Se debe definir un string para cargar la configuracíon.');
	}


	private static function Initsession()
	{
		if(session_id() == null) session_start();
	}
}