
var element;
var t;
var y;
$(".settings_element").focus(function(){
  $(this).keydown(function(e) {
  element = $(this);

if( e.keyCode=='13' || e.keyCode=='9' ){
	if( t && y ){
	  clearTimeout(t);
	  element.css('background','url(http://localhost/embr/img/icons/check.gif)418px center no-repeat');
	  y=false
	}
}else{

    element.css('background','url(http://localhost/embr/img/load.gif)412px center no-repeat');
   y = true;
  
	if( !t )
	  t = setTimeout("element.css('background','url(http://localhost/embr/img/icons/check.gif)418px center no-repeat');y=false;",800);
	else{
	 clearTimeout(t);
	 t = setTimeout("element.css('background','url(http://localhost/embr/img/icons/check.gif)418px center no-repeat');y=false;",800);
	}

}

  });
});



/*
	Show the reblog message
*/
$(".reblog_element").click(function(){
  alert("Coming Soon...");
});

/*
	Show the legend
*/
$(".legend").click(function(){
  $('body').find('.cover').css({'visibility' : 'visible'});
  return false;
});

/*
	Hide the legend
*/
$(".cover").click(function(){
  $('body').find('.cover').css({'visibility' : 'hidden'});
});

/*
	Confirm deletion of a post
*/
$(".delete").click(function(){
  var answer = confirm("Are you sure you want to delete this post?")
  return answer ? true : false;
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
      $(this).text("Hide");
      $('header').find('.post').fadeIn('fast');
      lg= true;
    }else{

      $(this).text("Admin ");
      $('header').find('.post').fadeOut('fast');
      lg = false;
    }
  }else{
    //If not cached, grab the admin panel
    if( !lg ){
	  if( $(this).text()=="Logout" )
	    window.location = $(this).attr('href');
	  else{
  	    //Incase of slow connections show the loading icon
        $('nav').prepend("<div class=\"loading left\"><img src=\"img/load.gif\"/></div>");	
        //Grab the admin link
	    var l = $(this).attr('href')+"/index/min";
        //Set the admin button text to hide
        $(this).text(" Hide ");
        //Grab the admin panel and append to the header div
        $.get(l,function(data){
          var d=$(data);
          var items=d.find('.post');
          items.hide();
          $('.loading').remove();
          $('header').append( items );
          items.fadeIn('fast');
        });
	    //Set the cached & showing variables as true
	    lg = true;
	    d = true;
	  }
	}
  } return false;	
});


/*
	Show / Hide the extra options pane
*/
var state2 = 0;
$(".extra").click(function(){
  if( state2 ){
    $('body').find('.extra_options_pane').fadeOut('fast');
    state2 = 0;
    $(this).text("More Options");
  } else {
    $('body').find('.extra_options_pane').fadeIn('fast');
    state2 = 1;
    $(this).text("Less Options");
  }	
  return false;
});

/*
	Show / Hide the image post options
*/
var state = 1;
$(".aip").click(function(){
  if( state ){
    $('body').find('.text_area_wrapper').fadeOut('fast', function() {
      $(".aip").text("Switch to Text Post");
      $('body').find('.editor_image_input').fadeIn();
      $('body').find('.post_label').text("Image Post URL");
      state=state?0:1;
    });
  }else{
	$('body').find('.editor_image_input').fadeOut('fast', function() {
      $(".aip").text("Switch to Image Post");
      $('body').find('.text_area_wrapper').fadeIn();
      $('body').find('.post_label').text("Text Post");
      state=state?0:1;
    });
  }
  return false;
});