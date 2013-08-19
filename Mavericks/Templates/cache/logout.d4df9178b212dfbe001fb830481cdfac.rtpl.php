<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> » Te esperamos lo mas pronto posible!</title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/logout.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/buttoms.css">
	<script type="text/javascript">
		var Hotelname = '<?php echo $SITENAME;?>';
		var Sitepath = '<?php echo $PATH;?>';
	</script>
</head>
<body>

<header>
	<div id="logo">hcrazy</div>
	<div id="logo_desc">Diversion por cada pixel</div>
</header>

	<div id="box">
		<div class="space">
			<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:728px;height:90px"
			     data-ad-client="ca-pub-3349164495616121"
			     data-ad-slot="1667608550"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script><br><br>

			<h3>¿Te vas tan pronto <?=$_SESSION['username']?> ?</h3>
			<p>Recuerda que cuando quieras estaremos aqui para brindarte la mayor diversion posible sin alguna interrupcion y todos tus amigos estaran para cuando vuelvas :)</p>
			<a href="<?php echo $SITEPATH;?>" class="button buttons-color">!Salir ahora!</a>
			</br><br>
			<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:728px;height:90px"
			     data-ad-client="ca-pub-3349164495616121"
			     data-ad-slot="1667608550"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>	
		</div>
	</div>
<footer>
	<div id="copyright"><?php echo $SITENAME;?> Todos los derechos reservados &copy; 2013 - 2014</div>	
</footer>

</body>