<?='<?xml version="1.0" encoding="utf-8"?>' . "\n"?>
<rss version="2.0"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
  xmlns:admin="http://webns.net/mvcb/"
  xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
  <atom:link href="<?=$feed_url?>" rel="self" type="application/rss+xml"/>
  <title><?php echo $feed_name; ?></title>
  <link><?php echo $feed_url; ?></link>
  <description><?=$page_description?></description>
  <dc:language><?=$page_language?></dc:language>
  <dc:creator><?=$creator_email?></dc:creator>
  <dc:rights>Copyright <?=gmdate("Y", time())?></dc:rights>
  <admin:generatorAgent rdf:resource="http://www.codeigniter.com/"/>
<?php foreach($posts as $post): ?>
  <item>
  <title><?=xml_convert($post["title"])?></title>
  <link><?=base_url().strtolower(url_title($post["title"])) ?></link>
  <guid><?=base_url().strtolower(url_title($post["title"])) ?></guid>
  <description><![CDATA[<?=$post['image'] ? "<img src=\"".base_url()."img/uploads/".$post["image"]."\"/>":$post["content"]?>]]></description>
  <pubDate><?php echo date(DateTime::RFC2822 ,strtotime ($post["datet"])) ;?></pubDate>
  </item>
<?php endforeach; ?>
</channel>
</rss>