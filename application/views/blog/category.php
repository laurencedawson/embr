<h3>There were <?=$count?> posts in the category '<?=$category?>'</h3>
<div class="posts">
<?php 
  if( isset( $posts ) ){
    foreach($posts as $post){
      if(strlen($post["image"])){
        $obj = getimagesize(base_url().'img/uploads/'.$post["image"]);
        $width = $obj[0];				
        $ratio = 576 / $width = $obj[0];
        $height = ($obj[1]*$ratio) - 2;		
        echo "<div class=\"post index\" style=\"height:".$height."px; padding:0px\" >";	
        echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\"><img src=\"".base_url()."img/uploads/".$post["image"]."\" width=\"574\" height=\"".$height."\"/></a>";			   
      }else{
        echo "<div class=\"post index\">";		
        echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
        echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";
        echo "<p>";
        $body = explode("</p>",$post["content"]);
        echo "".strip_tags($body[0])." ".$post['summary']."</p>";
      }
      echo "</div>";
    }
  } else{
    echo "<img class=\"not_found\" src=\"".base_url()."img/".$not_found."\"/>";
  }?>
</div>

<?=$this->pagination->create_links()?>