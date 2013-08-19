window.jQuery || document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
var Trynity = {}

Trynity.Login = function(){
	$.ajax({
		type: "POST",
		url: ACTIONS_URL + "login",
		data:{
			username: $('#username').val(), 
			password: Data.encode($('#password').val())
		},

		success: function (object)
		{
			$("#result").css("display", "block");
			if(object.status != "OK"){
				$("#result").html(object.error);
			}
			else
			{
				$("#forms").css("display", "none");
				$("#result").css("background", "rgb(82, 211, 41)");
				$("#result").html("¡Bienvenid@ " + object.username + "! haz iniciado seccion correctamente. Seras redirecionado en segundos... ");
				setTimeout(function(){
					location.href = SITEPATH;
				}, 3200);
			}
		},

		error: function ()
		{
			$("#result").html('Ocurrio un error cuando se envio la informacion, intentalo mas tarde.');
			return false;
		}
	});
};

Trynity.Forgot_password = function(){
	$.ajax({
		type: "POST",
		url: ACTIONS_URL + "forgot",
		data: {
			username:  $('#username').val(), 
			Question1: $('#Question1').val(), 
			Question2: $('#Question2').val(), 
			Answer1:   $('#Answer1').val(), 
			Answer2:   $('#Answer2').val()
		},

		success: function (object)
		{
			window.scrollTo(0,0);
			$("#result").css("display", "block");
			
			if(object.status != "OK"){
				$('#result').html(object.error);
			}

			else
			{
				$('#result').css("background", "rgb(82, 211, 41)");
				$('#result').html("Las respuestas son las correctas, en segundos podras cambiar tu contraseña</br>");
					
				setTimeout(function(){
					location.href = SITEPATH + "/forgot";
				}, 3200);
			}
		},

		error: function ()
		{
			$("#result").html("Ocurrio un error cuando se envio la informacion, intentalo mas tarde");
			return false;
		}
	});
};
