<h3>There were <?= $count ?> tag results for '<?= $tag ?>'</h3>
<div class="posts">
<?php 
if( isset( $posts ) ){
  foreach($posts as $post){
    if(strlen($post["image"])){
      echo "<div class=\"post index\" >";
      echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\"><img class=\"image_box\" src=\"".base_url()."img/uploads/".$post["image"]."\" /></a>";		   
    }else{
      echo "<div class=\"post index image_padding\">";		
      echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
      echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";
      echo "<p>";
      $body = explode("<br><br>",$post["content"]);
      echo "".$this->typography->auto_typography($body[0])." ".$post['summary']."</p>";
    }
    echo "</div>";
  }
}else{
  echo "<img class=\"not_found\" src=\"".base_url()."img/".$not_found."\"/>";
}?>
</div>

<?=$this->pagination->create_links()?>