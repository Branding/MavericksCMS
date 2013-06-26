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

class Database{
    
    public $DatabaseReady = false;
    private $Configuration = array();
    private $Handler = null;
    private $querybind = "";
    private $querytext;

    function __construct($host, $port, $username, $password, $database)
    {
        $this->Configuration['HOST']    =   $host;
        $this->Configuration['PORT']    =   (int) $port;
        $this->Configuration['USER']    =   $username;
        $this->Configuration['PASS']    =   $password;
        $this->Configuration['DBASE']   =   $database;
    }

    private function Initconnect()
    {
        if($this->Handler == null)
        {
            $this->Handler = new mysqli($this->Configuration['HOST'], $this->Configuration['USER'], $this->Configuration['PASS'], $this->Configuration['DBASE'], $this->Configuration['PORT']);

            if($this->Handler->connect_errno)
            {
                Mavericks::Exception('fatal', 'Ocurrio un error al intentar conectar con el servidor MySQL -> MySQL error: '.$this->Handler->connect_error);
            }

            $this->DatabaseReady = true;
        }
    }

    public function Query($Query, $parms = array())
    {
        if($this->DatabaseReady == false)
            $this->Initconnect();

        if(sizeof($parms) > 0)
        {
            $Prepare = $this->Handler->prepare($Query);

            foreach($parms as $value)
            {
                $this->querybind .= $this->Get_type($value);
            }

            $bindResult = '$Prepare->bind_param($this->querybind,';

            foreach($parms as $key => $value)
            {
                $bindResult .= '$parms["'.$key.'"],';
            }
            
            $bindResult = rtrim($bindResult, ',') . ');';
            eval($bindResult);

            $Prepare->execute();
            $this->querytext = $Query;

            return $Prepare;
        }

        else
        {
            $this->querytext = $Query;
            $Query = $this->Handler->query($Query);
            if(!$Query)
                Mavericks::Exception('fatal', 'Ocurrio un error a realizar una query, la query es: '.$this->querytext);
            else
                return $Query;
        }
    }

    public function InsertInto($table, $p = array())
    {
        $this->Initconnect();
         
        $query = "INSERT INTO " . $table;
        $part1 = '';
        $part2 = '';

        foreach($p as $id => $value)
        {
            $part1 .= "`" . $id . "`, ";
            $part2 .= "'" . $this->EscapeString($value) . "', ";
        }

        $part1 = substr($part1, 0, strlen($part1) - 2);
        $part2 = substr($part2, 0, strlen($part2) - 2);
        
        $query .= " (" . $part1 . ") VALUES (" . $part2 . ");";
        
        return $this->Query($query);
    }

    public function EscapeString($text)
    {
        $this->Initconnect();
        return $this->Handler->escape_string($text);
    }

    public function Get_type($param)
    {
        if( is_double( $param ) )
            return 'd';
                
        if( is_numeric( $param ) )
            return 'i';
            
        if( is_string( $param ) )
            return 's';
    }

}