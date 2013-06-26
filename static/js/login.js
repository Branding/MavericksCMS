/*-----------------------------
	(•_•) Author: |Lion
	<) )╯ Copyright (C) 2013 - 2014
 	 / \  MavericksCMS
-------------------------------------*/

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
				$('#result').css('display','block');
				if(resp.status == "NOK")
				{
					$('#result').html(resp.error);
				}
				else
				{
					$('#forms').css('display', 'none');
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