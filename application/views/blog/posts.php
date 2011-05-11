<div class="blog_post">
<?php if( isset( $post['content']) ){
	/*
  if( isset( $post['prev']['title'] ) )
    echo "<div class=\"blogNav left\"><a href=\"".base_url().strtolower( str_replace(" ","-",$post['prev']['title']) )."\">&laquo; Previous Post</a></div>"; 
  else
    echo "<div class=\"blogNav left\">&laquo; Previous Post</div>";  
  
  if( isset( $post['next']['title'] ) )
    echo "<div class=\"blogNav right\"><a href=\"".base_url().strtolower( str_replace(" ","-",$post['next']['title']) )."\">Next Post &raquo;</a></div>"; 
  else
    echo "<div class=\"blogNav right\">Next Post &raquo;</div>";
*/
}?>
<?php
  if(strlen($post['content']['image'])){
	echo "<div class=\"post image_padding\" style=\"margin-bottom:15px\">";
         echo "<a href=\"".$post['content']['image']."\"><img class=\"image_box\" src=\"".(strstr($post['content']['image'],"http") ? $post['content']['image'] : base_url()."img/uploads/".$post['content']['image'])."\" /></a>"; 
  
  echo "<div class=\"source left\">Reblogged 2 hours ago from: <a href=\"http://facebook.com\">Facebook.com</a></div>";
  if( $post['content']['source'] )
    echo "<div class=\"source\">Source: <a href=\"". $post['content']['source']."\">". $post['content']['source']."</a></div>";

  }else{
	echo "<div class=\"post\">";
    echo "<h2>".$post['content']['title']."</h2>";
    if( $post['content']['category'] )
      echo "<p class=\"info\">by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))." in <a href=\"".base_url()."category/".strtolower( str_replace(" ","-",$post['content']['category']) )."\">".$post['content']['category']."</a></p>";
    else
      echo "<p class=\"info\">by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))."</p>";
      echo $post['content']['content'];
  } ?>
</div>

<!--
<div style="padding-left: 20px; font-size:10px;">
	<img src="http://en.gravatar.com/userimage/11373106/e3d4bacd281098018c5646f739787391.png?size=16" style="margin-right: 5px"/> reblogged this from tgold<br/>
		<img src="http://en.gravatar.com/userimage/11373106/e3d4bacd281098018c5646f739787391.png?size=16" style="margin-right: 5px"/> reblogged this from tgold
</div>-->

</div>

<!--<img src="img/reblog.png" class="left"/>-->