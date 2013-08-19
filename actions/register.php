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

    Require '../Init.php';

header('Content-type: application/json');
define('PROTECT_POST', true);

if( count($_POST) > 0 && Mavericks::is_ajax() )
	$users->_NewUser($_POST['username'],  $_POST['password'],  $_POST['password2'], 
                     $_POST['email'],     $_POST['Question1'], $_POST['Answer1'], 
                     $_POST['Question2'], $_POST['Answer2'],   $_POST['recaptcha_challenge_field'], 
                     $_POST['recaptcha_response_field']);
else
	Header("Location: " . PATH . "/register");