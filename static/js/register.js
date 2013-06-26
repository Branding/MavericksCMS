$(document).on('ready',function(){
	window.StartRegister = function()
	{
		$.ajax({
			url: Sitepatch + '/actions/register',
			type: 'POST',
			data: {},
			success: function()
			{
				
			}
		});
	}
});