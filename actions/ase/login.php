<?PHP
/**-------------- Copyright (C) 2013 - Mavericks Trynity -------------------------
    
     * ###      ###    ####  ##           ## ######### ########   ##  ###### ########
     * ## #    # ##  ##    ## ##         ##  ##        ##    ##   ##  ##     ##
     * ##  #  #  ##  ##    ##  ##       ##   ##        ########   ##  ##      ##
     * ##   ##   ##  ##    ##   ##     ##    ########  ##         ##  ##        ##
     * ##        ##  ########    ##   ##     ##        ###        ##  ##          ##
     * ##        ##  ##    ##     ## ##      ##        ##  ##     ##  ##           ##
     * ##        ##  ##    ##      ##        ######### ##     ##  ##  ###### #######

     * Author: |Lion (Kevin) - All rights reserved.
     * This program is private: you can not redistribute it and/or modify

   ----------------------------------------------------------------------*/

   Require '../../Init.php';

header('Content-type: application/json');
define('PROTECT_POST', true);

if( count($_POST) > 0 && Mavericks::is_ajax() )
	$ase->Login($_POST['username'], $_POST['password']);