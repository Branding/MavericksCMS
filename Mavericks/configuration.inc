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

$Mavericks = array();

$Mavericks['CONFIG']['MYSQL_HOST']  =   "localhost";
$Mavericks['CONFIG']['MYSQL_PORT']  =   3306;   
$Mavericks['CONFIG']['MYSQL_USER']  =   "root";
$Mavericks['CONFIG']['MYSQL_PASS']  =   "12341";
$Mavericks['CONFIG']['MYSQL_DBASE'] =   "Trynity";

$Mavericks['CONFIG']['SITENAME']    =   "Mavericks Trynity";
$Mavericks['CONFIG']['SITEPATH']    =   "Auto"; 
$Mavericks['CONFIG']['CDN']         =   "http://localhost/static";
$Mavericks['CONFIG']['HASH_TYPE']   =   "Mavericks"; // Normal or Mavericks
$Mavericks['CONFIG']['HASH_KEY']    =   "SeguridadInternaTrynity"; // Editar :)

$Mavericks['CONFIG']['SERC_UPDATES']=   true; 

$Mavericks['CONFIG']['TPL_DIR']     =   DOCUMENT_ROOT. 'Mavericks' .SEPARATOR. 'Templates' .SEPARATOR;
$Mavericks['CONFIG']['TPL_CACHE']   =   DOCUMENT_ROOT. 'Mavericks' .SEPARATOR. 'Templates' .SEPARATOR. 'cache';
$Mavericks['CONFIG']['TPL_NAME']    =   "Trynity";

$Mavericks['CONFIG']['APC_CACHE']   =   false;
$Mavericks['CONFIG']['RECAPTCH_PUB']=   "6LcNWeMSAAAAADxt1YADZfRKlK5AYPIiwR3aYwyn";   