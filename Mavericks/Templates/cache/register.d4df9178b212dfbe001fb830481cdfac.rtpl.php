<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Registrate ahora y forma parte de esta gran comunidad, es gratis! </title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />

	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/register.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/buttoms.css">
	<script type="text/javascript" src="<?php echo $CDN;?>/js/captcha.js"></script>
	<script type="text/javascript" src="https://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>

	<script type="text/javascript">
		var Hotelname   = '<?php echo $SITENAME;?>';
		var SITEPATH    = '<?php echo $PATH;?>';
		var ACTIONS_URL = '<?php echo $ACTIONS_URL;?>'; 
	</script>
</head>
<body>
	<header style="background:url(<?php echo $CDN;?>/images/top_bg.png)">
		<div id="logo">hcrazy</div>
		<div id="logo_desc">Diversion por cada pixel</div>
	</header>
<div id="box1">
	<div class="space">
		<h3>¿Que es <?php echo $SITENAME;?></h3>
		<p>Es una red social virtual donde puedes conocer a otras personas y crear lugares donde quedar.</br> 
		<h4>Crea y Conoce</h4> 
		<p>Crea salas donde quedar con tus amigos, desde un bar, hasta una discoteca, u otras cosas que se te ocurran.</p> 
		<h4>Haz amigos</h4> 
		<p>Podrás encontrar a muchas personas de habla hispana que podrás hacerte amigos de ellos.</p>
	</div>
</div>

<div id="box2">
	<div class="space notimage">
		<div id="result"></div></br>
			<?PHP 

				switch(@$_GET['step']) 
				{
					case 'basic':
						echo '
							<script type="text/javascript">
								var Page = 2;
							</script>
							 <h3>¡Registrate en '.$SITENAME.'!</h3>
							 <p>Rellena el siguiente formulario y podras acceder inmediatamente a '.$SITENAME.', no te tomaras ni 2 minutos :)</p>
							 <input type="text" id="username" placeholder="Nombre de usuario" style="width:530px">
							 <input type="password" id="password" placeholder="Contraseña" style="width:530px">
							 <input type="password" id="password2" placeholder="Repite la contraseña" style="width:530px">
							 <input type="email" id="email" placeholder="Direccion email" style="width:530px">
							 <h3>Preguntas de seguridad</h3>
							 
							 <label>Preguntas de seguridad numero 1</label></br></br>
							<select id="Question1">
							<option value="1">¿Cual era tu mejor amigo de la infancia?</option>
							<option value="2">¿Cuial es el nombre completo de tu madre?</option>
							<option value="3">¿Cual es el nombre de tu mascota?</option>
							<option value="4">¿Cual es el nombre de tu hermano mayor?</option>
							<option value="5">¿Cual era tu comida favorita en la infancia?</option>
							<option value="6">¿Cual es tu equipo de futbool favorito?</option>
							<option value="7">¿Cual es tu cantante favorito?</option>
							</select>

							<br>

							<input type="text" id="Answer1" placeholder="Respuesta de la pregunta" value maxlength="48" style="width:190px"></br>

							<label>Preguntas de seguridad numero 2</label></br></br>
							<select id="Question2">
							<option value="1">¿Cual era tu mejor amigo de la infancia?</option>
							<option value="2">¿Cual es el nombre completo de tu madre?</option>
							<option value="3" selected>¿Cual es el nombre de tu mascota?</option>
							<option value="4">¿Cual es el nombre de tu hermano mayor?</option>
							<option value="5">¿Cual era tu comida favorita en la infancia?</option>
							<option value="6">¿Cual es tu equipo de futbool favorito?</option>
							<option value="7">¿Cual es tu cantante favorito?</option>
							</select>

							</br>

							<input type="text" id="Answer2" placeholder="Respuesta de la pregunta" value maxlength="48" style="width:190px">

							<h3>Codigo de verificacion!</h3>
							</br>

							<script type="text/javascript">	
								Utils.showRecaptcha("login-recaptcha", "'.Mavericks::LoadconfigwithKey('RECAPTCH_PUB').'");	
							</script>

							<div id="login-recaptcha">						
								<div id="login-recaptcha-left">							
									<div id="recaptcha_image"></div></br>							
									<div id="login-recaptcha-left-reload"><a id="recaptcha_reload" href="#" style="color: white;" onclick="window.ReloadCaptcha()">Intenta con palabras diferentes</a>
									</div>					
									<div id="login-recaptcha-left-typewords"></div>	
									<div id="login-recaptcha-left-input">
										<input type="text" tabindex="2" style="width:300px;height:30px;font-family: Trebuchet MS;font-size: 14px;" name="recaptcha_response_field" id="recaptcha_response_field">
									</div>
								</div>
							</div>

							</br>
							<a class="button buttons-color" onclick="window.StartRegister()">¡Quiero registrarme!</a>
							</br>
							';
					break;
					
					default:
						echo '
							<script type="text/javascript">
								var Page = 1;
							</script>
							<h3>¿Que puedes obtener si te registras en '. $SITENAME .'?</h3>
							<p>'. $SITENAME .' Regístrate gratis y recibe 600.000 mil créditos entra ya!
							</br>
							Reserva tu lugar aquí en <b>'. $SITENAME .'</b>!
							</br>
							</br>
							<b>1. Regístrate gratis y crea un avatar</b>
							Sólo tienes que introducir tu dirección de correo electrónico en el siguiente paso y crear el primer personaje '. $SITENAME .'. No podría ser más sencillo! :)
							</br>
							</br>

							<b>2. Invita a tus amigos y enviales regalos.</b>
							Entretener a sus amigos mediante la inclusión de la tapa '. $SITENAME .' ya. ¡Cómo es eso gente feliz!
							</br>
							</br>

							<b>3. Espere a que comience la diversión!</b>
							Paciencia pequeño saltamontes. Te llevo hasta el lugar de acción. Mientras tanto, los regalos adicionales	aquí, entretenimiento y vuelva a por más.</p>
							</br>
							<a class="button buttons-color" href="?step=basic">Continuar con el registro</a>
							</br>
							</br>';
						break;
				}
			?>

	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $CDN;?>/js/register.js"></script>
</body>