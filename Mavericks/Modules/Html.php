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

class Buffercompress
{
    private $content;

    function __construct($buffer)
    {  
        $this->content = $buffer;
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
        header("Content-Type:text/html");
        echo $this->Compress($this->content). PHP_EOL;
    }                                                                                                                                       
}