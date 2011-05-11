/*
    Test if an element is visible
*/
function visible(e){return (($(e).offset().top+$(e).height()>=$(window).scrollTop()) && ($(e).offset().top<=$(window).scrollTop()+$(window).height()));}

/*
     Set links for posts on index pages (if div clicked follow the link)
*/
function linker(){
  $(".index").click(function(){
	//Cache the url, slide up the top bar
	var url=$(this).find('h2 a').attr('href');
	$(".header_slide").slideUp("fast",function(){
		//Foollow the url
		window.location = url
	;});
  });
}

/*
	Standard document ready
	Hides pagination if js enabled
*/
$(document).ready(function(){
  //Hide pagination controls
  $(".next").hide(); $(".prev").hide();
  //Set the index page linker
  linker();
});

$(".cover").click(function(){
  $('body').find('.cover').css({'visibility' : 'hidden'});
});

$(".legend").click(function(){
  $('body').find('.cover').css({'visibility' : 'visible'});
});




/*
	Keyboard Navigation (j forward, k backwards)
*/
var index = -1;	//Stores an index of the currently selected blog post
var stop = false; //Indicates if the navigation should still add extra window space
var last; //The last div class name, used when appending a drop shadow
$(window).keypress(function(e){
  //Handle the next operation
  if( String.fromCharCode(e.which)=='j' ){
    if( index < $('.posts').find('.post').length-1 ){
      if(last!=null)
        //Remove the last selected style
        $('.posts').find('.post').get(index).className = last;
		//Increment the index
		index++;
		//Cache the element
        var t = $('.posts').find('.post').get(index);
        //Set the currently selected elements style
        last = t.className; t.className+=" selected";
        //If we reach the end of the posts, start adding extra height to the spacer
        if( endreached&&!stop )
          $('.key_spacer').height( $('.key_spacer').height() + t.clientHeight + 20 );
        //Scroll down to the next blog post
        $(window).scrollTop( t.offsetTop-20 );
      }else if(!stop)
        stop = true;			
	}	
	//Handle the previous operation
	else if( String.fromCharCode(e.which)=='k' ){
	  if( index >=1 ){
	    //Remove the last selected style
	    $('.posts').find('.post').get(index).className = last;
		index--;
        //Cache the element
        var t = $('.posts').find('.post').get(index);		
		//Set the currently selected elements style
		last = t.className; t.className+=" selected";
		//Scroll up to the next blog post
		$(window).scrollTop( t.offsetTop-20 );
	  }else{
		//Handles case to display header
        $('.posts').find('.post').get(index).className = last;
	 	$(window).scrollTop( 0 );
		index=-1;
	  }
	}
	//Handle the view operation
	else if( String.fromCharCode(e.which)=='v' )
		window.location = 
			$('.posts').find('.post h2 a').get(index-1).href;
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
  } return false;	
});
    
/*
	Endless scoll
*/
var loading = false; //If the page if loading
var endreached = false; //If we have reached the end
$(window).scroll(function(){
  //Refresh linker
  linker();

  //Check if header is visible - disabled for now due to the introduction of keyboard shortcuts
//  if(!visible($(".header"))) $(".header_slide").slideDown("slow"); else $(".header_slide").slideUp("slow");  

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
        $('.posts').append("<div class=\"loading\"><h2><img src=\"img/load.gif\"/><br/>Loading</h2></div>");
        //Remove the old pagination links
        $(".next").remove();
        $(".prev").remove();
        //Get the next set of posts
        $.get(t,function(data){
          var d=$(data);
          var items=d.find('.post');
          $('.loading').remove();
          //Add the next posts
          $('.posts').append(items);
          var v=d.find('.next');
          $('.posts').append(v);
          //See if there are any more pages
          if(v.length==0){
            endreached=true;
            $('.posts').append("<div class=\"loading\"><h2>You've reached the end!</h2></div>"); 
          }
          loading = false;
        });
      }
    }
  }
});