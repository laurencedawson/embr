<div class="tools">
    <ul class="toolbox">
     <li class="toolbox_element delete delete"><a href="<?=base_url()?>delete/<?=strtolower( str_replace(" ","-",$post['content']['title']) )?>">Delete</a></li>
     <li class="toolbox_element edit"><a href="<?=base_url()?>edit/<?=strtolower( str_replace(" ","-",$post['content']['title']) )?>">Edit</a></li>
     <li class="toolbox_element reblog_element retweet"><strong>Reblog</strong><span class="hidden_url"><?=base64_encode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"])?></span></li>
    </ul>
</div>

<div class="blog_post">
<?php
  //Check for an image, if present create an image post
  if(strlen($post['content']['image'])){
    echo "<div class=\"post\" style=\"margin-bottom:15px\">";
    echo "<a href=\"".$post['content']['image']."\"><img class=\"image_box\" src=\"".(strstr($post['content']['image'],"http") ? $post['content']['image'] : base_url()."img/uploads/".$post['content']['image'])."\" /></a>";
  
    //If the post has a source, display it
    if( $post['content']['source'] )
      echo "<div class=\"image_source\">Source: <a href=\"". $post['content']['source']."\">". $post['content']['source']."</a></div>";
  }

  //Otherwise assume the post is a text post
  else{
    echo "<div class=\"post\">";
    echo "<h2>".$post['content']['title']."</h2>";
    echo "<div class=\"post_inner\">";
    if( $post['content']['category'] )
      echo "<p class=\"info\">Posted by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))." in <a href=\"".base_url()."category/".strtolower( str_replace(" ","-",$post['content']['category']) )."\">".$post['content']['category']."</a></p>";
    else
      echo "<p class=\"info\">Posted by ".$first_name." on ".date("l dS F\, Y",strtotime ($post['content']['datet']))."</p>";
    echo $this->typography->auto_typography( $post['content']['content'] );
    echo "</div>";

	if( count( $post['tags'] ) || $post['content']['source'] ){
      echo "<div class=\"tags\">";
      if( count( $post['tags'] ) ){
      echo "Tagged: ";
        $count = 0;
        foreach ($post['tags'] as $tag){
          echo "<a href=\"".base_url()."tag/".strtolower(str_replace(" ","-",$tag['tag']))."\">".$tag['tag']."</a>";
          if( $count < count($post['tags'])-1 )
            echo ", ";
          $count++;
        }
      }else echo "&nbsp;";
	    if( $post['content']['source'] )
	      echo "<span class=\"right\">Source: <a href=\"". $post['content']['source']."\">". $post['content']['source']."</a></span>";
	  echo "</div>";
    }
  }
?>

</div>
</div>