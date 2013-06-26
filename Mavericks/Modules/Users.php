<?PHP
/**-------------- Copyright (C) 2013 - Mavericks Trynity -------------------------
	
	 * Author: |Lion - All rights reserved.
     * This program is public: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.

     * This program is distributed in the hope that it will be useful,
     * but without any warranty without even the implied warranty of
     * merchantability or fitness for a particular purpose. See the
     * GNU General Public License for more details.

   ---------------------------------------------------------------------*/

class Users
{
	private $status = array();

	public function LogIN($username, $password)
	{
		$EncryPassword = Mavericks::Hash($password, $username);

		if( empty($username) OR empty($password) )
		{
			$this->status['error']	=  "Por favor rellena todos los campos para continuar";
			$this->status['status'] =  "NOK";
			echo json_encode($this->status);
		}
		elseif( !$this->UserValidate($username, $EncryPassword) )
		{
			$this->status['error']	=  "Los datos introducidos no son correctos, por favor vuelve a intentarlo";
			$this->status['pass']	=  $EncryPassword;
			$this->status['status'] =  "NOK";
			echo json_encode($this->status);
		}
		elseif( $this->UserIsbanned($username) )
		{
			$this->status['error']	=  "Lo sentimos, tu usuario se encuentra baneado. Si crees que es un error contacta con un administrador";
			$this->status['status'] =  "NOK";
			echo json_encode($this->status);
		}

		else
		{
			$this->status['status']	  =  "OK";
			$this->status['username'] = $username;
			$_SESSION['username']	  =	$username;
			$_SESSION['Tocken_login'] = Mavericks::MakeRandom(19);
			echo json_encode($this->status); 
		}
	}

	public function _NewUser($username, $password, $password2, $email, $Question1, $Answer1, $Question2, $Answer2, $Recode, $Recresp)
	{
		if(empty($username) || empty($password) || empty($password2) || empty($email) || empty($Answer1) || empty($Answer2))
		{
			$this->status['status']		=	"NOK";
			$this->status['error']		=	"Debes rellenar todos los campos para continuar";
			echo json_encode($this->status);
		}
	}

	public function CheckLogin()
	{
		if(isset($_SESSION['username']) && isset($_SESSION['Tocken_login']) )
			return true;
	}

	private function UserValidate($username, $password)
	{
		global $Database;
		$Query = $Database->Query('SELECT * FROM users WHERE username = "'. $username. '" AND password = "'. $password .'" ');
		$row = $Query->num_rows;

		return ($row > 0) ? true : false;
	}

	private function UserIsbanned($username)
	{
		global $Database;
		$Query = $Database->Query('SELECT * FROM bans WHERE bantype = "user" AND value = "'. $username .'" OR bantype = "ip" AND value = "'.$_SERVER['REMOTE_ADDR'].'" ');
		$num = $Query->num_rows;

		return ($num > 0) ? true : false;
	}
}