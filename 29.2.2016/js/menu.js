jQuery(document).ready(function() {		
		jQuery('li.dropdown').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 769) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
});  
	
	