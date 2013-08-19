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

Header('Content-type: application/json');
Define('PROTECT_POST', true);

if( count($_POST) > 0 || Mavericks::is_ajax() )
    
    if($_SESSION['Proccess_forgot'] == "valid")
        $users->PasswordChange($_SESSION['Forgot_username'], $_POST['password'], $_POST['password_repit']);
    else    
        $users->InitForgot($_POST['username'], $_POST['Question1'], $_POST['Question2'], $_POST['Answer1'] , $_POST['Answer2']);

else 
    Header("Location: ". PATH . "/forgot");