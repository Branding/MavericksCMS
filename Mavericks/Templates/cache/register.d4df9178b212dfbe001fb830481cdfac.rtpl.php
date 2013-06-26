<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Reserva suite gratis en el mayor Hotel virtual. Queda con tus viej@s amig@s, haz nuev@s, juega, chatea, crea tu avatar, tus habitaciones y más aún... </title>
	<meta name="description" content="<?php echo $SITENAME;?> es una red social donde puedes conocer gente nueva, crear salas, compartir ideas y quedar con tus amigos" />
	<meta name="keywords" content="<?php echo $SITENAME;?>, mundo, virtual, red social, gratis, comunidad, personaje, chat, online, adolescente, roleplaying, unirse, social, grupos, forums, seguro, jugar, juegos, amigos, adolescentes, raros, furni raros, coleccionable, crear, coleccionar, conectar, furni, muebles, mascotas, diseño de salas, compartir, expresión, placas, pasar el rato, música, celebridad, visitas de famosos, celebridades, juegos en línea, juegos multijugador, multijugador masivo" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/register.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $CDN;?>/css/buttoms.css">
	<script type="text/javascript">
		var Hotelname = '<?php echo $SITENAME;?>';
		var Sitepath = '<?php echo $PATH;?>';
	</script>
</head>
<body>
	<header>
		<div id="logo" style="background: url('<?php echo $CDN;?>/images/logo.png')">
	</header>

	<div id="wrapper">
		<div id="info">
			<h3 style="margin-left:20px;">Paso por paso</h3>
			<ul>
				<li>
					Que es <?php echo $SITENAME;?>

				</li>
				<li>
					Informacion de tu usuario
				</li>
				<li>
					Ultimos detalles
				</li>
				<li>
					Bienvenid@ a <?php echo $SITENAME;?>

				</li>
			</ul>
		</div>
		<div id="content">
			<?PHP 
				if(is_string($_GET['step']))
					$Page = $_GET['step'];

				switch($_GET['step']) 
				{
					case 'basic':
						echo '
							 <h3>¡Registrate en '.$SITENAME.'!</h3>
							 <p>Rellena el siguiente formulario y podras acceder inmediatamente a '.$SITENAME.', no te tomaras ni 2 minutos :)</p>
							 <input type="text" id="username" placeholder="Nombre de usuario" style="width:190px">
							 <input type="password" id="password" placeholder="Contraseña" style="width:190px">
							 <input type="password" id="password2" placeholder="Repite la contraseña" style="width:190px">
							 <input type="email" id="email" placeholder="Direccion email" style="width:190px">
							 <h3>Preguntas de seguridad</h3>
							 
							 <label>Preguntas de seguridad numero 1</label></br></br>
							<select id="Question1">
							<option value="1">¿Cual era tu mejor amigo de la infancia?</option>
							<option value="2">¿Cual es el nombre completo de tu madre?</option>
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
							<option value="3">¿Cual es el nombre de tu mascota?</option>
							<option value="4">¿Cual es el nombre de tu hermano mayor?</option>
							<option value="5">¿Cual era tu comida favorita en la infancia?</option>
							<option value="6">¿Cual es tu equipo de futbool favorito?</option>
							<option value="7">¿Cual es tu cantante favorito?</option>
							</select>

							</br>

							<input type="text" id="Answer2" placeholder="Respuesta de la pregunta" value maxlength="48" style="width:190px">

							<h3>Codigo de verificacion!</h3>

							'.recaptcha_get_html(Mavericks::LoadconfigwithKey('RECAPTCH_PUB')).'

							</br>
							</br>
							<div id="result"></div>
							<button>Quiero registrarme!</button>
							</br>
							';
					break;
					
					default:
						echo '
							<h3>¿Que es '.$SITENAME.'?</h3>
							<p>'.$SITENAME.' Regístrate gratis y recibe 600.000 mil créditos entra ya!
							</br>
							Reserva tu lugar aquí en <b>'.$SITENAME.'</b>!
							</br>
							</br>
							<b>1. Regístrate gratis y crea un avatar</b>
							Sólo tienes que introducir tu dirección de correo electrónico en el siguiente paso y crear el primer personaje '.$SITENAME.'. No podría ser más sencillo! :)
							</br>
							</br>

							<b>2. Invita a tus amigos y enviales regalos.</b>
							Entretener a sus amigos mediante la inclusión de la tapa '.$SITENAME.' ya. ¡Cómo es eso gente feliz!
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

	<script type="text/javascript" src="<?php echo $CDN;?>/js/register.js"></script>
	<div id="footer-image" style="background:url('<?php echo $CDN;?>/images/index/bg_hotel.out.png') 475px 0 no-repeat;"></div>
</body>