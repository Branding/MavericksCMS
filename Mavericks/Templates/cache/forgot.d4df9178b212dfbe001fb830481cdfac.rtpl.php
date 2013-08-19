<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Recuperá tu contraseña mediante preguntas de seguridad </title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/forgot.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/buttoms.css">
	<script type="text/javascript">
		var Hotelname = '<?php echo $SITENAME;?>';
		var SITEPATH = '<?php echo $PATH;?>';
	</script>
</head>
<body>
	<header style="background:url(http://localhost/static/images/top_bg.png)">
		<div id="logo">hcrazy</div>
		<div id="logo_desc">Diversion por cada pixel</div>
	</header>
	<div id="wrapper">
		<div id="box">
			<div class="space">
				<div id="space_content">
					<div id="result"></div>
					<h3>Recupera la contraseña de tu usuario</h3>
					<p>Es fácil y sencillo, solo tienes que contestar correctamente las preguntas qué seleccionaste él día en qué te registraste en <?php echo $SITENAME;?>. A continuación responde el siguiente formulario.</p>
					<input type="text" id="username" placeholder="Nombre de usuario" style="width:530px"><br>
					<h4 style="margin:0">Preguntas de seguridad numero 1</h4></br>
					<select id="Question1" style="width:530px"> 
					<option value="1">¿Cúal era tu mejor amigo de la infancia?</option>
					<option value="2">¿Cúal es el nombre completo de tu madre?</option>
					<option value="3">¿Cúal es el nombre de tu mascota?</option>
					<option value="4">¿Cúal es el nombre de tu hermano mayor?</option>
					<option value="5">¿Cúal era tu comida favorita en la infancia?</option>
					<option value="6">¿Cúal es tu equipo de futbool favorito?</option>
					<option value="7">¿Cúal es tu cantante favorito?</option>
					</select>

					<br>

					<input type="text" id="Answer1" placeholder="Respuesta de la pregunta" value maxlength="48" style="width:530px"></br>

					<h4 style="margin:0">Preguntas de seguridad numero 2</h4></br>
					<select id="Question2" style="width:530px">
					<option value="1">¿Cúal era tu mejor amigo de la infancia?</option>
					<option value="2">¿Cúal es el nombre completo de tu madre?</option>
					<option value="3" selected>¿Cúal es el nombre de tu mascota?</option>
					<option value="4">¿Cúal es el nombre de tu hermano mayor?</option>
					<option value="5">¿Cúal era tu comida favorita en la infancia?</option>
					<option value="6">¿Cúal es tu equipo de futbool favorito?</option>
					<option value="7">¿Cúal es tu cantante favorito?</option>
					</select>

					</br>

					<input type="text" id="Answer2" placeholder="Respuesta de la pregunta" value maxlength="48" style="width:530px">

					</br></br>

					<a class="button buttons-color" onclick="Trynity.Forgot_password()">¡Recuperar la contraseña ahora!</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $CDN;?>/js/main.js"></script>
</body>