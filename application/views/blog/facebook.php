<meta property="og:title" content="<?=$post['content']['title']?>" />
<meta property="og:type" content="blog" />
<meta property="og:url" content="<?=base_url().str_replace(" ","-",strtolower(url_title($post['content']['title'])))?>" />
<? 
  if( isset( $post['content']['image'] ) )
    echo "<meta property=\"og:image\" content=\"".$post['content']['image']."\" />";
  else
    echo "<meta content=\"".substr(strip_tags($post['content']['content']),0,200 )."...\" name=\"description\" />";
?>
<meta property="og:site_name" content="<?=$blog_title?>"/>