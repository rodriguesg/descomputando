window.onresize = resize;

function resize(){
	var windowSize = $(window)[0].innerWidth;
	if (windowSize <= 991) {
		$('.menu').css({'width': '0', 'padding': '0'});
        $('header').css({'width': '100%'});        
        $('.content, header').css({'left': '0'});
        $('.content').css({'width': '99%'});
        $('.content').css({'max-width':'99%'});        
	}
	else if (windowSize > 991){
		$('.menu').css({'width': '300px'});
		$('.menu').css({'height': '100%'});
		$('.menu').css({'margin-top': '0'});
		$('.menu').css({'padding': '10px 0'});
        $('.content').css({'left': '300px'});
        $('.content').css({'width': 'calc(99% - 300px)'});
		$('header').css({'left': '300px'});
        $('header').css({'width': 'calc(100% - 300px)'});
	}
}

$(function(){
	resize();	
	$('button').click(function(){
		if ($('button').hasClass('collapsed')) {
			$('.menu').css({'width': '0'});						
			$('header').css({'left': '0'});
			$('header').css({'width': '100%'});
			$('.content').css({'left': '0'});
        	$('.content').css({'width': '99%'});        	
		}
		else{
			$('.menu').css({'width': '150px'});
			$('.menu').css({'height': '100%'});
			$('.menu').css({'margin-top': '0'});
			$('.menu').css({'padding': '10px 0'});
	        $('.content').css({'left': '150px'});
	        $('.content').css({'width': '99%'});
			$('header').css({'left': '150px'});
	        $('header').css({'width': 'calc(100% - 150px)'});
		}	
	})
})




