<ul class="toolbox">
  <li class="toolbox_element tools"><a href="<?=base_url()?>customize">Customize</a>
  <li class="toolbox_element add-alt"><a href="<?=base_url()?>new_post">New Post</a>
  <li class="toolbox_element promo_element profile"><a href="https://github.com/laurencedawson/embr">Get <strong>Embr</strong></a>
</ul>

<div class="posts">
<div id="post_viewer"></div>
<?foreach($posts as $post){
  $time = strtotime ($post['datet']);
  $url = base_url().strtolower(url_title($post['title']));
  echo '<div class="post index">';


  //Check if the post is an image or text post
  if(strlen($post['image'])){	
    echo '<a href="'.$url.'" class="post_link"><img alt="'.$post['title'].'" class="image_box" src="'.(strstr($post['image'],'http') ? $post['image'] : base_url().'img/uploads/'.$post['image']).'"/>';
    echo '<div class="post_date image_date"><span class="day">'.date('D',$time).'</span><span class="date">'.date('j',$time).'</span><span class="month">'.date('M',$time).'</span><span class="year">'.date('Y',$time).'</span></div></a>';
    echo '<p class="picture_info"><span class="author">Posted by '.$first_name.'</span><span class="info_separator"> on </span><span class="post_date"><span class="day">'.date("D",$time).'</span><span class="date">'.date("j",$time).'</span><span class="month">'.date("M",$time).'</span><span class="year">'.date("Y",$time).'</span></span>'.($plus_one?'<span class="plus_one"><g:plusone size="small" count="false" href="'.$url.'"></g:plusone></span>':'').($post['source']?'<br/>Source: <a href="'.$post['source'].'">'.$post['source'].'</a>':'').'</p>';
  }
  
  else{
    echo '<div class="post_inner">';
    echo '<h2><a href="'.$url.'" class="post_link">'.$post['title'].'</a></h2>';    
    $body = explode('<br><br>',$post['content']);
    echo $this->typography->auto_typography($body[0]).' '.$post['summary'];
    echo '</div>';

    echo '<p class="info"><span class="author">Posted by '.$first_name.'</span><span class="info_separator"> on </span><span class="post_date"><span class="day">'.date("D",$time).'</span><span class="date">'.date("j",$time).'</span><span class="month">'.date("M",$time).'</span><span class="year">'.date("Y",$time).'</span></span>'.($plus_one?'<span class="plus_one"><g:plusone size="small" count="false" href="'.$url.'"></g:plusone></span>':'').($post['source']?'<br/>Source: <a href="'.$post['source'].'">'.$post['source'].'</a>':'').'</p>';

  } echo '</div>';
}?>
</div>

<?=$this->pagination->create_links()?>