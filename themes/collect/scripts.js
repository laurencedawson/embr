// AJAX loader (blog_post) variables.
var post_loading = false;

/*
	Standard document ready
	Hides pagination if js enabled
*/
var base_url;
var $posts = $('.posts');
var loading = false; //If the page if loading
$(document).ready(function(){
	
	// Add loader.
	loading = true;
	var $loader = "<img src=\"img/load.gif\" id=\"loader\">";
	$('.posts').prepend($loader);
	
	$('.image_box', $posts).imagesLoaded(function(){
		
		$('#loader').remove();
		$('.post_date span').fitTextToParent({adjust:0.95});
		$posts.masonry({
			columnWidth: 320, 
			itemSelector: '.post.index'
		}, function(){
			if(window.location.hash != ''){
				var o = .5;
			}else{
				var o = 1;
			}
			$('.posts .post').animate({'opacity': o}, 1000);
			loading = false;
			if(window.location.hash != ''){
			  	
			  	// AJAX load post.
			  	post_loading = true;
			  	$close_link = "<a href=\"#\" class=\"close\"></a>";
			  	
					var h = window.location.hash;
					var t = base_url+h.substring(1);
					var c = 'a[href="'+t+'"]';
					
					var top = $(c).parents('.post').position().top;
					var left = $(c).parents('.post').position().left;
					if(left > $('#post_viewer').width()){
						left = 320;
					}/*else if(left > 310 && left < $('#post_viewer').width()){
						left = 155;
					}*/else{
						left = 0;
					}
					
					$(c).parents('.post').scrollToTop();
			
					$.get(t,function(data){
				    var d=$(data);
				    var item=d.find('.blog_post');
				    
				    if($(item).hasClass('image')){
				    	$(item).prepend($close_link);
				    }else{
				    	$('.post_inner', item).prepend($close_link);
				    }
				    
				    $('#post_viewer').append($(item)).css({'top': top, 'left': left});
				    $('.blog_post .post_date span').fitTextToParent({adjust:0.95});
				    $('a.close').click(function(e){
				    	e.preventDefault();
				    	$('#post_viewer').empty();
				    	$('.post.index').animate({'opacity': 1}, 250);
				    	$(this).remove();
				    });
				    post_loading = false;
					});
			  
			  }
		});
	
	});
	
  //Hide pagination controls
  $(".next").hide();
  $(".prev").hide();
  //Set the index page linker
  //linker();
  //Reblog code
  if (window.localStorage) 
    if (localStorage.getItem('embr_blog')) 
	  $('body').find('.reblog').css({'visibility' : 'visible'});
  //Focus on the title of any form
  $(".form_title").focus();
  //Sets the base url
  base_url = $(".header h1 a").attr('href');

  //Displays the admin buttons if logged in
  l = base_url+"tools/logged_in";
  $.getJSON(l,function(json){
	if(json.logged_in){
	  $(".toolbox_element").show();
	  $(".reblog_element").hide();
	  $(".promo_element").hide();	
      $(".lg").text("Logout");
	  $(".lg").attr("href",base_url+"logout");
	  //Used to set the users reblog URL
	  if (window.localStorage)
	    localStorage.setItem("embr_blog", base_url);
	}else{	  
	  $(".reblog_element").show();
	  $(".promo_element").show();
	}
  });
  
});


// AJAX load post instead of linking.
$close_link = "<a href=\"#\" class=\"close\"></a>";
$('a.post_link').live('click', function(e){
	
	e.preventDefault();
	if(!post_loading && $('#post_viewer').is(':empty')){
		post_loading = true;
		var t = $(this).attr('href');
		var h = t.substring(t.lastIndexOf('/')+1);
		window.location.hash = h;
		var top = $(this).parents('.post').position().top;
		var left = $(this).parents('.post').position().left;
		if(left > $('#post_viewer').width()){
			left = 320;
		}/*else if(left > 310 && left < $('#post_viewer').width()){
			left = 155;
		}*/else{
			left = 0;
		}
		
		$(this).parents('.post').scrollToTop();

		$.get(t,function(data){
	    var d=$(data);
	    var item=d.find('.blog_post');
	    
	    if($(item).hasClass('image')){
	    	$(item).prepend($close_link);
	    }else{
	    	$('.post_inner', item).prepend($close_link);
	    }
	    
	    //$('.loading').remove();
	    $('#post_viewer').append($(item)).css({'top': top, 'left': left});
	    $('.blog_post .post_date span').fitTextToParent({adjust:0.95});
	    $('.post.index').animate({'opacity': .5}, 250);
	    $('a.close').click(function(e){
	    	e.preventDefault();
	    	$('#post_viewer').empty();
	    	$('.post.index').animate({'opacity': 1}, 250);
	    	$(this).remove();
	    });
	    post_loading = false;
		});
	}

});


// AJAX load post instead of linking.
$close_link = "<a href=\"#\" class=\"close\"></a>";
$('a.post_link').live('click', function(e){
	
	e.preventDefault();
	if(!post_loading && $('#post_viewer').is(':empty')){
		post_loading = true;
		var t = $(this).attr('href');
		var h = t.substring(t.lastIndexOf('/')+1);
		window.location.hash = h;
		var top = $(this).parents('.post').position().top;
		var left = $(this).parents('.post').position().left;
		if(left > $('#post_viewer').width()){
			left = 320;
		}/*else if(left > 310 && left < $('#post_viewer').width()){
			left = 155;
		}*/else{
			left = 0;
		}
		
		$(this).parents('.post').scrollToTop();

		$.get(t,function(data){
	    var d=$(data);
	    var item=d.find('.blog_post');
	    
	    if($(item).hasClass('image')){
	    	$(item).prepend($close_link);
	    }else{
	    	$('.post_inner', item).prepend($close_link);
	    }
	    
	    //$('.loading').remove();
	    $('#post_viewer').append($(item)).css({'top': top, 'left': left});
	    $('.blog_post .post_date span').fitTextToParent({adjust:0.95});
	    $('.post.index').animate({'opacity': .5}, 250);
	    $('a.close').click(function(e){
	    	e.preventDefault();
	    	$('#post_viewer').empty();
	    	$('.post.index').animate({'opacity': 1}, 250);
	    	$(this).remove();
	    });
	    post_loading = false;
		});
	}

});
/*
	AJAX login and Admin panel
*/
var lg; //Used as hide / show switch
var d =false; //Used as a caching switch
$(".lg").click(function(){
	
  //If cached, toggle the hide and show operations
  if( d ){
    if( !lg ){
      $(this).text("Hide ");
      $('.header').find('.post').show();
      lg= true;
    }else{

      $(this).text("Admin ");
      $('.header').find('.post').hide();
      lg = false;
    }
  }else{
    //If not cached, grab the admin panel
    if( !lg ){
	  if( $(this).text()=="Logout" )
	    window.location = $(this).attr('href');
	  else{
  	    //Incase of slow connections show the loading icon
        $('.header').append("<div class=\"loading\"><img src=\"img/load.gif\"/></div>");	
        //Grab the admin link
	    var l = $(this).attr('href')+"/index/min";
        //Set the admin button text to hide
        $(this).text(" Hide ");
        //Grab the admin panel and append to the header div
        $.get(l,function(data){
          var d=$(data);
          var items=d.find('.post');
          $('.loading').remove();
          $('.header').append( items );
        });
	    //Set the cached & showing variables as true
	    lg = true;
	    d = true;
	  }
	}
  } return false;	
});

/*
	Endless scoll
*/
var endreached = false; //If we have reached the end
$(document).scroll(function(){
  //Cancel if we have reached the end or are currently loading
  if(loading || endreached) return;
  //Check if user has scrolled to a point + buffer
  if($(document).height()-$(window).height()<=$(window).scrollTop()+500){
    if(!loading){
      loading = true;
      //First extract the next page to load
      var t=$("div.next a").attr('href');
      if( t==null ){
        endreached = true;
      }else{
        //Remove the old pagination links
        $(".next").remove();
        $(".prev").remove();
        
        
        
        //Get the next set of posts
        $.get(t,function(data){
          var d=$(data);
          var items=d.find('.post');
          // Add loader.
          var $loader = "<img src=\"img/load.gif\" id=\"loader\">";
          $posts.append($loader).masonry({appendContent: $loader});
          // Add new posts.
          $(items).addClass('new');
          $posts.append($(items));
          $('.new .image_box', $posts).imagesLoaded(function(){
          	$('#loader').remove();
          	$('.new .post_date span').fitTextToParent({adjust:0.95});
          	$posts.masonry({appendedContent:$(items), itemSelector: '.post'}, function(){
          		if($('#post_viewer').is(':empty')){
          			$(items).animate({'opacity':1}, 1000, function(){$(this).removeClass('new')});
          		}else{
          			$(items).animate({'opacity':.5}, 1000, function(){$(this).removeClass('new')});
          		}
          		loading = false;
          	});
          });
          
          
          
          var v=d.find('.next');
          $('.posts').append(v);
          //See if there are any more pages
          if(v.length==0){
            endreached=true;
            //$('.posts').append("<div class=\"loading\"><h2>You've reached the end</h2></div>"); 
          }
          //Refresh linker
		  //linker();
		  //Finish loading
          loading = false;
        });
      }
    }
  }
});