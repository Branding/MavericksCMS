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

class Users
{
	private $status = array();

	function __construct()
	{
		global $Database;
		
		if($this->LoginExist())
		{
			$Tocken = $Database->Query('SELECT * FROM users WHERE username = "'. $_SESSION['username'] .'" ')->fetch_assoc();
			
			if($this->UserIsbanned($_SESSION['username']))
			{
				session_unset();
			}

			if($_SESSION['Tocken_login'] != $Tocken['Login_tocken'])
			{
				session_unset();
			}
		}
	}

	public function LogIN($username, $password)
	{
		global $Database;

		$EncryPassword = Mavericks::Hash($password, $username);

		if( empty($username) OR empty($password) )
		{
			$this->status['error']	=  "Por favor rellena todos los campos para continuar";
			$this->status['status'] =  "NOK";
		}
		elseif( !$this->UserValidate($username, $EncryPassword) )
		{
			$this->status['error']	=  "Los datos introducidos no son correctos, por favor vuelve a intentarlo";
			$this->status['status'] =  "NOK";
		}
		elseif( $this->UserIsbanned($username) )
		{
			$this->status['error']	=  "Lo sentimos, tu usuario se encuentra baneado. Si crees que es un error contacta con un administrador";
			$this->status['status'] =  "NOK";
		}

		else
		{
			$TockenLogin = Mavericks::MakeRandom(30);
			$Database->Query('UPDATE users SET last_online = "'. time() .'", Login_tocken = "'. $TockenLogin .'" WHERE username = "'. $username .'" LIMIT 1');

			$this->status['status']	  =  "OK";
			$this->status['username'] = $username;

			$_SESSION['username']	  =	$username;
			$_SESSION['Tocken_login'] = $TockenLogin;

			Mavericks::$Template->assign('username', $_SESSION['username']);
		}
			echo json_encode($this->status); 
	}

	public function _NewUser($username, $password, $password2, $email, $Question1, $Answer1, $Question2, $Answer2, $recaptcha_challenge_field, $recaptcha_response_field)
	{
		$EncryPassword = Mavericks::Hash($password, $username);

		if(empty($username) || empty($password) || empty($password2) || empty($email) || empty($Answer1) || empty($Answer2))
		{
			$this->status['status']		=	"NOK";
			$this->status['error']		=	"Debes rellenar todos los campos para continuar";
		}

		elseif( strlen( $username) < 4 || strlen( $username ) > 13 )
		{
			$this->status['status'] =  "NOK";
			$this->status['error']	=  "Tu nombre de usuario solo debe tener de 4 a 13 caracteres";
		}

		elseif( !$this->NameV($username) || $this->TakenUser($username) )
		{
			$this->status['status']	= "NOK";
			$this->status['error']	= "Tu nombre de usuario no es valido o está siendo utilizado por otro";
		}

		elseif( strlen( $password ) < 6 )
		{
			$this->status['error']	 = 	"Tu nombre de usuario debe tener minimo 6 caracteres";
			$this->status['status'] =  "NOK";
		}

		elseif( !preg_match( "#[0-9]+#",  $password) ||  !preg_match( "#[a-z]+#", $password ) || !preg_match( "#[A-Z]+#", $password ) )
		{
			$this->status['error']  =  "Tu contraseña debe tener numeros, letras minusculas y mayusculas";
			$this->status['status'] =  "NOK";
		}

		elseif( $password != $password2)
		{
			$this->status['error']  =  "Las contraseñas introducidas no son iguales, por favor verificalas";
			$this->status['status'] =  "NOK";
		}

		elseif( $this->TakenEmail($email) )
		{
			$this->status['error']  =  "Tu email está siendo utilizado por otro usuario";
			$this->status['status'] =  "NOK";
		}

		elseif(!is_numeric($Question1) || !is_numeric($Question2))
		{
			$this->status['error']  =  "Las preguntas contienen un ID incorrecto";
			$this->status['status'] =  "NOK";
		}

		elseif($Question1 == $Question2)
		{
			$this->status['error']  =  "Por favor selecciona diferentes preguntas";
			$this->status['status'] =  "NOK";
		}

		elseif( trim( strtolower( $Answer1) ) == trim( strtolower( $Answer2 ) ) )
		{
			$this->status['error']  =  "Las respuestas no pueden ser las mismas";
			$this->status['status'] =  "NOK";
		}

		else
		{
				Require 'RecaptchaLIB.php';

			$ReCaptcha = recaptcha_check_answer(
					Mavericks::LoadconfigwithKey('RECAPTCH_PRV'),
					$_SERVER['REMOTE_ADDR'],
					$recaptcha_challenge_field,
					$recaptcha_response_field);

			if(!$ReCaptcha->is_valid)
			{
				$this->status['error']  =  "El codigo de verificacion introducido no es valido";
				$this->status['status'] =  "NOK";
			}

			else
			{
				global $Database;
				$Tocken_login = Mavericks::MakeRandom(30);

				$Userdata = array('username' => $username, 'Login_tocken' => $Tocken_login, 'password' => $EncryPassword, 'email' => $email, 'motto' => Mavericks::LoadconfigwithKey('DEF_MOTTO'), 'auth_ticket' => Mavericks::MakeSSO(), 'rank' => 1, 'gender' => 'M', 'look' => Mavericks::LoadconfigwithKey('DEF_LOOK'), 'credits' => 30000, 'online' => 0, 'account_created' => time(), 'last_online' => time() );
				$Database->InsertInto('users', $Userdata);

				$Questions = array('username' => $username, 'question_one' => $Question1, 'answer_one' => $Answer1, 'question_two' => $Question2, 'answer_two' => $Answer2);
				$Database->InsertInto('SafetyQuestions', $Questions);

				$this->status['UserRegister']	=	$username;
				$this->status['status']			=	"OK";

				$_SESSION['username']	  =	$username;
				$_SESSION['Tocken_login'] = $Tocken_login;

				Mavericks::$Template->assign('username', $username);
			}
		}

		echo json_encode($this->status);
	}

	public function InitForgot($username, $question1, $question2, $answer1, $answer2)
	{
		global $Database;

		if(empty($username) || empty($question1) || empty($question2) || empty($answer1) || empty($answer2))
		{
			$this->status['status']		=	"NOK";
			$this->status['error']		=	"Debes rellenar todos los campos para poder continuar";
		}

		elseif( !$this->TakenUser($username) )
		{
			$this->status['status']		=	"NOK";
			$this->status['error']		=	"El nombre de usuario ". $username . " no está registrado en la base de datos";
		}

		elseif( !is_numeric($question1) || !is_numeric($question2) || $question1 == $question2 || trim(strtolower($answer1)) == trim(strtolower($answer2)) )
		{ 
			$this->status['status']		=	"NOK";
			$this->status['error']		=	"Las preguntas o respuestas son iguales";
		}

		elseif( !$this->QuestionsValidate( array($username, $question1, $question2, $answer1, $answer2) ) )
		{
			$this->status['status']		=	"NOK";
			$this->status['error']		=	"Las preguntas no coinciden con las que te registraste";
		}
		else
		{
			$_SESSION['Proccess_forgot']=   "valid";
			$_SESSION['Forgot_username']=	$username;

			$this->status['status']		=	"OK";
		}

		echo json_encode($this->status);
	}

	private function QuestionsValidate($UserQuest = array())
	{
		global $Database;
		$Query	=  $Database->Query('SELECT * FROM SafetyQuestions WHERE username = "'. $UserQuest[0] .'" ');
		$Safety =  $Query->fetch_assoc();

		if($UserQuest[1] == $Safety['question_one'] || $UserQuest[2] == $Safety['question_two'] || $UserQuest[3] == $Safety['answer_one'] || $UserQuest[4] == $Safety['answer_two'])
		{
			return true;
		}
	}

	public function PasswordChange($username, $password, $password_repit)
 	{
 		global $Database;

 		$password = base64_decode($password);
 		$password_repit = base64_decode($password_repit);
 		
 		$LastPassword	= $Database->Query('SELECT * FROM users WHERE username = "'.$_SESSION['Forgot_username'].'" ')->fetch_assoc();

 		if(empty($password) || empty($password_repit))
 		{
 			$this->status['error']	=	"Debes de rellenar todos los campos para continuar";
 			$this->status['status']	=	"NOK";
 		}

 		elseif( strlen( $password ) < 6 )
		{
			$this->status['error']	= 	"Tu nombre de usuario debe tener minimo 6 caracteres";
			$this->status['status'] =  "NOK";
		}

		elseif( !preg_match( "#[0-9]+#",  $password) ||  !preg_match( "#[a-z]+#", $password ) || !preg_match( "#[A-Z]+#", $password ) )
		{
			$this->status['error']  =  "Tu contraseña debe tener numeros, letras minusculas y mayusculas";
			$this->status['status'] =  "NOK";
		}

		elseif( $password != $password_repit)
		{
			$this->status['error']  =  "Las contraseñas introducidas no son iguales, por favor verificalas";
			$this->status['status'] =  "NOK";
		}

		elseif( Mavericks::Hash($password, $_SESSION['Forgot_username']) == $LastPassword['password'] )
		{
			$this->status['error']	=	"Parece que está contraseña erá que le tenias, ¡Lo has recordado!";
			$this->status['status']	=	"NOK";
			session_unset();
		}

		else
		{
			$Database->Query('UPDATE users SET password = "'. Mavericks::Hash($password, $_SESSION['Forgot_username']) .'" WHERE username = "'. $_SESSION['Forgot_username'] .'" ');
			$this->status['status']	=	"OK";
			session_unset();
		}

		echo json_encode($this->status);
 	}

	public function Info($parm, $username = null, $Login_tocken = true )
	{
		global $Database;

		if($username == null){
			$username = $_SESSION['username'];
		}

		if(count($parm) > 0)
		{	
			$text = "SELECT * FROM users WHERE username = '". $username ."' ";
			
			if($Login_tocken)
			{
				$text .= "AND Login_tocken = '". $_SESSION['Tocken_login'] ."' ";
			}

			$Query = $Database->Query($text);
			$row   = $Query->fetch_assoc();
			
			return $row[$parm];	
		}
	}

	private function TakenUser($username)
	{
		global $Database;
		$Query = $Database->Query('SELECT * FROM users WHERE username = "'. $username .'" ');

		return ($Query->num_rows > 0) ? true : false;
	}

	private function TakenEmail($mail)
	{
		global $Database;
		$Query = $Database->Query('SELECT * FROM users WHERE email = "'. $mail .'" ');

		return ($Query->num_rows > 0) ? true : false;
	}

	public function Figure($look)
	{
		return PATH. '/habbo-imaging/avatarimage?figure='. $look . '&tocken='. md5($look."Segurityofhcrazy");
	}

	private function NameV($name = '')
	{
		return ( !preg_match('/[^a-z\d\-=\?!@:\.]/i', $name) ) ? true : false;
	}

	public function LoginExist()
	{
		return ( isset($_SESSION['username']) && isset($_SESSION['Tocken_login']) ) ? true : false;
	}

	public function UserValidate($username, $password)
	{
		global $Database;
		$Query = $Database->Query('SELECT * FROM users WHERE username = "'. $username. '" AND password = "'. $password .'" ');
		
		return ($Query->num_rows > 0) ? true : false;
	}

	private function UserIsbanned($username)
	{
		global $Database;
		$Query = $Database->Query('SELECT * FROM bans WHERE bantype = "user" AND value = "'. $username .'" AND expire > "'.time().'" OR bantype = "ip" AND value = "'.$_SERVER['REMOTE_ADDR'].'" AND expire > "'.time().'" ');

		return ($Query->num_rows > 0) ? true : false;
	}
}