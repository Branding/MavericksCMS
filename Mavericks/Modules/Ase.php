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

class Ase
{
    private $status;

    public function LogIN($username, $password)
    {
        global $Database;
        global $users;

        $EncryPassword = Mavericks::Hash($password, $username);

        if( !isset($_SESSION['LoginIntent']) && !$this->IpIsbanned() )
            $_SESSION['LoginIntent']    =   5;
       
        if($this->IpIsbanned() OR $_SESSION['LoginIntent'] == 1)
        {
            $this->Blockaccess($_SERVER['REMOTE_ADDR']);
            $this->status['status'] =   "NOK";
            $this->status['error']  =   "Tu IP se encuentra baneada, no puedes acceder aqui ";
        }

        elseif(empty($username) || empty($password))
        {
            $_SESSION['LoginIntent']--;

            $this->status['status']     =   "NOK";
            $this->status['error']      =   "Introduce un nombre de usua rio y una contraseña con permisos para acceder, te quedan ". $_SESSION['LoginIntent']. " intentos";
        }

        elseif(!$users->UserValidate($username, $EncryPassword))
        {   
            $_SESSION['LoginIntent']--;

            $this->status['status']     =   "NOK";
            $this->status['error']      =   "El nombre de usuario y la contraseña es incorrecta, te quedan ". $_SESSION['LoginIntent'];
        }

        elseif( !$users->Info('rank', $username, false) )
        {
            $this->status['status']     =   "NOK";
            $this->status['error']      =   "Lo siento pero haz intentado acceder al panel de control sin permisos de un administrador, fuiste baneado";
            $this->Blockaccess($_SERVER['REMOTE_ADDR']);
        }

        else
        {

            $_SESSION['HkLogIN']        =   true;
            $_SESSION['Hk_login_rank']  =   $users->Info('rank', $username, false);
            $_SESSION['Hk_login_user']  =   $username;

            $this->status['status']     =   "OK";
            $this->status['Userlogged'] =   $username;
        }

        echo json_encode($this->status);
    }

    private function Blockaccess($ip)
    {
        global $Database;

        $bans        =   array();
        $ase_banned  =   array();

        $bans['bantype']     =   'ip';
        $bans['value']       =   $ip;
        $bans['reason']      =   'Acceder al panel de control sin permisos de un administrador';
        $bans['expire']      =   '1929392929';
        $bans['added_by']    =   'Housekeeping system';
        $bans['added_date']  =   date('l jS \of F Y h:i:s A');

        $ase_banned['ip']    =   $ip;
        $ase_banned['razon'] =   'Acceder al panel de control sin permisos de un administrador';

        $Database->InsertInto('bans', $bans); 
        $Database->InsertInto('ase_banned', $ase_banned);
    }

    public function ShowPage($page)
    {
        if($_SESSION['Hk_login_rank'] > $this->Loadpermission('MIN_RANK') )
        {
            new Bufffercompress( Mavericks::$Template->draw('housekeeping_' . $page) );
        }
        else 
        {
            echo "No tienes los permisos suficientes para acceder a está pagina";
        }
    }

    public function Loadpermission($key)
    {
        Require '../Permissions.inc';
        return $Permissions['HOUSEKEEPING'][$key];
    }

    private function IpIsbanned()
    {
        global $Database;
        $ViewIp = $Database->Query('SELECT * FROM ase_banned WHERE ip = "'. $_SERVER['REMOTE_ADDR'] .'" ')->num_rows;
        
        return ($ViewIp > 0) ? true : false;
    }

    public function LoginExist()
    {
        return ( isset($_SESSION['HkLogIN']) || isset($_SESSION['Hk_login_user']) ) ? true : false;
    }
}