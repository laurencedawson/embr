<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?=$opengraph?>
  <title><?=($title?$title.' - ':'').$blog_title?></title>
  <link rel="stylesheet" href="<?=base_url().'combined.css'?>"/>
  <link href="<?=base_url()?>rss" rel="alternate" type="application/rss+xml" title="<?=$blog_title?>"/>
  <?=$mobile?>
</head>

<body>
  <?=$debug?>

    <header>
      <h1><?= anchor('/', $blog_title, 'title="'.$blog_title.'"')?></h1>
      <h2><?=$tagline?></h2>
      <nav><?=(!strstr(uri_string(),'admin/login')?'<a class="lg" href="'.base_url().'admin">Admin</a>':'').($legend?'<a class="legend" href="#">Legend</a>':'').anchor('/rss', 'RSS', 'title="RSS"')?></nav>
    </header>	

    <?= $contents ?>
    <?= $tags ?>
    <?= $comments ?>
    <?= $legend ?>

    <footer>
      <ul><li class="embr_link"><a href="http://embr.co"></a></ul>
      <p><?='Copyright &copy; 2011 <b>'.$first_name.' '.$last_name.'</b>. All Rights Reserved.'?></p>
    </footer>
    <div class="key_spacer"></div>

  <?= $analytics ?>
  <script src="///ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script async src="<?=base_url()."js/embr.js"?>"></script>
  <script async src="<?=base_url()."js/plugins.js"?>"></script>
  <script async src="<?=base_url()."themes/".$style."/scripts.js"?>"></script>
  <script type="text/javascript" src="http://apis.google.com/js/plusone.js">{parsetags: 'explicit'}</script>

</body>
</html>