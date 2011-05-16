<?if($msg&&$msg!="min"){
  echo "<div class=\"post\">";
  echo "<h3>".$msg."</h3>";
  echo "</div>";
} ?>

<div class="post" style="margin-bottom:10px"> 
  <?php 
    echo form_open('admin/authenticate');
    
    echo "<div class=\"login\">";
      echo form_label('Email', 'user_email');
      echo "<br/>";
      echo form_input(array('class' => 'login_box', 'name' => 'user[email]', 'id' => 'user_email'));
    echo "</div>";

    echo "<div class=\"login\">";    
      echo form_label('Password', 'user_password');
      echo "<br/>";
      echo form_password(array('class' => 'login_box', 'name' => 'user[password]', 'id' => 'user_password'));
    echo "</div>";
    
    echo "<br/>";
    echo "<input type=\"submit\" name=\"submit\" value=\"Login\" class=\"submit\" />";
    echo form_close();
    echo "<br/>";
  ?>
</div>