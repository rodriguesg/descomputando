$(function () {
	$('form').submit(function(){
		var form = $(this);
		$.ajax({
			beforeSend: function(){
				$('.overlay-loading').fadeIn();
			},
			url:include_path+'ajax/formularios.php',
			method: 'post',
			dataType: 'json',
			data: form.serialize()
		}).done(function(data){			
			if (data.success) {
				console.log(data);
				$('.overlay-loading').fadeOut();
				$('.success').fadeIn();
				setTimeout(function(){
					$('.sucesso').fadeOut();
				},3000)
			}
			else if (data.error) {				
				$('.overlay-loading').fadeOut();
				$('.error').fadeIn();
				setTimeout(function(){
					$('.error').fadeOut();
				},3000)
			}
		});
		return false;
	});	
})