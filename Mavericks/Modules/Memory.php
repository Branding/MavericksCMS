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
				Init memcached connection!
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
		self::$Memcached->close();
	}
}