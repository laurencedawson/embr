$(document).ready(function(){
  //Hide pagination controls
  $(".next").hide(); $(".prev").hide();

  //Set the index page linker
  linker();

  //Reblog code
  if (window.localStorage) 
    if (localStorage.getItem('embr_blog')) 
	  $('body').find('.reblog').css({'visibility' : 'visible'});

  //Focus on the title of any form
  $(".editor_element").focus();

  //Sets the base url
  base_url = $("header h1 a").attr('href');

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


/* 
	Set links for posts on index pages (if div clicked follow the link)
*/
function linker(){
  $(".index").click(function(){
	//Cache the url, slide up the top bar
	var url=$(this).find('h2 a').attr('href');
	if( typeof url != "undefined"){
	    window.location = url
    }else{
	  url=$(this).find('a').attr('href');
      window.location = url
    }
  });
}

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
		if( typeof last != "undefined")
          $('.posts').find('.post').get(index).className = last;
	 	$(window).scrollTop( 0 );
		index=-1;
	  }
	}
});

/*
	Endless scoll
*/
var loading = false; //If the page if loading
var endreached = false; //If we have reached the end
$(window).scroll(function(){
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
            $('.posts').append("<div class=\"loading\"><h2>You've reached the end</h2></div>"); 
          }
          //Refresh linker
		  linker();
		  //Finish loading
          loading = false;
        });
      }
    }
  }
});