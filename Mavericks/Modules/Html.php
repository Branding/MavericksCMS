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
        Header("Content-Type:text/html");
        echo base64_decode('ICAgPCEtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0t
        LS0tLS0tLQ0KCSiVX5UpICAgQXV0aG9yOiB8TGlvbg0KCTwpICkmIzk1ODM7IENvcHlyaWdodCAo
        QykgMjAxMyAtIDIwMTQNCiAJIC8gXCAgICBNYXZlcmlja3NDTVMNCiAgICAgDQogICAgICogVGhp
        cyBwcm9ncmFtIGlzIHB1YmxpYzogeW91IGNhbiByZWRpc3RyaWJ1dGUgaXQgYW5kL29yIG1vZGlm
        eQ0KICAgICAqIGl0IHVuZGVyIHRoZSB0ZXJtcyBvZiB0aGUgR05VIEdlbmVyYWwgUHVibGljIExp
        Y2Vuc2UgYXMgcHVibGlzaGVkIGJ5DQogICAgICogdGhlIEZyZWUgU29mdHdhcmUgRm91bmRhdGlv
        biwgZWl0aGVyIHZlcnNpb24gMyBvZiB0aGUgTGljZW5zZSwgb3INCiAgICAgKiAoYXQgeW91ciBv
        cHRpb24pIGFueSBsYXRlciB2ZXJzaW9uLg0KDQogICAgICogVGhpcyBwcm9ncmFtIGlzIGRpc3Ry
        aWJ1dGVkIGluIHRoZSBob3BlIHRoYXQgaXQgd2lsbCBiZSB1c2VmdWwsDQogICAgICogYnV0IHdp
        dGhvdXQgYW55IHdhcnJhbnR5IHdpdGhvdXQgZXZlbiB0aGUgaW1wbGllZCB3YXJyYW50eSBvZg0K
        ICAgICAqIG1lcmNoYW50YWJpbGl0eSBvciBmaXRuZXNzIGZvciBhIHBhcnRpY3VsYXIgcHVycG9z
        ZS4gU2VlIHRoZQ0KICAgICAqIEdOVSBHZW5lcmFsIFB1YmxpYyBMaWNlbnNlIGZvciBtb3JlIGRl
        dGFpbHMuDQogICAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0t
        LS0tLS0tLS0tLS0tLS0tLS0tLS0tIC0tPg==').PHP_EOL;
        echo $this->Buffer_compress()."<!-- MavericksCMS edition: ".Mavericks::Mavericks_version." loaded in ".intval(substr((microtime() - START) / 100, 2, 5)." milliseconds -->");
    }                                                                                                                                       
}