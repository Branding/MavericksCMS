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

Require '../Init.php';

$HabboFigure = $_GET['figure'];
$HabboSecret = $_GET['tocken'];

$url = 'http://habbohotel.es/habbo-imaging/avatarimage?figure='.$HabboFigure; // Habbo URL Request

if(!isset($HabboFigure) || !isset($HabboSecret) ){
     exit("Image parms not defined");
}

elseif($HabboSecret != md5($HabboFigure."Segurityofhcrazy")){
     exit("Tocken no is valid");
}

else{

     header('Content-Type:image/png');

     $ch  = curl_init();
     curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_URL, $url);

     echo curl_exec($ch);
     curl_close($ch);
}