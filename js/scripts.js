$(function() {
	$('nav.mobile').click(function(){
		var listaMenu = $('nav.mobile ul');				

		if (listaMenu.is(':hidden') == true) {
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times');
			listaMenu.slideToggle();
		}
		else{
			var icone = $('.botao-menu-mobile').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();
		}

	})

	if ($('target').length > 0) {
		var element = '#'+$('target').attr('target');
		var divScroll = $(element).offset().top;
		$('html,body').animate({scrollTop:divScroll}, 1000);

	}
})