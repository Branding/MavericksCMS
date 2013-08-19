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

if( $_SERVER["HTTP_USER_AGENT"] != "Mavericks::SYST3M::Input::HCRAZY")
	header('HTTP/1.0 404 Not Found');
?>

<!DOCTYPE>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>HabboCrazy ~ Client  </title>
	

<script type="text/javascript">
	var andSoItBegins = (new Date()).getTime();
</script>

<link rel="stylesheet" href="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/styles/common.css" type="text/css" />
<script src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/js/libs2.js" type="text/javascript"></script>
<script src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/js/visual.js" type="text/javascript"></script>
<script src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/js/libs.js" type="text/javascript"></script>
<script src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/js/common.js" type="text/javascript"></script>

<script type="text/javascript">
	document.habboLoggedIn = true;
	var habboName = "<?=$_POST['username']?>";
	var habboId = <?=$_POST['userID']?>;
	var facebookUser = false;
	var habboReqPath = "";
	var habboStaticFilePath = "http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery";
	var habboImagerUrl = "http://haddoz.org/habbo-imaging/";
	var habboPartner = "mgm2";
	var habboDefaultClientPopupUrl = "http://haddoz.org/client";
	window.name = "da6fb4e13893c4d27f798c39368fc9172b376a69";
	if (typeof HabboClient != "undefined") {
	    HabboClient.windowName = "da6fb4e13893c4d27f798c39368fc9172b376a69";
	    HabboClient.maximizeWindow = true;
	}
</script>

<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<meta property="fb:app_id" content="0" />

<meta property="og:site_name" content="HabboCrazy" />
<meta property="og:title" content="HabboCrazy: " />
<meta property="og:url" content="http://hcrazy.co" />
<meta property="og:locale" content="es_ES" />

<noscript>
    <meta http-equiv="refresh" content="0;url=/client/nojs" />
</noscript>

<meta http-equiv="Pragma" content="no-cache, no-store" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Cache-Control" content="no-cache, no-store" />

<link rel="stylesheet" href="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/styles/habboflashclient.css" type="text/css" />
<script src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/js/habboflashclient.js" type="text/javascript"></script>

<script type="text/javascript">
    FlashExternalInterface.loginLogEnabled = false;
    
    FlashExternalInterface.logLoginStep("web.view.start");
    
    if (top == self) {
        FlashHabboClient.cacheCheck();
    }
    var flashvars = {
            "client.allow.cross.domain" : "0", 
            "client.notify.cross.domain" : "1", 
            "connection.info.host" : "91.121.232.200", 
            "connection.info.port" : "9010", 
            "site.url" : "http://hcrazy.co", 
            "url.prefix" : "http://hcrazy.co", 
            "client.reload.url" : "http://hcrazy.co/client", 
            "client.fatal.error.url" : "http://hcrazy.co/client_error", 
            "client.connection.failed.url" : "http://haddoz.org/client_connection_failed", 
            "external.variables.txt" : "http://media-files.hcrz.org/external_variables.txt", 
            "external.texts.txt" : "http://media-files.hcrz.org/external_flash_texts.txt",     
            "productdata.load.url" : "http://media-files.hcrz.org/productdata.txt", 
            "furnidata.load.url" : "http://media-files.hcrz.org/furnidata.txt",
			"use.sso.ticket" : "1", 
            "sso.ticket" : "<?=$_POST['UserSSOticket']?>",
            "processlog.enabled" : "1", 
            "account_id" : "<?=$_POST['userID']?>", 
            "client.starting" : "Bienvenido <?=$_POST['username']?>, Por favor espera...", 
            "flash.client.url" : "http://media-files.hcrz.org/",
            "user.hash" : "", 
            "has.identity" : "1", 
            "flash.client.origin" : "popup" 
    };
    var params = {
        "base" : "http://media-files.hcrz.org/",  
        "allowScriptAccess" : "always",
        "menu" : "false"                
    };

        if (!(HabbletLoader.needsFlashKbWorkaround())) {
            params["wmode"] = "opaque";
        }

    FlashExternalInterface.signoutUrl = "http://haddoz.org/logout?token=daad578e39e74de47094094ef1e2d478";

    var clientUrl = "http://media-files.hcrz.org/hcrz.swf";
    swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.1.0", "http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/flash/expressInstall.swf", flashvars, params, null, FlashExternalInterface.embedSwfCallback);

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
<meta name="description" content="HabboCrazy es un sitio donde conoceras personas de todas partes del mundo y de todas las edades, crear lugares especiales para reunir a las personas, desde una gran bibliota, hasta un gran partido de Futbol" />
<meta name="keywords" content="hcrazy, furnis, bodas,no se que se me ocurre, memes, cuantocabron, desmotivaciones, facebook,holo, Memes,Amazed,Are you fucking kidding me?, Are you serious?, Aww Yea, Better than expected, Cereal guy, Challenge Accepted, Computer guy, Desk flip, Feel like a ninja, Feel like a sir, Forever alone, Freddie Mercury, Friki, Fry, Fuck Yea, I'm watching you, Infinito desprecio, Inglip/Raisins, It's free, It's something, Jackie Chan, Like a 5 years old, LOL, Me gusta, MentÃ­, Mentira, Mirada fija, Mix, Mother of god, NO, No me digas, Not bad, Nothing to do here, Oh god what have I done?, Oh God why, Okay, Omg run, Otros, Pat Bateman, Poker Face, Puke rainbows, Rage guy (FFFUUU), Retarded, SÃ­ claro, That's suspicious, The Observer, Trolldad, Troll face, Watch out, Why Not?, Y U NO, Yao Ming, yaomingew, mentira, mierda, meme, fuckencio, fuckencia, fapfapfap, schick, schickschickschick,CC, rage comics, comics, cuantocabron, vi&ntilde;etas, fffuuu, rage guy, forever alone, fuck yeah, everything went better than expected, oh god what I've done, trollface, fotos, chistes, humor, videos, carcajadas, risa, divertido, humoristico, gracioso,desmotivaciones, top10, carteles, principal, motivaciones, cola, imagenes, bueno, gracioso, malo, humor, Vota, risa, puntos, divertido, votos, guay, amor" />

<!--[if IE 8]>
<link rel="stylesheet" href="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/styles/ie8.css" type="text/css" />
<![endif]-->
<!--[if lt IE 8]>
<link rel="stylesheet" href="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/styles/ie.css" type="text/css" />
<![endif]-->
<!--[if lt IE 7]>
<link rel="stylesheet" href="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/styles/ie6.css" type="text/css" />
<script src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/static/js/pngfix.js" type="text/javascript"></script>
<script type="text/javascript">
try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {}
</script>

<style type="text/css">
body { behavior: url(http://file-cdn.haddoz.pw/js/csshover.htc); }
</style>
<![endif]-->

</head>

<body id="client" class="flashclient">
<div id="overlay"></div>
<img src="http://file-cdn.haddoz.pw/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/v2/images/page_loader.gif" style="position:absolute; margin: -1500px;" />

<div id="overlay"></div>
<div id="client-ui" >
    <div id="flash-wrapper">
	    <div id="flash-container">
	        
	        <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
				<div class="cbb clearfix">
				    <h2 class="title">Por favor, actualiza tu Flash Player a la última versión</h2>
				    <div class="box-content">
			            <p>Puedes instalar y descargar Adobe Flash Player aquí: <a href="http://get.adobe.com/flashplayer/">Instala Flash player</a>. Más instrucciones para su instalación aquí: <a href="http://www.adobe.com/products/flashplayer/productinfo/instructions/">Más información</a></p>
			            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://haddoz.org/habboweb/63_1dc60c6d6ea6e089c6893ab4e0541ee0/1393/web-gallery/v2/images/client/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
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

</div>
    <script type="text/javascript">
        RightClick.init("flash-wrapper", "flash-container");
        if (window.opener && window.opener != window && window.opener.location.href == "/") {
            window.opener.location.replace("/me");
        }
        $(document.body).addClassName("js");
       	HabboClient.startPingListener();
        Pinger.start(true);
        HabboClient.resizeToFitScreenIfNeeded();
    </script>

<script type="text/javascript">
    HabboView.run();
</script>
</body>
</html>