<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang="es_ES">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1" />

    <title>Internal server error / <?php echo $SITENAME;?></title>   
    <link rel="stylesheet" href="http://mejorando.la/static/error/css/handler.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/error.css">
  </head>

  <body>
    <div id="wrapper">
            <div class="error_page">
            	<img src="http://mejorando.la/static/error/img/404.png" alt="Error 404 | Lo que buscas no esta aquí" />
            	<h1>Error <strong>500</strong></h1>
            	<h2><?php echo $Exceptioname;?></h2>
            </div>
    </div>
  </body>
</html>