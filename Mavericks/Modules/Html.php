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
class Html
{
    private $content;

    function __construct($buffer)
    {  
        Define('START', microtime());
        $this->content = $buffer;
    }

    private function Buffer_compress()
    {
        return $this->Compress($this->content);
    }

    private function Compress($buffer)
    {
        $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
        $buffer = preg_replace( '/\s\s+/', ' ', $buffer);
        $buffer = preg_replace('/\<!--(.*?)\-->/is', '', $buffer);
        $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
        $buffer = str_replace('{ ', '{', $buffer);
        $buffer = str_replace(' }', '}', $buffer);
        $buffer = str_replace('; ', ';', $buffer);
        $buffer = str_replace(' {', '{', $buffer);
        $buffer = str_replace('} ', '}', $buffer);
        $buffer = str_replace(' ,', ',', $buffer);
        $buffer = str_replace(' ;', ';', $buffer);  
        
        return $buffer;
    } 

    function __destruct()
    {   
        echo $this->Buffer_compress()."<!-- MavericksCMS edition: ".Mavericks::Mavericks_version." loaded in ".intval(substr( (microtime() - START) / 100, 2, 5 )." milliseconds -->");
    }
}