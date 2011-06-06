<ul class="toolbox">
  <li class="toolbox_element delete delete"><a href="<?=base_url()?>delete/<?=strtolower( str_replace(" ","-",$post['content']['title']) )?>">Delete</a>
  <li class="toolbox_element edit"><a href="<?=base_url()?>edit/<?=strtolower( str_replace(" ","-",$post['content']['title']) )?>">Edit</a>
  <li class="toolbox_element reblog_element retweet"><strong>Reblog</strong><span class="hidden_url"><?=base64_encode($_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"])?></span>
</ul>

<div class="post">
<?
  $time = strtotime ($post['content']["datet"]);
  $url = base_url().strtolower(url_title($post['content']['title']));

  //Check for an image, if present create an image post
  if(strlen($post['content']['image'])){
    echo "<a href=\"".$post['content']['image']."\"><img alt=\"".$post['content']['title']."\" class=\"image_box\" src=\"".(strstr($post['content']['image'],"http") ? $post['content']['image'] : base_url()."img/uploads/".$post['content']['image'])."\" /></a>";
    echo '<div class="post_date image_date"><span class="day">'.date('D',$time).'</span><span class="date">'.date('j',$time).'</span><span class="month">'.date('M',$time).'</span><span class="year">'.date('Y',$time).'</span></div></a>';
    echo '<p class="picture_info">'.($plus_one?'<span class="plus_one"><g:plusone size="small" count="false" href="'.$url.'"></g:plusone></span>':'').($post['content']['source']?'<span class="source"><a href="'.$post['content']['source'].'">'.$post['content']['source'].'</a></span>':'').'<span class="author">Posted by '.$first_name.'</span><span class="info_separator"> on </span><span class="post_date"><span class="day">'.date("D",$time).'</span><span class="date">'.date("j",$time).'</span><span class="month">'.date("M",$time).'</span><span class="year">'.date("Y",$time).'</span></span></p>';
  }

  //Otherwise assume the post is a text post
  else{
    echo "<h2>".$post['content']['title']."</h2>";    
    echo $this->typography->auto_typography( $post['content']['content'] );

echo '<p class="info">'.($plus_one?'<span class="plus_one"><g:plusone size="small" count="false" href="'.$url.'"></g:plusone></span>':'').($post['content']['source']?'<span class="source"><a href="'.$post['content']['source'].'">'.$post['content']['source'].'</a></span>':'').'<span class="author">Posted by '.$first_name.'</span><span class="info_separator"> on </span><span class="post_date"><span class="day">'.date("D",$time).'</span><span class="date">'.date("j",$time).'</span><span class="month">'.date("M",$time).'</span><span class="year">'.date("Y",$time).'</span></span>'.($post['content']['category']?' in <a href="'.base_url().'category/'.strtolower( str_replace(' ','-',$post['content']['category']) ).'">'.$post['content']['category'].'</a>':'');

if (count($post['tags']) && FALSE ){
  echo '<br/>Tags: ';
  $count = 0;
  foreach ($post['tags'] as $tag){
    echo "<a href=\"".base_url()."tag/".strtolower(str_replace(" ","-",$tag['tag']))."\">".$tag['tag']."</a>";
    echo $count < count($post['tags'])-1?', ':'';
    $count++;
  }
}
echo '</p>';



  }
?>

</div>