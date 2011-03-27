<?php foreach($posts as $post){ ?>
  <?php 
    echo "<div class=\"post\">";
    echo "<h2><a href=\"".strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    echo "<p class=\"blogP\">Posted by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>"; 

    echo "<p>";
    $body = explode("</p>",$post["content"]);
    echo "".strip_tags($body[0])." ".$post['summary']." <a class=\"imp\" href=\"".strtolower(str_replace(" ","-",$post["title"]))."\"> Continue Reading</a></p>";
    echo "</div>";   
  ?>
  
<?php } ?>
