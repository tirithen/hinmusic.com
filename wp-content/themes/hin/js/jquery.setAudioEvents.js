jQuery(document).ready(function($){
 (function() {
	
	var iframeElements = document.getElementsByClassName('scwidget');	
	for (var i = 0; i < iframeElements.length; i++) {
		 var $widget = SC.Widget(iframeElements[i]);
		 $widget.bind(SC.Widget.Events.PLAY, function(eventData) {			
			//$widget.parent('.entry-content-circle-medium').css('background','rgba(0, 0, 190, .40)');
			//alert($widget.length);
		 });
		 $widget.bind(SC.Widget.Events.PAUSE, function(eventData) {
			//alert('pausing');
		 });
		 
   
	}
	
 }());
});
