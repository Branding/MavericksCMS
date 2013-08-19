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
		var Sitepath = '<?php echo $PATH;?>';
	</script>
</head>
<body>
	<header>
		<div id="logo">hcrazy</div>
		<div id="logo_desc">Diversion por cada pixel</div>
	</header>
	<div id="wrapper">
		<div id="box">
			<div class="space" style="background:none">
				<div id="space_content">
					<div id="result"></div>
                                        <br>
					<h3>Elige tu nueva contraseña</h3></br>
					<input type="password" id="password" placeholder="Introduce tu contraseña" style="width:530px"><br>
					<input type="password" id="password_repit" placeholder="Repite tu contraseña ( solo por seguridad.. )" value maxlength="48" style="width:530px"></br>

					<a class="button buttons-color" onclick="window.PasswordChange()">¡Cambiar la contraseña!</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $CDN;?>/js/vendor/encode.js"></script>
	<script type="text/javascript">
		window.PasswordChange = function()
		{
			$.ajax({
				url: Sitepath + '/actions/forgot',
				type: "POST",
				data: {password: Data.encode($('#password').val()), password_repit: Data.encode($('#password_repit').val())},
				success: function(resp)
				{
					window.scrollTo(0,0);
					$('#result').css('display', 'block');

					if(resp.status == "NOK")
					{
						$('#result').html(resp.error)
					}

					else
					{
						$('#result').css('background', 'rgb(82, 211, 41)');
						$('#result').html('Tu contraseña fue cambiada con exito, por favor espera..');
						
						setTimeout(function(){
							location.href = Sitepath;
						}, 3200);
					}
				}
			});
		}
	</script>
</body>