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
    header("Location: ". PATH);

$Auth = Mavericks::MakeSSO(); 
$Database->Query('UPDATE users SET auth_ticket = "'. $Auth .'" WHERE username = "'. $_SESSION['username'] .'" LIMIT 1 ');
$Database->Query('UPDATE user_tickets SET sessionticket = "'. $Auth .'", ipaddress = "'. $_SERVER['REMOTE_ADDR'] .'" WHERE userid = "'.$users->Info('id').'" ');

$Ticket = $Database->Query('SELECT * FROM users WHERE username = "'. $_SESSION['username'] .'" ')->fetch_assoc();

/**
    HCrazy cur'l host
*/

    $data = array('username'      => $_SESSION['username'], 
                  'UserSSOticket' => $Ticket['auth_ticket'], 
                  'userID'        => $Ticket['id']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://91.121.232.200/showgame.php');
    curl_setopt($ch, CURLOPT_USERAGENT, "Mavericks::SYST3M::Input::HCRAZY");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $Response = curl_exec($ch);
    curl_close($ch);

    new CompressHtml($Response);