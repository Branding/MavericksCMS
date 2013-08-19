<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Reserva suite gratis en el mayor Hotel virtual. Queda con tus viej@s amig@s, haz nuev@s, juega, chatea, crea tu avatar, tus habitaciones y más aún... </title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/index.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/buttoms.css">
	<script type="text/javascript">
		var Hotelname 	= '<?php echo $SITENAME;?>';
		var SITEPATH 	= '<?php echo $PATH;?>';
		var ACTIONS_URL = '<?php echo $ACTIONS_URL;?>';
	</script>
</head>
<body>
	<header>
		<div id="logo">Hcrazy</div>
		<div id="logo_desc">Diversion por cada pixel</div>
		
		<div id="forms">
			<input type="text" id="username" placeholder="Nombre de usuario" style="margin-top: -60px;margin-left: 245px;">
			<input type="password" id="password" placeholder="Contraseña" style="margin-top: -60px;">
			<button style="margin-top: -60px; cursor:pointer" onclick="Trynity.Login();">Acceder ahora</button>
			<button style="margin-top: -60px; cursor:pointer;">
				<a href="<?php echo $PATH;?>/forgot">Olvide mi contraseña</a>
			</button>
		</div>
		<div id="onlines">100 Usuarios onlines</div>
		
		<div id="register">
			<a href="<?php echo $PATH;?>/register" class="button buttons-color">¡Registrarme ahora!</a>
		</div>
	</header>

	<div id="wrapper">
		<div id="result">
				
		</div>
		<div id="box1">
			<h2 style="font-size:24px;">¿Que es <?php echo $SITENAME;?>?</h2>
			<p>Es una red social virtual donde puedes conocer a otras personas y crear lugares donde quedar.
			<b>Crea y Conoce</b>
			Crea salas donde quedar con tus amigos, desde un bar, hasta una discoteca, u otras cosas que se te ocurran.
			<b>Haz amigos</b>
			Podrás encontrar a muchas personas de habla hispana que podrás hacerte amigos de ellos.</p>
		</div>
		
		<div id="box2"><img src="https://www.habbo.es/images/safety/page_0.png"></div>
		</div>

	<div id="footer-image" style="background:url('<?php echo $CDN;?>/images/index/bg_hotel.out.png') 475px 0 no-repeat;"></div>
	<footer>
		<div id="copyright"><?php echo $SITENAME;?> 2013 - 2014 &copy; &nbsp; Todos los derechos reservados</div>
	</footer>
	<script type="text/javascript" src="<?php echo $CDN;?>/js/vendor/encode.js"></script>
	<script type="text/javascript" src="<?php echo $CDN;?>/js/main.js"></script>
</body>