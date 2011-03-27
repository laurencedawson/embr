<div class="tools">

<p>Posted in: <?=$post[0]['category']?> | Tags: 
<?php 
	$count = 0;
	foreach ($tags as $tag){		
		echo $tag['tag'];
		if( $count < count($tags)-1 ){
			echo ", ";
		}
		$count++;
 	}
?> | <a class="feed" href="http://laurencedawson.com/rss.xml">Subscribe</a></p>

</div>