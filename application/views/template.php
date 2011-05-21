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
  <link rel="stylesheet" href="<?=base_url()."themes/basics.css"?>"/>
  <link rel="stylesheet" href="<?=base_url()."themes/".$style."/style.css"?>"/>
  <link href="<?=base_url()."themes/mobile/style.css"?>" media="screen and (max-device-width: 480px), screen and (-webkit-min-device-pixel-ratio: 2)" rel="stylesheet" type="text/css" /> 
  <link href="<?=base_url()."rss"?>" rel="alternate" type="application/rss+xml" title="<?= $blog_title ?>" />
  <link type="text/plain" rel="author" href="<?=base_url()."humans.txt"?>" />  
</head>

<body>
  <?=$debug?$this->benchmark->elapsed_time():''?>
  

  <div id="container">

    <div class="header">
      <h1><?= anchor('/', $blog_title, 'title="'.$blog_title.'"')?></h1> 
      <h2><?=$tagline?></h2>
	  <div class="navigation">
		<? if( !strstr(uri_string(),"admin/login") && !strstr(uri_string(),"admin/authenticate") )
		     echo "<a class=\"lg\" href=\"".base_url()."admin\">Admin </a>"?><?=($legend?"<a class=\"legend\" href=\"#\">Legend</a> ":'').anchor('/rss', 'RSS', 'title="RSS"')?>
      </div>

    </div>

    <?= $contents ?>
    <?= $tags ?>
    <?= $comments ?>     

    <div class="footer">
      <div class="embr"><ul><li class="embr_link"><a href="http://embr.co"></a></li></ul></div>
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
  <? $loc = "themes/".$style."/additional.php"; if (is_file($loc)) include $loc ?>
  <? if(strlen($google_analytics)){ ?><script>
    var _gaq=[["_setAccount","<?= $google_analytics ?>"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script> <? } ?>  
</body>
</html>