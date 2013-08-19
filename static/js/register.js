$(document).on('ready', function()
{
	window.StartRegister = function()
	{
		$.ajax({
			url: ACTIONS_URL + 'register',
			type: 'POST',
			data: 
			{
				username: $('#username').val(),
				password: $('#password').val(),
				password2:$('#password2').val(),
				email:    $('#email').val(),
				Question1:$('#Question1').val(),
				Answer1:  $('#Answer1').val(),
				Question2:$('#Question2').val(),
				Answer2:  $('#Answer2').val(),
				recaptcha_challenge_field: $('#recaptcha_challenge_field').val(),
				recaptcha_response_field:  $('#recaptcha_response_field').val(),
			},

			success: function(object)
			{
				window.scrollTo(0,0);
				$("#result").css('display', 'block');

				if(object.status == "NOK")
				{
					$('#result').html(object.error);
					window.ReloadCaptcha();
				}

				else
				{
					window.InputsDisable();
					$('#result').css('background', 'rgb(82, 211, 41)');
					$('#result').html('¡Felicitaciones '+ object.UserRegister +'! te haz registrado correctamente por favor espera..');

					setTimeout(function(){
						location.href = SITEPATH;
					}, 3200);
				}
			}
		});
	}

	window.ReloadCaptcha = function()
	{
		Utils.reloadRecaptcha();
		window.scrollTo(0,0);
	}

	window.InputsDisable = function()
	{
		Elements = document.getElementsByTagName("input");
		var i = 0;
		for(i = 0; i<Elements.length; i++)
		{
			Elements[i].disabled = true;
		}
	}
 
});