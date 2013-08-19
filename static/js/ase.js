var Ase = {};

Ase.Login = function(){
	
	$("#results").css("display", "block");
	$.ajax({
		type: 'POST',
		url:  ACTIONS_URL + 'ase/login',
		data: { username: $('#username').val(), password: $('#password').val() },
		success: function(data){
			$(document).scrollTop(0,0);

			if(data.status != "OK"){
				$("#results").html('<div class="alert alert-danger">'+ data.error +'</div>');
			}
			else{
				$("#results").html('<div class="alert alert-success">'+ data.success +'</div>')
			}
		},

		error: function(error){
			$("#results").html('<div class="alert alert-danger">'+ error +'</div>');
			console.log('Ocurrio un error cuando se envio la informacion: ' + error);
		},
	});
}

Ase.UpdateArticles = function(){

}


Ase.LoadArticles = function(){

}