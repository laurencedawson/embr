/*
	Reblog a post
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
      $(this).text("Hide ");
      $('header').find('.post').show();
      lg= true;
    }else{

      $(this).text("Admin ");
      $('header').find('.post').hide();
      lg = false;
    }
  }else{
    //If not cached, grab the admin panel
    if( !lg ){
	  if( $(this).text()=="Logout" )
	    window.location = $(this).attr('href');
	  else{
  	    //Incase of slow connections show the loading icon
        $('header').append("<div class=\"loading\"><img src=\"img/load.gif\"/></div>");	
        //Grab the admin link
	    var l = $(this).attr('href')+"/index/min";
        //Set the admin button text to hide
        $(this).text(" Hide ");
        //Grab the admin panel and append to the header div
        $.get(l,function(data){
          var d=$(data);
          var items=d.find('.post');
          $('.loading').remove();
          $('header').append( items );
        });
	    //Set the cached & showing variables as true
	    lg = true;
	    d = true;
	  }
	}
  } return false;	
});