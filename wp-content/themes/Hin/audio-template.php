<?php
/*
Template Name: audio-template
*/
?>
<?php get_header(); ?>

<script type="text/javascript">

jQuery.noConflict();
jQuery(document).ready(function(jQuery){	
//generateGrid(3);
//appendToGrid();
//var root = location.protocol + '//' + location.host;
 jQuery.getJSON('http://hinmusic.com.localhost/?json=1',
  {
    'status': 'ok',
	'post_type':'audiopost',
	'count': '20'
  },
  function(data) {
   var posts = data;
   createcontainers(data);
   appendpostfromjson(data);
  });
});

function createcontainers(data){
 jQuery.each(data.posts, function(i,post){
      var randomGridrow = jQuery('<div class="randomGrid-row">');
	  var randomGridcolumnleft = jQuery('<div class="randomGrid-column">');
	  var randomGridcolumnmiddle = jQuery('<div class="randomGrid-column">');
	  var randomGridcolumnright = jQuery('<div class="randomGrid-column">');
	  randomGridrow.append(randomGridcolumnleft);
	  randomGridrow.append(randomGridcolumnmiddle);
	  randomGridrow.append(randomGridcolumnright);
	  randomGridrow.appendTo('#content');	  
    });
}

function appendpostfromjson(data){
	var posts = [];
	jQuery.each(data.posts, function(i,post){
		var circlecontainer = jQuery('<div align="center" class="entry-content-circle">');
		var circletitle = jQuery('<div class="main-entry-title-circle">'); 
        var circlecontent = jQuery('<div>');		
		circletitle.html(post.title);
		circlecontent.html(post.content);
		circlecontainer.append(circletitle);
		circlecontainer.append(circlecontent);
		var entrymeta = jQuery('<div class="entry-meta" style="float:right">');
		entrymeta.html(post.date);
		circlecontainer.append(entrymeta);
		posts.push(circlecontainer);				
		});	
	
	jQuery('.randomGrid-row').each(function(){
		jQuery(this).find('.randomGrid-column').each(function(){		
			if(posts.length > 0){
				var randomInt = getRandomInt(1,10);				
				if(randomInt > 3){				
					var appendpost = posts.shift();		
					jQuery(this).append(appendpost);
				}
			}
		});
	});
	
}
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

</script>		
        <div id="primary-fixed-large" class="content-area">
            <div id="content" class="site-content" role="main">				
				
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area --> 

<?php get_footer(); ?>

