	$(document).ready(function(){
		$('#logText').html('Iniciar sesión');
		$('#logForm').submit(function(e){
			e.preventDefault();
			$('#logText').html('Comprobando...');
			var url = baseUrl;
			var user = $('#logForm').serialize();
			var login = function(){
				$.ajax({
					type: 'POST',
					url: url + 'LoginController/login',
					dataType: 'json',
					data: user,
					success:function(response){
						$('#message').html(response.message);
						$('#logText').html('Login');
						if(response.error){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#logForm')[0].reset();
							setTimeout(function(){
								location.reload();
							}, 1000);
						}
					}
				});
			};
			setTimeout(login, 1000);
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
	});