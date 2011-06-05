<div class="recent">
<h3>Recent Posts</h3>
<?php
	$data['titles'] = array();
	$output = "<p class=\"blog_recent\">";
	foreach( $recent as $title ){
		$output = $output."<a href=\"".base_url()."/".strtolower(url_title($title['title']))."\">".$title['title']."</a> - <i>".date("l dS F",strtotime ($title['datet']))."</i><br/>";
	} $output = $output."</p>";
	echo $output;
?>
</div>