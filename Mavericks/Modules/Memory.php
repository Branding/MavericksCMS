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
	static $Apcstatus = false;

	public function __construct()
	{
		if(Mavericks::LoadconfigwithKey('APC_CACHE'))
		{
			self::$Apcstatus = true;
		}
	}

	static function Add($name, $data)
	{
		return (self::$Apcstatus) ? apc_store($name, $data) : '';
	}

	static function Delete($name)
	{
		return (self::$Apcstatus) ? apc_delete($name) : '';
	}

	static function Get($name)
	{
		return (self::$Apcstatus) ? apc_fetch($name) : '';
	}
}