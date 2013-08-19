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

class Utils
{
    static function WriteInLogs($text)
    {
        $Handler = fopen(DOCUMENT_ROOT. 'Mavericks'. SEPARATOR . 'Exceptions' . SEPARATOR. 'errors.log', "a");
        fwrite($Handler, $text);
        fclose($Handler);

        return $Handler;
    }

    static function LastBackup()
    {

    }

    static function WriteDatabaseBackup($data)
    {
        $Handler = fopen(DOCUMENT_ROOT. 'Mavericks'. SEPARATOR . 'Backups', mode);
    }

    static function TableExist($table)
    {
        global $Database;

        $Query = $Database->Query('SHOW TABLES LIKE "'.$table.'" ');
        return ($Query->num_rows > 0) ? true : false;
    }
    
    static function formatDate($stamp)
    {
        $stamp = time() - $stamp;

        $x = '';

        if ($stamp >= 604800)
        {
            $x = ceil($stamp / 604800) . ' semanas';
        }
        else if ($stamp > 86400)
        {
            $x = ceil($stamp / 86400) . ' d&iacute;as';
        }
        else if ($stamp >= 3600)
        {
            $x = ceil($stamp / 3600) . ' horas';
        }
        else if ($stamp >= 120)
        {
            $x  = ceil($stamp / 60) . ' minutos';
        }
        else
        {
            $x = $stamp . ' segundos';
        }
        
        return $x;
    }

    static function PromoLastShow()
    {
        global $Database;
        $Query = $Database->Query('SELECT * FROM News ORDER BY id DESC')->fetch_assoc();
            echo '
                <div class="topstory" style="background-image: url(http://habpl.us/images/ts/TopStory_movie.png);"> 
                    <h4>Lo ultimo en hcrazy</h4> 
                    <h3><a href="'.$Query["href"].'">'.$Query["title"].'</a></h3> 
                    <p class="summary"> 
                        '.$Query["short_description"].'
                    </p> 
                    <p> 
                        <a href="http://habpl.us/articles/670-room-of-the-week-83--camping-site">Leer mas »</a> 
                    </p>
                </div>';
    }
}