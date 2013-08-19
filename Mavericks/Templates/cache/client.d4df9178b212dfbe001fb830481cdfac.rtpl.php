<?php if(!class_exists('raintpl')){exit;}?><? global $users ?>

<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo $SITENAME;?> > Client </title>

<script type="text/javascript">
    var andSoItBegins = ( new Date()).getTime();
</script>

<link rel="stylesheet" href="<?php echo $CDN;?>/css/common.css" type="text/css"/>
<script src="<?php echo $CDN;?>/js/libs2.js" type="text/javascript"></script>
<script src="<?php echo $CDN;?>/js/visual.js" type="text/javascript"></script>
<script src="<?php echo $CDN;?>/js/libs.js" type="text/javascript"></script>
<script src="<?php echo $CDN;?>/js/common.js" type="text/javascript"></script>

<script type="text/javascript">
document.habboLoggedIn = true;
var habboName = "<?=$users->Info('username')?>";
var habboId = <?=$users->Info('id')?>;
var facebookUser = false;
var habboReqPath = "";
var habboStaticFilePath = "http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery";
var habboImagerUrl = "http://www.habbo.es/habbo-imaging/";
var habboPartner = "";
var habboDefaultClientPopupUrl = "<?php echo $PATH;?>/client";
window.name = "<?php echo $WINDOW_CLIENT;?>";
if (typeof HabboClient != "undefined") {
    HabboClient.windowName = "<?php echo $WINDOW_CLIENT;?>";
    HabboClient.maximizeWindow = true;
}


</script>
<noscript>
    <meta http-equiv="refresh" content="0;url=/client/nojs"/>
</noscript
>
<meta http-equiv="Pragma" content="no-cache, no-store"/>
<meta http-equiv="Expires" content="-1"/>
<meta http-equiv="Cache-Control" content="no-cache, no-store"/>

<link rel="stylesheet" href="<?php echo $CDN;?>/css/habboflashclient.css" type="text/css"/>
<script src="<?php echo $CDN;?>/js/habboflashclient.js" type="text/javascript"></script>

<script type="text/javascript">
    FlashExternalInterface.loginLogEnabled = true;
    
    FlashExternalInterface.logLoginStep("web.view.start");
    
    if (top == self) {
        FlashHabboClient.cacheCheck();
    }

    var flashvars = {
            "client.allow.cross.domain" : "1",
            "client.notify.cross.domain" : "0",
            "connection.info.host" : "<?php echo $HOST_IP;?>",
            "connection.info.port" : "<?php echo $HOST_PORT;?>",
            "site.url" : "<?php echo $PATH;?>",
            "url.prefix" : "<?php echo $PATH;?>",
            "client.reload.url" : "<?php echo $PATH;?>/client",
            "client.fatal.error.url" : "<?php echo $PATH;?>/client_error",
            "client.connection.failed.url" : "<?php echo $PATH;?>/client_error",
            "external.hash" : "",
            "external.variables.txt" : "<?php echo $GAME_EXTERNAL_VARS;?>", 
            "external.texts.txt" : "<?php echo $GAME_EXTERNAL_TEXT;?>",     
            "productdata.load.url" : "<?php echo $GAME_PRODUCTDATA;?>", 
            "furnidata.load.url" : "<?php echo $GAME_FURNITURE;?>", 
            "use.sso.ticket" : "1",
            "sso.ticket" : "<?=$users->Info('auth_ticket')?>",
            "processlog.enabled" : "0",
            "account_id" : "0",
            "client.starting" : "<?php echo $STARTING_MESSAGE;?>",
            "flash.client.url" : "<?php echo $GAME_DIRECTORY;?>",
            "user.hash" : "",
            "facebook.user" : "0",
            "has.identity" : "0",
            "flash.client.origin" : "popup"
    };

    var params = {
       "base" : "<?php echo $GAME_DIRECTORY;?>",
       "allowScriptAccess" : "always",
       "menu" : "false",
    };
   
    if (!(HabbletLoader.needsFlashKbWorkaround())) {
       params["wmode"] = "opaque";
    }
   
    FlashExternalInterface.signoutUrl = "<?php echo $PATH;?>/logout";


    var clientUrl = "<?php echo $GAME_HABBO_SWF;?>";
    swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.1.0", "http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/flash/expressInstall.swf", flashvars, params, null, FlashExternalInterface.embedSwfCallback);

    window.onbeforeunload = unloading;
    function unloading() {
        var clientObject;
        if (navigator.appName.indexOf("Microsoft") != -1) {
            clientObject = window["flash-container"];
        } else {
            clientObject = document["flash-container"];
        }
        try {
            clientObject.unloading();
        } catch (e) {}
    }
    window.onresize = function() {
        HabboClient.storeWindowSize();
    }.debounce(0.5);
</script>
<!--[if IE 8]>
<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/static/styles/ie8.css" type="text/css" />
<![endif]-->
<!--[if lt IE 8]>
<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/static/styles/ie.css" type="text/css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" href="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/static/styles/ie6.css" type="text/css" />
<script src="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/static/js/pngfix.js" type="text/javascript"></script>
<script type="text/javascript">
try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}
</script>

<style type="text/css">
body { behavior: url(/js/csshover.htc); }
</style>
<![endif]-->
</head>
<body id="client" class="flashclient" style="overflow:hidden;">
<div id="overlay"></div>
<img src="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/v2/images/page_loader.gif" style="position:absolute; margin: -1500px;"/>
<div id="overlay"></div>
<div id="client-ui">
<div id="flash-wrapper">
<div id="flash-container">
<div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
<div class="cbb clearfix">
<h2 class="title">Por favor, actualiza tu Flash Player a la última versión</h2>
<div class="box-content">
<p>Puedes instalar y descargar Adobe Flash Player aquí: <a href="http://get.adobe.com/flashplayer/">Instala Flash player</a>. Más instrucciones para su instalación aquí: <a href="http://www.adobe.com/products/flashplayer/productinfo/instructions/">Más información</a></p>
<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://images.habbo.com/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1882/web-gallery/v2/images/client/get_flash_player.gif" alt="Get Adobe Flash player"/></a></p>
</div>
</div>
</div>
<script type="text/javascript">
            $('content').show();
        </script>
<noscript>
<div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
<p>If you are not automatically redirected, please <a href="/client/nojs">click here</a></p>
</div>
</noscript>
</div>
</div>
<div id="content" class="client-content"></div>
<iframe id="game-content" class="hidden" src="about:blank"></iframe>
</div>

</body>
</html>