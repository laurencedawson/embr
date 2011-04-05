 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?= $title ?></title>
  <link rel="stylesheet" type="text/css" href="<?=base_url()."themes/".$style."/style.css"?>"/>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url()."js/index.js"?>"></script></script> 
</head>
<body>
<div class="header_slide"><?="<h3 class=\"sliderH1\"> &raquo; ".$blog_title."</h3>"?></div>

<div id="container">
  <div class="header">
    <h1><?= anchor('/', $blog_title, 'title="$blog_title"')?></h1>
    <h2 class="tagline">Insert witty tagline here.</h2>
  </div>
  <?= $contents ?>
  <?= $tools ?>
  <?= $comments ?>
  <div class="footer">
    <?="Copyright &copy; 2011 <b>".$first_name." ".$last_name."</b>. All Rights Reserved"?> | Powered by <a href="https://github.com/laurencedawson/codeigniter-blog">codeigniter-blog</a>
  </div>  
</div>
</body>
</html>