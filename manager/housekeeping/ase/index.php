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

Require '../../../Init.php';

if(!$ase->LoginExist()){
    new CompressHtml( Mavericks::$Template->draw('housekeeping_login') );
else
    if(is_string($_GET['page'])
        $AsePage = $_GET['page'];
        
    switch($AsePage) 
    {
        case 'settings':
            new CompressHtml();
        break;
        
        default:
            new CompressHtml( Mavericks::$Template->draw('housekeeping_home') );
        break;
    }
