<div class="post image_padding">
<?
  $attributes = array('class' => 'email', 'id' => 'myform');
  echo form_open('admin/create', $attributes );

  echo "<div class=\"right\">";
  echo form_checkbox('comments', 'accept', FALSE);
  echo " <span class=\"pad\">Enable Comments</span>";
  echo form_checkbox('published', 'accept', TRUE);
  echo " Published</div>";
//  echo form_checkbox('comments', 'accept', TRUE);
//  echo form_label('<b>Title</b> <i>(optional)</i>', 'user_email');

      echo form_label('<b>Title</b> <i>(optional)</i>');
      echo "<br/>";
      echo form_input(array('class' => 'title_box', 'name' => 'title' ));
	  echo "<br/><br/>";
	  
	  echo form_label('<b>Post</b>', 'user_email');
      echo "<br/>";
      echo form_textarea(array('class' => 'title_box', 'name' => 'content', 'rows' => '8'));

    echo "<br/>";echo "<br/>";
    echo "<input type=\"submit\" name=\"submit\" value=\"Post\" class=\"submit\" />";
    echo "<input type=\"submit\" name=\"cancel\" value=\"Cancel\" class=\"cancel right\" />";




    echo form_close();
	
?>	
	
</div>