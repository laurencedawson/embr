<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <meta name="viewport" content="width=636" />
  <title><?=$title?></title>
  <!-- TODO add meta tags -->
  <meta name="author" content="<?=$first_name." ".$last_name?>">
  <link rel="stylesheet" href="<?=base_url()."themes/".$style."/style.css"?>"/>
  <link href="<?=base_url()."themes/mobile/style.css"?>" 
	media="screen and (max-device-width: 480px), screen and (-webkit-min-device-pixel-ratio: 2)" rel="stylesheet" type="text/css" /> 




  <link href="<?=base_url()."rss"?>" rel="alternate" type="application/rss+xml" title="<?= $blog_title ?>" />
  <link type="text/plain" rel="author" href="<?=base_url()."humans.txt"?>" />
</head>

<body>
  <? if ( !strstr(uri_string(),"admin") && !strstr(uri_string(),"blog/archive/") ) $this->session->set_userdata('redirect', current_url() ) ?>  

  <div class="header_slide">
    <h3><?= anchor('/', $blog_title, 'title="'.$blog_title.'"')?></h3>
  </div>
  
  <div id="container">		
	
    <div class="header">
      <h1><?= anchor('/', $blog_title, 'title="'.$blog_title.'"')?></h1> 
	  <div class="navigation right">
		<? if (!strstr(uri_string(),"admin") )
		     echo "<a class=\"lg\" href=\"".base_url()."admin\">Admin </a><a class=\"legend\" href=\"\">Legend</a>" ?>
      </div>
      <h2><?=$tagline?></h2>
    </div>
    <?= $contents ?>
    <?= $tags ?>
    <?= $comments ?>     

    <div class="footer">
		<div class="embr"><p>Powered by <a href="https://github.com/laurencedawson/codeigniter-blog"><img src="<?=base_url()?>img/embr.png"/></a></p></div>
        <p><?="Copyright &copy; 2011 <b>".$first_name." ".$last_name."</b>. All Rights Reserved."?></p>

    </div>  
	<div class="key_spacer"></div>
	<div class="cover">
		<div class="controls">
			<h2><?=$blog_title?> - Keyboard Shortcuts</h2>
			<img src="<?=base_url()."img/keyboard.png"?>"/><br/>
			<span class="pad"><strong>V</strong> - view post</span>
			<span class="pad"><strong>J</strong> - next post</span>
			<span><strong>K</strong> - previous post</span>
		</div>
	</div>
	    
  </div>

  <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.min.js"></script>
  <script type="text/javascript" src="<?=base_url()."js/index.js"?>"></script>  
  
  <? if (strlen($google_analytics) > 0) { ?><script>
    var _gaq=[["_setAccount","<?= $google_analytics ?>"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script> <? } ?>
  
</body>
</html>
