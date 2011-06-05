<meta property="og:site_name" content="<?=$blog_title?>"/>
<? if( isset( $post['content']['title'] ) ){
  echo "<meta property=\"og:title\" content=\"".$post['content']['title']."\"/>";
  echo "<meta property=\"og:type\" content=\"blog\"/>";
  echo "<meta property=\"og:url\" content=\"".base_url().str_replace(" ","-",strtolower(url_title($post['content']['title'])))."\"/>";
  echo (isset($post['content']['image']))?"<meta property=\"og:image\" content=\"".$post['content']['image']."\" />":"<meta content=\"".substr(strip_tags($post['content']['content']),0,200 )."...\" name=\"description\" />";
} else {
  echo "<meta property=\"og:title\" content=\"".$blog_title."\"/>";
  echo "<meta property=\"og:url\" content=\"".base_url()."\"/>";
  echo "<meta property=\"og:description\" content=\"".$site_description."\"/>";
  echo "<meta property=\"og:type\" content=\"blog\"/>";
} ?>