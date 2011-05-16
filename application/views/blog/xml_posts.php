<?='<?xml version="1.0" encoding="utf-8"?>'?>
<post>
  <blog_title><?=$blog_title?></blog_title>
  <post_title><?=$post['content']['title']?></post_title>
  <post_content><?=$post['content']['content']?></post_content>
  <post_url><?=base_url().strtolower( str_replace(" ","-",$post['content']['title']) )?></post_url>
</post>