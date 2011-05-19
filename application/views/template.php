<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <meta name="viewport" content="width=636" />
  <title><?=$title?></title>
  <? if( $facebook_connect )
        echo $facebook_connect;
      else
		echo "<meta property=\"og:title\" content=\"$blog_title\" />";
        echo "<meta property=\"og:url\" content=\"".base_url()."\" />";
		echo "<meta property=\"og:description\" content=\"".$site_description."\" />";
		echo "<meta property=\"og:type\" content=\"blog\" />"?>
  <meta name="author" content="<?=$first_name." ".$last_name?>">
  <link rel="stylesheet" href="<?=base_url()."themes/".$style."/style.css"?>"/>
  <link rel="stylesheet" href="<?=base_url()."themes/basics.css"?>"/>
  <link href="<?=base_url()."themes/mobile/style.css"?>" media="screen and (max-device-width: 480px), screen and (-webkit-min-device-pixel-ratio: 2)" rel="stylesheet" type="text/css" /> 
  <link href="<?=base_url()."rss"?>" rel="alternate" type="application/rss+xml" title="<?= $blog_title ?>" />
  <link type="text/plain" rel="author" href="<?=base_url()."humans.txt"?>" />
</head>

<body>
  <?=$debug?$this->benchmark->elapsed_time():''?>
  
   <a href="https://github.com/laurencedawson/embr"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://d3nwyuy0nl342s.cloudfront.net/img/bec6c51521dcc8148146135149fe06a9cc737577/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub"></a> 

  <div id="container">

    <div class="header">
      <h1><?= anchor('/', $blog_title, 'title="'.$blog_title.'"')?></h1> 
	  <div class="navigation right">
		<? if( !strstr(uri_string(),"admin/login") && !strstr(uri_string(),"admin/authenticate") )
		     echo "<a class=\"lg\" href=\"".base_url()."admin\">Admin </a>"?><?=$legend?"<a class=\"legend\" href=\"#\">Legend</a>":''?>
      </div>
      <h2><?=$tagline?></h2>
    </div>

    <?= $contents ?>
    <?= $tags ?>
    <?= $comments ?>     

    <div class="footer">
      <div class="embr"><p>Powered by <a href="https://github.com/laurencedawson/embr"><img src="<?=base_url()?>img/embr.png"/></a></p></div>
      <p><?="Copyright &copy; 2011 <b>".$first_name." ".$last_name."</b>. All Rights Reserved."?></p>
    </div>  

    <? if($legend){ ?>
	<div class="key_spacer"></div>
	<div class="cover">
      <div class="controls">
        <h2><?=$blog_title?> - Keyboard Shortcuts</h2>
        <img src="<?=base_url()."img/keyboard.png"?>"/><br/>
        <span class="pad"><strong>J</strong> - next post</span>
        <span><strong>K</strong> - previous post</span>
      </div>
	</div><?}?>
   
  </div>

  <script type="text/javascript" src="///code.jquery.com/jquery-1.6.1.min.js"></script>
  <script http-equiv="content-script-type" type="text/javascript" src="<?=base_url()."js/embr.js"?>"></script>  
  <? if(strlen($google_analytics)){ ?><script>
    var _gaq=[["_setAccount","<?= $google_analytics ?>"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script> <? } ?>  
</body>
</html>