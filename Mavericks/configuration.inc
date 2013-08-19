<?PHP
/**-------------- Copyright (C) 2013 - Mavericks Trynity -------------------------
	

     * ###      ###    ####  ##           ## ######### ########   ##  ######## ########
     * ## #    # ##  ##    ## ##         ##  ##        ##    ##   ##  ##       ##
     * ##  #  #  ##  ##    ##  ##       ##   ##        ########   ##  ##       ##
     * ##   ##   ##  ##    ##   ##     ##    ########  ##         ##  ##         ##
     * ##        ##  ########    ##   ##     ##        ###        ##  ##           ##
     * ##        ##  ##    ##     ## ##      ##        ##  ##     ##  ##             ##
     * ##        ##  ##    ##      ##        ######### ##     ##  ##  ######## #######

	 * Author: |Lion - All rights reserved.
     * This program is private: you can not redistribute it and/or modify

   -------------------------------------------------------------------------*/

    $Mavericks = array();
    
    $Mavericks['CONFIG']['ENVIRONMENT'] =   "Developement"; // Production OR Developement 

    $Mavericks['CONFIG']['MYSQL_HOST']  =   "localhost";
    $Mavericks['CONFIG']['MYSQL_PORT']  =    3306;   
    $Mavericks['CONFIG']['MYSQL_USER']  =   "root";
    $Mavericks['CONFIG']['MYSQL_PASS']  =   "12341";
    $Mavericks['CONFIG']['MYSQL_DBASE'] =   "pixxel";

    $Mavericks['CONFIG']['SITENAME']    =   "HabboCrazy";
    $Mavericks['CONFIG']['ABR_SITE']    =   "HC";
    $Mavericks['CONFIG']['SITEPATH']    =   "http://localhost"; 
    $Mavericks['CONFIG']['ACTIONS_URL'] =   "http://localhost/actions/";
    $Mavericks['CONFIG']['CDN']         =   "http://localhost/static";
    $Mavericks['CONFIG']['HASH_TYPE']   =   "Thunder";  // Thunder OR Normal
    $Mavericks['CONFIG']['HASH_KEY']    =   "SeguridadInternaTrynity";
    $Mavericks['CONFIG']['DEF_LOOK']    =   "hr-893-31.hd-180-1.ch-3030-64.lg-275-62.sh-295-62.fa-1212";
    $Mavericks['CONFIG']['DEF_MOTTO']   =   "Is the moment!";
    $Mavericks['CONFIG']['MAINTENANCE'] =   false;

    $Mavericks['CONFIG']['ADSENSE_BY']  =   "Kevin";

    $Mavericks['CONFIG']['PROTECT_POST']=   true;
    $Mavericks['CONFIG']['SOCKETS']     =   false;
    $Mavericks['CONFIG']['MUS_IP']      =   "91.121.232.200";
    $Mavericks['CONFIG']['MUS_PORT']    =   "2510";

    $Mavericks['CONFIG']['TPL_DIR']     =   DOCUMENT_ROOT. 'Mavericks' .SEPARATOR. 'Templates' .SEPARATOR;
    $Mavericks['CONFIG']['TPL_CACHE']   =   DOCUMENT_ROOT. 'Mavericks' .SEPARATOR. 'Templates' .SEPARATOR. 'cache';
    $Mavericks['CONFIG']['TPL_NAME']    =   "Trynity";

    $Mavericks['CONFIG']['MEM_CACHE']   =   false;
    $Mavericks['CONFIG']['MEM_HOST']    =   "localhost";
    $Mavericks['CONFIG']['MEN_PORT']    =   11211;


    /**
        Configuration external 
    */

    $Mavericks['CONFIG']['RECAPTCH_PUB']=   "6LeK4eESAAAAAFmiUPV_UukNuDO2Mqgy7CWgiaKa";   
    $Mavericks['CONFIG']['RECAPTCH_PRV']=   "6LeK4eESAAAAAG3AdiBZ86ndXOpzrNZ_UCVQW4vs";