jQuery(document).ready(function($){	    
	$('.slider').first().bjqs({        
        'randomstart' : false,
		'automatic' : false,
		'animtype' : 'slide',
		'animduration' : 1000,
		'keyboardnav' : false,
		'width' : $(window).width(),
		'height' : 950,
		'responsive' : true,
		'nexttext': '',
        'prevtext': ''
    });	
});