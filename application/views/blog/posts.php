<div class="blog_post">
<?php
  if(strlen($post['content']['image'])){
    $obj = getimagesize(base_url().'img/uploads/'.$post['content']['image']);
	$width = $obj[0];				
	$ratio = 576 / $width = $obj[0];
	$height = ($obj[1]*$ratio) - 2;		
	echo "<div class=\"post\" style=\"height:".$height."px; padding:0px\" >";	
	echo "<img src=\"".base_url()."img/uploads/".$post['content']['image']."\" width=\"574\" 	   height=\"".$height."\"/>";
  }else{
	echo "<div class=\"post\">";
    echo "<h2>".$post['content']['title']."</h2>";
    if( $post['content']['category'] )
      echo "<p class=\"info\">by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))." in <a href=\"".base_url()."category/".strtolower( str_replace(" ","-",$post['content']['category']) )."\">".$post['content']['category']."</a></p>";
    else
      echo "<p class=\"info\">by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))."</p>";
      echo $post['content']['content'];
  }
?>	
</div>


<?php if( isset( $post['content']) ){
  if( isset( $post['prev']['title'] ) )
    echo "<div class=\"blogNav left\"><a href=\"".base_url().strtolower( str_replace(" ","-",$post['prev']['title']) )."\">&laquo; Previous Post</a></div>"; 
  else
    echo "<div class=\"blogNav left\">&laquo; Previous Post</div>";  
  
  if( isset( $post['next']['title'] ) )
    echo "<div class=\"blogNav right\"><a href=\"".base_url().strtolower( str_replace(" ","-",$post['next']['title']) )."\">Next Post &raquo;</a></div>"; 
  else
    echo "<div class=\"blogNav right\">Next Post &raquo;</div>";
}?>
</div>