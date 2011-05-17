<div class="tools">
  <div class="toolbox">
    <ul class="toolbox_wrapper">
     <li class="toolbox_element"><a href="<?=base_url()?>customize">Customize</a></li>
     <li class="toolbox_element"><a href="<?=base_url()?>new_post">New Post</a></li>
    </ul>
  </div>
</div>

<div class="posts">
<? 
foreach($posts as $post){
  if(strlen($post["image"])){
    echo "<div class=\"post index image_padding\" >";
    echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\"><img class=\"image_box\" src=\"".(strstr($post["image"],"http") ? $post["image"] : base_url()."img/uploads/".$post["image"])."\" /></a>";
    if( $post['source'] )
      echo "<div class=\"source\">Source: <a href=\"". $post['source']."\">". $post['source']."</a></div>";
   }else{
    echo "<div class=\"post index image_padding\">";
    echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    echo "<p class=\"info\">Posted by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";
    echo "<p>";
    $body = explode("<br><br>",$post["content"]);
    echo "".$this->typography->auto_typography($body[0])." ".$post['summary']."</p>";
    if( $post['source'] ){
      echo "<div class=\"tags\">";
      echo "<div class=\"right\">Source: <a href=\"". $post['source']."\">". $post['source']."</a></div>";
      echo "&nbsp;</div>";
    }
  } echo "</div>";
}?>
</div>

<?=$this->pagination->create_links()?>