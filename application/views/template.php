<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?= $title ?></title>
  <link rel="stylesheet" type="text/css" href="<?=base_url()."themes/".$style."/style.css"?>"/>
</head>
<body>

<div class="container">
  <!--<div class="nav"><?= anchor('/', "About", 'title="About"'); ?> <?= anchor('/', "about", 'title="About"'); ?></div>-->
  <h1><?= anchor('/', $blog_title, 'title="$blog_title"'); ?></h1>    
  <?= $contents ?>
  <?= $tools ?>
<!--  <?= $recent ?> -->
<!--  <?= $related ?>  -->
<!--  <?= $comments ?>-->
  <div class="footer">
    <?= "Copyright &copy; 2011 <b>".$first_name." ".$last_name."</b>. All Rights Reserved"?> | Powered by <a href="https://github.com/laurencedawson/codeigniter-blog">codeigniter-blog</a>
  </div>  
</div>

   
</body>
</html>