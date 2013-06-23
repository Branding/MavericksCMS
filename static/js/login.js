$(document).on('ready')
{
	window.Initlogin = function()
	{
		$.ajax({
			url: Sitepath + '/actions/login',
			type: 'POST', 
			data: { username: $('#username').val(), password:$('#password').val() },
			success: function(resp){
				console.log("Informacion recibida: " + resp)
				if(resp.status == "NOK")
				{
					$('#result').css('display','block');
					$('#result').html(resp.error);
				}
				else
				{
					$('#result').css('background', 'rgb(82, 211, 41)');
					$('#result').html('Bienvenid@ '+ resp.username +' haz iniciado sesion correctamente, seras redirecionado en segundos...');
					setTimeout(function(){
						console.log('Estado: Logeado con exito..');
					}, 3200);
				}
			}
		});
	}
}