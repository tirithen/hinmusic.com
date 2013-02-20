jQuery(document).ready(function($){	    
	
	$('.gallerycollection').each(function(index, value) {
		$(this).find('img').parent('a').attr('rel','shadowbox['+index+']');
	});		
	Shadowbox.init();
});