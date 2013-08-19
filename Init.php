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
   
Require 'Mavericks/Application.php';
ob_start();

Define('MICROTIME',     microtime());
Define('SEPARATOR',     DIRECTORY_SEPARATOR);
Define('DOCUMENT_ROOT', dirname(__FILE__).SEPARATOR);

new Mavericks();
new Memory();

Mavericks::$Template->assign('CDN',         CDN);
Mavericks::$Template->assign('SITENAME',    SHORTNAME);
Mavericks::$Template->assign('ABR_SITE',    ABR_SITE);
Mavericks::$Template->assign('PATH',        PATH);
Mavericks::$Template->assign('ACTIONS_URL', ACTIONS_URL);

$Database = new Database(
     Mavericks::LoadconfigwithKey('MYSQL_HOST'), Mavericks::LoadconfigwithKey('MYSQL_PORT'), 
     Mavericks::LoadconfigwithKey('MYSQL_USER'), Mavericks::LoadconfigwithKey('MYSQL_PASS'), 
     Mavericks::LoadconfigwithKey('MYSQL_DBASE') );

$users = new Users();
$ase   = new Ase();
