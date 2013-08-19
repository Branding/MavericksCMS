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
   
class Memory
{
	static $Memstatus = false;
	static $Memcached;

	public function __construct()
	{
		if(Mavericks::LoadconfigwithKey('MEM_CACHE'))
		{
			self::$Memstatus = true;
			self::$Memcached = new Memcache();

			/**
				Init Memcached connection!
			*/
                        
            self::$Memcached->connect(Mavericks::LoadconfigwithKey('MEM_HOST'), Mavericks::LoadconfigwithKey('MEM_PORT')) or die(Mavericks::Exception('fatal', 'Error con la conexion MEMCACHED'));
		}
	}

	static function Add($name, $data)
	{
		return (self::$Memstatus) ? self::$Memcached->set($name, $data) : '';
	}

	static function Delete($name)
	{
		return (self::$Memstatus) ? self::$Memcached->delete($name) : '';
	}

	static function Get($varkey)
	{
		return (self::$Memstatus) ? self::$Memcached->get($varkey) : '';
	}

	function __destruct()
	{
		if(self::$Memstatus)
			self::$Memcached->close();
	}
}