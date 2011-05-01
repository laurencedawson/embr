<h3>There were <?= $count ?> tag results for '<?= $tag ?>'</h3>
<div class="posts">
<?php 
if( isset( $posts ) ){
  foreach($posts as $post){
    echo "<div class=\"post index\">";
    echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>"; 
    echo "<p>";
    $body = explode("</p>",$post["content"]);
    echo "".strip_tags($body[0])." ".$post['summary']."</p>";
    echo "</div>";
  }
}else{
  echo "<img class=\"not_found\" src=\"".base_url()."img/".$not_found."\"/>";
}?>
</div>

<?=$this->pagination->create_links()?>





echo "<div class=\"post index\">";		
echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";
echo "<p>";
$body = explode("</p>",$post["content"]);
echo "".strip_tags($body[0])." ".$post['summary']."</p>";