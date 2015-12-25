$(document).ready(function(){
	
	
	$('.menu  li  a').click(function(){
		$('.menu li ul').stop().slideUp();
		if ( $(this).next().is('ul') ) {
			$(this).next('ul').stop().slideToggle();
			$(this).closest('li').toggleClass('active');
		}
	});
        
	$(document).on('click touchstart', function(e) {
		if ( !$.contains($('.menuDesktop').get(0), e.target)  ) {
			$('.menuDesktop li ul').stop().slideUp('slow', function(){
				$('.menuDesktop li ul').closest('li').removeClass('active');	
			});

		}
		
		if (!$.contains($('.menuMobile').get(0), e.target)  ) {
			$('.menuMobile li ul').stop().slideUp('slow', function(){
				$('.menuMobile li ul').closest('li').removeClass('active');	
			});
		}
		
	});
	
	
	$("#owl-carousel").owlCarousel({
		autoPlay : 6000,
		navigation : false,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,
		lazyLoad : true,
		autoHeight : true

	 });
	
	$('input.styler, select').styler();
	
	$(window).load( function() {        	
		//text ellipsis
		$('.ellipsis').dotdotdot({
			watch: 'window'
		});		
	});
	
	
	$('.adminText img').each(function(index, element){
		
		if ( $(this).css('float') == 'left' ) {
			$(this).addClass('leftFloat');
		}
		
		if ( $(this).css('float') == 'right' ) {
			$(this).addClass('rightFloat');
		}
		
		
	});
	
});
