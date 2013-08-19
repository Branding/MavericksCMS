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
   
Require 'Init.php';

if(!$users->LoginExist())
    Header("Location:". PATH);

 $Sockets =  new SocketMus();
 $Sockets->NewCommand('disconnect');

new Buffercompress( Mavericks::$Template->draw('logout') );

session_unset();