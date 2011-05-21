<ul class="toolbox">
  <li class="toolbox_element tools"><a href="<?=base_url()?>customize">Customize</a></li>
  <li class="toolbox_element add-alt"><a href="<?=base_url()?>new_post">New Post</a></li>
<li class="toolbox_element promo_element profile"><a href="https://github.com/laurencedawson/embr">Get <strong>Embr</strong></a></li>

</ul>

<div class="posts">
<? 
foreach($posts as $post){
  if(strlen($post["image"])){
    echo "<div class=\"post index\" >";
    echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\"><img class=\"image_box\" src=\"".(strstr($post["image"],"http") ? $post["image"] : base_url()."img/uploads/".$post["image"])."\" /></a>";
    if( $post['source'] )
      echo "<div class=\"image_source\">Source: <a href=\"". $post['source']."\">". $post['source']."</a></div>";
   }else{
    echo "<div class=\"post index\">";
    echo "<div class=\"post_inner\">";    
    echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    echo "<div class=\"info\"><p>Posted by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p></div>";
    $body = explode("<br><br>",$post["content"]);
    echo "".$this->typography->auto_typography($body[0])." ".$post['summary'];
    echo "</div>";

    if( $post['source'] ){
      echo "<div class=\"tags\">";
      echo "<div class=\"right\">Source: <a href=\"". $post['source']."\">". $post['source']."</a></div>";
      echo "&nbsp;</div>";
    }
  } echo "</div>";
}?>
</div>

<?=$this->pagination->create_links()?>