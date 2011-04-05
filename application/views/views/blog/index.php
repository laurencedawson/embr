<div class="posts">

<?php foreach($posts as $post){ ?>
  <?php 
    echo "<div class=\"post theme index\">";
    echo "<h2 class=\"blogH2\"><a href=\"".base_url().strtolower(url_title($post["title"]))."\">".$post["title"]."</a></h2>";
    echo "<p class=\"blogP\">by $first_name on ".date("l dS F\, Y",strtotime ($post["datet"]))."</p>"; 

    echo "<p>";
    $body = explode("</p>",$post["content"]);
    echo "".strip_tags($body[0])." ".$post['summary']."</p>";
    echo "</div>";
  ?>  
<?php } ?>
</div>

<?php 
  echo $this->pagination->create_links();
?>