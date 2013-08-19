<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Ultimas noticias en <?php echo $SITENAME;?> </title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/me.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/buttoms.css">
	<script type="text/javascript">
		var Hotelname = '<?php echo $SITENAME;?>';
		var Sitepath = '<?php echo $PATH;?>';
	</script>
</head>
<body>
	<header>
		<div id="logo">hcrazy</div>
		<div id="onlines">100 Usuarios onlines</div>
		
		<div id="enter">
			<a href="<?php echo $PATH;?>/client" class="button buttons-color">¡Entrar al hotel ahora!</a>
		</div>
	</header>
	
	<div id="wrapper">
		<div id="navigation">
			<a href="http://pixeledhotel.us/me">Home</a> <a href="http://pixeledhotel.us/terminos">Terminos</a> <a href="http://pixeledhotel.us/articles">Noticias</a> <a href="http://pixeledhotel.us/getvip">Compra VIP</a> <a href="http://pixeledhotel.us/reglas">Reglamento</a> <a href="http://pixeledhotel.us/staff">Equipo</a> <a href="http://pixeledhotel.us/guides">Guias</a> <a href="http://pixeledhotel.us/refers">Referidos</a> <a href="http://pixeledhotel.us/croups">Croupiers</a>
		</div>
		<div id="search">
			<form action="" method="POST">
				<input type="text" value="" placeholder="Busca a un usuario...">
				<input type="submit" name="submit" style="display:none;">
			</form>
		</div>
		