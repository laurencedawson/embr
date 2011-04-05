<div class="blog_post">

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

<div class="post theme">
<h2 class="blogH2"> <?= $post['content']['title'] ?></h2>
<?php
  if( $post['content']['category'] )
    echo "<p class=\"blogP\">by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))." in <a href=\"".base_url()."category/".strtolower( str_replace(" ","-",$post['content']['category']) )."\">".$post['content']['category']."</a></p>";
  else
    echo "<p class=\"blogP\">by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))."</p>";
  echo $post['content']['content'];
?>
</div>

</div>