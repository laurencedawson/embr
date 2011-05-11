<div class="posts">
<?php foreach($posts as $post){ ?>
  <?php
	if(strlen($post["youtube"]) ){
		echo "<div class=\"post index\">";	
		echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    	echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";	
		echo "<iframe class=\"youtube-player\" type=\"text/html\" width=\"538\" height=\"336\" src=\"http://www.youtube.com/embed/NWHfY_lvKIQ?wmode=transparent\" frameborder=\"0\"></iframe>";
				
	}else if(strlen($post["image"])){
         echo "<div class=\"post index image_padding\" >";
         echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\"><img class=\"image_box\" src=\"".(strstr($post["image"],"http") ? $post["image"] : base_url()."img/uploads/".$post["image"])."\" /></a>";
  		 echo "<div class=\"source left\">Reblogged 2 hours ago from: <a href=\"http://facebook.com\">Facebook.com</a></div>";
		 if( $post['source'] )
         echo "<div class=\"source\">Source: <a href=\"". $post['source']."\">". $post['source']."</a></div>";

	}else{		
		echo "<div class=\"post index\">";		
    	echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    	echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";
    	echo "<p>";
    	$body = explode("</p>",$post["content"]);
    	echo "".strip_tags($body[0])." ".$post['summary']."</p>";		
	}
    echo "</div>";
  ?>  
<?php } ?>
</div>

<?=$this->pagination->create_links()?>