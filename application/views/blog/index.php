<ul class="toolbox">
  <li class="toolbox_element tools"><a href="<?=base_url()?>customize">Customize</a></li>
  <li class="toolbox_element add-alt"><a href="<?=base_url()?>new_post">New Post</a></li>
<li class="toolbox_element promo_element profile"><a href="https://github.com/laurencedawson/embr">Get <strong>Embr</strong></a></li>

</ul>


<div class="posts">
<div id="post_viewer"></div>
<? 
foreach($posts as $post){
	$time = strtotime ($post["datet"]);
  if(strlen($post["image"])){
    echo "<div class=\"post image index\" >";
    echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\" class=\"post_link\"><img class=\"image_box\" src=\"".(strstr($post["image"],"http") ? $post["image"] : base_url()."img/uploads/".$post["image"])."\" />";
    echo "<div class=\"post_date image_date\"><span class=\"day\">".date("D",$time)."</span><span class=\"date\">".date("j",$time)."</span><span class=\"month\">".date("M",$time)."</span><span class=\"year\">".date("Y",$time)."</span></div></a>";
    if( $post['source'] )
      echo "<div class=\"image_source\">Source: <a href=\"". $post['source']."\"". $post['source']."</a></div>";
   }else{
    echo "<div class=\"post index\">";
    echo "<div class=\"post_inner\">";    
//    echo "<header>";
    echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\" class=\"post_link\">".$post["title"]."</a></h2>";
    echo "<p class=\"info\"><span class=\"author\">Posted by $first_name</span><span class=\"info_separator\"> - </span><span class=\"post_date\"><span class=\"day\">".date("D",$time)."</span><span class=\"date\">".date("j",$time)."</span><span class=\"month\">".date("M",$time)."</span><span class=\"year\">".date("Y",$time)."</span></span></p>";
//    echo "</header>";
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