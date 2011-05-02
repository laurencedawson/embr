<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <title><?=$title?></title>
  <!-- TODO add meta tags -->
  <meta name="author" content="<?=$first_name." ".$last_name?>">
  <link rel="stylesheet" href="<?=base_url()."themes/".$style."/style.css"?>">
   <link href="<?=base_url()."rss"?>" rel="alternate" type="application/rss+xml" title="<?= $blog_title ?>" />
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
        <a href="#">Example Page</a> | <a href="#">Contact</a> 
		<? if (!strstr(uri_string(),"admin") )
		     echo "<a class=\"lg\" href=\"".base_url()."admin\">| Admin </a>" ?>
      </div>
      <h2><?=$tagline?></h2>
    </div>

    <?= $contents ?>
    <?= $tags ?>
    <?= $comments ?>     

    <div class="footer">
        <?="Copyright &copy; 2011 <b>".$first_name." ".$last_name."</b>. All Rights Reserved"?> | Powered by <a href="https://github.com/laurencedawson/codeigniter-blog">codeigniter-blog</a>      
    </div>  
	<div class="key_spacer"></div>
    
  </div>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?=base_url()."js/index.js"?>"></script>  
  
  <? if (strlen($google_analytics) > 0) { ?><script>
    var _gaq=[["_setAccount","<?= $google_analytics ?>"],["_trackPageview"]];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script> <? } ?>
  
</body>
</html>
