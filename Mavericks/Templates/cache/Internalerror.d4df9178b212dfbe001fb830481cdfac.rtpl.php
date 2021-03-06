<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang="es_ES">
<head> 
  <title>Internal server error / <?php echo $SITENAME;?></title>
  <meta charset="utf-8" />
  <style type="text/css"> 
    *, html, body { 
      margin:0; padding:0; 
      } :

      :selection { 
        background-color: hotpink; 
        color: white; 
        text-shadow: none; 
      } 

      body { 
        background-color: #232323; 
        font-family: "ProFontWindows", Monaco, Consolas, Courier, monospace;
        font-size: 12px; 
        color: #FFFFFF; 
        text-shadow: 0 1px 0 rgba(0, 0, 0, .1); 
      } 

      #wrapper { 
        margin: 20px 130px; 
        margin-right: 15px; 
        margin-bottom: 0; 
      } 

      div.datetime { 
        background-color: #343434; 
        position: absolute; left: 0; 
        padding: 5px 7px 5px 0; 
        width: 95px; 
        text-align: right;
        color: #969696; 
      } 

      div.datetime span { 
        line-height: 14px; 
      } 

      span { 
        display: block; 
        line-height: 18px; 
      } 

      span.uri { 
        color: #5b5b5b; 
      } 

      span.errorcode { 
        color: #c4ae55; 
      } 

      div.errormsg { 
        margin: 20px 15px; 
        display: inline-block;
      } 

      div.errormsg > span.msg { 
        background-color: #c4ae55; 
        color: #5f3a04; 
        border-radius: 1999px; 
        padding: 0 10px; 
        text-shadow: 0 1px 0 rgba(255, 255, 255, .25); 
        box-shadow: 0 1px 2px rgba(0, 0, 0, .2); 
      } 

      div.errormsg > span.linenum { 
        color: #6f6f6f; 
        text-align: right; 
      } 

      div.software_urgent { 
        color: #424242; 
        display: inline-block; 
      } 

      div.software_urgent > span.ipaddr { 
        color: #FFFFFF; 
        text-align: right; 
        margin-top: 10px; 
      }
  </style>
</head>
<body> 
<div id="wrapper"> 
    <div class="datetime"> 
      <span class="date"><?php echo $Exceptiondate;?></span>  
    </div>

  <h1>Ehh! Ocurrio un error interno en mavericks.</h1><br> 
  <span class="uri"><?=$_SERVER['SCRIPT_FILENAME']?></span> 
  <span class="uri"><?php echo $Exceptionfile;?></span> 
  <span class="errorcode">Error code: Internal</span> 

  <div id="roundup"> 
    <div class="errormsg"> 
      <span class="msg"><?php echo $Exceptioname;?></span> 

      <span class="linenum"><?php echo $Exceptionline;?></span> 
    </div> 
  </div> 

  <div id="roundup"> 
    <div class="software_urgent"> 
      <span class="urgent"><?=$_SERVER['HTTP_USER_AGENT']?></span> 
      <span class="software"><?=$_SERVER['SERVER_SOFTWARE']?></span><span class="ipaddr"><?=$_SERVER['REMOTE_ADDR']?></span> 
    </div> 
  </div> 
</div> 
</body>
