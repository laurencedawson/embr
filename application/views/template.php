<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?= $title ?></title>
  <link rel="stylesheet" type="text/css" href="<?=base_url()."themes/".$style."/style.css"?>"/>
  
</head>
<body>
<div class="container">
  <h1><?= anchor('/', $blog_title, 'title="$blog_title"'); ?></h1>  
  <div class="navigation">
    <p><?= anchor('/about', 'about', 'title="about"'); ?> <?= anchor('/blog', 'blog', 'title="blog"'); ?></p>
  </div>  
  <?= $contents ?>
  <?= $tools ?>
  <?= $recent ?>
  <?= $comments ?>
  <div class="footer">
    <?= "Copyright &copy; 2011 ".$first_name." ".$last_name.". All Rights Reserved"?> | Powered by <a href="https://github.com/laurencedawson/codeigniter-blog">codeigniter-blog</a>
  </div>  
</div>

   
</body>
</html>