<h3 class="tagsH2">There were <?=$count?> posts in the category '<?=$category?>'</h3>
<div class="posts">
<?php 
  if( isset( $posts ) ){
    foreach($posts as $post){
      echo "<div class=\"post theme index\">";
      echo "<h2 class=\"blogH2\"><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
      echo "<p class=\"blogP\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>"; 
      echo "<p>";
      $body = explode("</p>",$post["content"]);
      echo "".strip_tags($body[0])." ".$post['summary']."</p>";
      echo "</div>";
    }
  } else{
    echo "<img class=\"not_found\" src=\"".base_url()."img/".$not_found."\"/>";
  }?>
</div>

<?=echo $this->pagination->create_links()?>