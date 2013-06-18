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
class Helpers{
    
    static function WriteInLogs($text)
    {
        $Handler = fopen(DOCUMENT_ROOT. 'Mavericks'. SEPARATOR . 'Logs' . SEPARATOR. 'error.log', "a");
        fwrite($Handler, $text);
        fclose($Handler);

        return $Handler;
    }
}