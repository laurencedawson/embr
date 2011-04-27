<?php
  echo "<div class=\"tags\">";
  echo "<p>Tags: ";
    $count = 0;
    foreach ($post['tags'] as $tag){
      echo "<a href=\"".base_url()."tag/".strtolower(str_replace(" ","-",$tag['tag']))."\">".$tag['tag']."</a>";
      if( $count < count($post['tags'])-1 )
        echo ", ";
      $count++;
    } echo "</p></div>";
?>