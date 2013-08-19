<?php if(!class_exists('raintpl')){exit;}?><?PHP 
	  global $users; 
	  global $Database;
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title><?php echo $SITENAME;?> »  Home <?=$_SESSION['username']?> </title>
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
		<div id="logo_desc">Diversion por cada pixel</div>
		<div id="onlines">100 Usuarios onlines</div>
		
		<div id="enter">
			<a href="<?php echo $PATH;?>/client" class="button buttons-color">¡Entrar al hotel ahora!</a>
		</div>
	</header>
	
	<div id="wrapper">
		<div id="navigation">
			<a href="<?php echo $SITEPATH;?>/me">Home</a>
			<a href="http://pixeledhotel.us/terminos">Terminos y condiciones</a> 
			<a href="http://pixeledhotel.us/articles">Noticias</a> 
			<a href="http://pixeledhotel.us/getvip">Compra VIP</a> 
			<a href="http://pixeledhotel.us/staff">Miembros del equipo</a>
			<a href="http://pixeledhotel.us/refers">Referidos</a></br>
			<a href="">La crazy tienda</a>
		</div>
		<div id="search">
			<form action="" method="POST">
				<input type="text" value="" placeholder="Busca a un usuario...">
				<input type="submit" name="submit" style="display:none;">
			</form>
		</div>
		<div id="profile">
			<div id="front" style="background-image: url('http://resources-img.pixeledhotel.us/fp/1.png'); ">
				<div id="bg">			
					<div id="image-profile">
						<center>
							<img alt="Mi avatar" src="http://habbo.com.tr/habbo-imaging/avatarimage?figure=sh-305-104.hd-205-2.lg-281-110.ch-3001-104-62.hr-831-6&size=x&direction=2&head_direction=2&crr=5&gesture=sml&frame=2&action=" style="margin-top:-10px;">
						</center>
					</div>
					
					<div id="info-front">
						<b><?=$users->Info('username');?></b><br>
						<span>
						   <?=$users->Info('motto');?>

						</span>
					</div>
					<?PHP if($users->Info('rank') > 5){ ?>

						<a href="/admin/housekeeping/" target="_blank" onclick="window.open(this.href, this.target, 'width=1100,height=600,scrollbars=no,align=center'); return false;" id="enter-hk" style="margin-top:205px;margin-left:720px;box-shadow:0px 0px 6px #858585;z-index:99999;">Housekeeping</a>
					<?PHP } ?>

						<div id="info" style="margin-top:280px;margin-left:195px;z-index:3;">
							<span>
								<img src="http://haddoz.org/static/images/icons/icon_1.png"> Última visita hace: 4 horas
							</span>
							<span>
								<img src="http://haddoz.org/static/images/icons/icon_4.png"> Tienes <?=$users->Info('credits')?> creditos
							</span>
							<span style="margin-left:280px;">
								<a href="<?php echo $SITEPATH;?>/logout">Quiero salir</a>
							</span>
						</div>
				</div>
			</div>
		</div>
		<div id="column1">
			<div id="box">
				<div class="space">
					<div id="newspromo"> 
					    <div id="topstories"> 
							<? Helpers::PromoLastShow() ?>	
						</div> 
					</div>
				</div>
			</div>

			<div id="box">
				<div class="space">
					<div id="title"><center>¿Qué hora es?</center></div>
					<center><?=date('d.m.Y   h:i:s');?></center>
				</div>
			</div>

			<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:300px;height:250px"
			     data-ad-client="ca-pub-3349164495616121"
			     data-ad-slot="9114993352"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>

			<div id="box">
				<div class="space">
					<div id="title">Mis estádisticas</div>
					<li>Tienes <?=$users->Info('credits');?> creditos</li>
					<li>Tienes 20 amigos</li>
					<li>Tienes 2 notificaciones</li>
				</div>
			</div>
		</div>
			
		<div id="column2">
			<div id="box">
				<div class="space">
					<div id="title">Lo mas visitado dentro del hotel</div>
					<div id="rooms">
						<?php
							$res = $Database->Query("SELECT rooms.caption, rooms.description, rooms.owner,users_max, room_active.active_users FROM rooms LEFT JOIN room_active ON (room_active.roomid = rooms.id) WHERE room_active.active_users > '0' ORDER BY active_users DESC LIMIT 6");
							$i = 0;
							$room = "";

							if($res->num_rows < 1)
							{
								echo "No hay ninguna sala activa";
							}

							else
							{
								while($r = $res->fetch_array())
								{
									$i++;
									if($i == 5 || $i == 6)
										$room = "room2";
									else if($i == 3 || $i == 4)
										$room = "room1";
									else 
										$room = "room3";
									echo '<div id="'.$room.'"><b>'.$r['caption'].'</b> de <a href="'.PATH.'/home/'.$r['owner'].'">'.$r['owner'].'</a><br><em>'.$r['description'].'</em></div>';
								}
							}
						?>

					</div>
				</div>	
			</div>

			<div id="box">
				<div class="space">
					<div id="title">Qué esta pasando en facebook</div>
					<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FPixeledHotel&amp;width=627&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color=white&amp;stream=true&amp;header=false&amp;appId=381779658524460" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:300px; width:605px; background:white;" allowtransparency="false"></iframe>
				</div>
			</div>

			<div id="box">
				<div class="space">
					<div id="title">Ultimas noticias</div>
				</div>
			</div>
	</div>


	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://habpl.us/habboweb/web-gallery/static/js/libs2.js" type="text/javascript"></script>
	<script src="http://habpl.us/habboweb/web-gallery/static/js/visual.js" type="text/javascript"></script>
	<script src="http://habpl.us/habboweb/web-gallery/static/js/libs.js" type="text/javascript"></script>
	<script src="http://habpl.us/habboweb/web-gallery/static/js/common.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://habpl.us/habboweb/web-gallery/static/js/fullcontent.js"></script>
</body>