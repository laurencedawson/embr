//Test if an element is visible
function visible(e){return (($(e).offset().top+$(e).height()>=$(window).scrollTop()) && ($(e).offset().top<=$(window).scrollTop()+$(window).height()));}
//Set links for posts on index pages
function linker(){
$(".index").click(function(){var url=$(this).find('h2 a').attr('href');$(".header_slide").slideUp("fast",function(){window.location = url;});});}

$(document).ready(function(){
//Hide pagination controls
  $(".next").hide(); $(".prev").hide();
  //Set the index page linker
  linker();
});
    
//Variables for the endless-scroll
var loading = false, endreached = false;
$(window).scroll(function(){
  //Refresh linker
  linker();
  //Check if header is visible
  if(!visible($(".header"))) $(".header_slide").slideDown("slow"); else $(".header_slide").slideUp("slow");
  //Variables for infinite-scroll
  if(loading || endreached) return;
  //Check if user has scrolled to a point + buffer
  if($(document).height()-$(window).height()<=$(window).scrollTop()+200){
    if(!loading){
      loading = true;
      //First extract the next page to load
      var t=$("div.next a").attr('href');
      if( t==null ){
        endreached = true;
      }else{
        $('.posts').append("<div class=\"loading\"><h2><img src=\"/img/load.gif\"/><br/>Loading</h2></div>");
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