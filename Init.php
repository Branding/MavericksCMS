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

Require 'Mavericks/app.php';

Define('MICROTIME',     microtime());
Define('SEPARATOR',     DIRECTORY_SEPARATOR);
Define('DOCUMENT_ROOT', dirname(__FILE__).SEPARATOR);

new Mavericks();

Mavericks::$Template->assign('CDN', CDN);
Mavericks::$Template->assign('SITENAME', SHORTNAME);
Mavericks::$Template->assign('PATH', PATH);

$Database = new Database(Mavericks::LoadconfigwithKey('MYSQL_HOST'), Mavericks::LoadconfigwithKey('MYSQL_PORT'), 
                         Mavericks::LoadconfigwithKey('MYSQL_USER'), Mavericks::LoadconfigwithKey('MYSQL_PASS'), 
                         Mavericks::LoadconfigwithKey('MYSQL_DBASE'));