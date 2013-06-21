<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Reserva suite gratis en el mayor Hotel virtual. Queda con tus viej@s amig@s, haz nuev@s, juega, chatea, crea tu avatar, tus habitaciones y más aún... </title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/index.css">
	<script type="text/javascript">
		var Hotelname = '<?php echo $SITENAME;?>';
		var Sitepath = '<?php echo $PATH;?>';
	</script>
</head>
<body>
	<header>
		<div id="logo" style="background:url('<?php echo $CDN;?>/images/logo.png')"></div>
		<div id="forms">
			<input type="text" id="username" placeholder="Nombre de usuario" style="margin-top: -40px;margin-left: 245px;">
			<input type="password" id="password" placeholder="Contraseña" style="margin-top: -40px;">
			<button style="margin-top: -40px; cursor:pointer" onclick="window.Initlogin();">Acceder ahora</button>
			<button style="margin-top: -40px; cursor:pointer;">Olvide mi contraseña</button>
		</div>
		<div id="onlines">100 Usuarios onlines</div>
		
		<div id="register">
			<a class="button buttons-color">¡Registrarme ahora!</a>
		</div>
	</header>

	<div id="wrapper">
		<div id="result">
				
		</div>
		<div id="box1">
			<h2 style="font-size:24px;">¿Que es <?php echo $SITENAME;?>?</h2>
			<p>Es una red social virtual donde puedes conocer a otras personas y crear lugares donde quedar.
			Crea y Conoce
			Crea salas donde quedar con tus amigos, desde un bar, hasta una discoteca, u otras cosas que se te ocurran.
			Haz amigos
			Podrás encontrar a muchas personas de habla hispana que podrás hacerte amigos de ellos.</p>
		</div>
		
		<div id="box2"><img src="https://www.habbo.es/images/safety/page_0.png"></div>
		</div>

	<div id="footer-image" style="background:url('<?php echo $CDN;?>/images/index/bg_hotel.out.png') 475px 0 no-repeat;"></div>
	<footer>
		<div id="copyright"><?php echo $SITENAME;?> 2013 - 2014 &copy; Todos los derechos reservados</div>
	</footer>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $CDN;?>/js/login.js"></script>
</body>