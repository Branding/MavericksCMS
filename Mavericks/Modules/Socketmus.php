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

class SocketMus
{
	public function Send($header, $data)
	{
		if(!Mavericks::LoadconfigwithKey('SOCKETS')) return;
		
		$dataSend = $header . chr(1) . $data; 
		$sock = socket_create( AF_INET, SOCK_STREAM, getprotobyname('tcp') );
		socket_connect( $sock, Mavericks::LoadconfigwithKey('MUS_IP'), Mavericks::LoadconfigwithKey('MUS_PORT') );
		socket_send($sock, $dataSend, strlen($dataSend), MSG_DONTROUTE);	
		socket_close($sock);
	}

	public function NewCommand($command)
	{
		switch ($command) 
		{	
			case 'disconnect':
				$this->Send('signout', $_SESSION['username']);
			break;

			case 'unban':
				$this->Send('unban', $_SESSION['username']);
			break;

			default:
				exit('El comando no existe');	
			break;
		}
	}
}