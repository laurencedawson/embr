<div class="posts">
<?php foreach($posts as $post){ ?>
  <?php 
	if(strlen($post["youtube"]) ){
		echo "<div class=\"post index\">";	
		echo "<h2><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    	echo "<p class=\"info\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>";	
		echo "<iframe class=\"youtube-player\" type=\"text/html\" width=\"538\" height=\"336\" src=\"http://www.youtube.com/embed/NWHfY_lvKIQ?wmode=transparent\" frameborder=\"0\"></iframe>";
				
	}else if(strlen($post["image"])){
		$obj = getimagesize(base_url().'img/uploads/'.$post["image"]);
		$width = $obj[0];				
		$ratio = 576 / $width = $obj[0];
		$height = ($obj[1]*$ratio) - 2;		
		echo "<div class=\"post index\" style=\"height:".$height."px; padding:0px\" >";	
			echo "<a href=\"".base_url().strtolower(url_title($post["title"]))."\"><img src=\"".base_url()."img/uploads/".$post["image"]."\" width=\"574\" height=\"".$height."\"/></a>";			   
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