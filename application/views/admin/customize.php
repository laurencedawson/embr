<div class="post">
  <h2>Basic Settings - Prototype</h2>
</div>

<div class="post">	
<?
echo form_open('update_settings');

echo form_label('<b>Blog Title</b>','blog_title',array('class'=>'settings_label'));
echo form_input( array('class'=>'settings_element','name'=>'image','value'=>'Example Blog'));
echo '<br/><br/>';

echo form_label('<b>Tagline</b>','tagline',array('class'=>'settings_label'));
echo form_input( array('class'=>'settings_element','name'=>'image','value'=>'Insert witty tagline here.'));
echo '<br/><br/>';

echo form_label('<b>First Name</b>','first_name',array('class'=>'settings_label'));
echo form_input( array('class'=>'settings_element','name'=>'image','value'=>'Laurence'));
echo '<br/><br/>';

echo form_label('<b>Last Name</b>','last_name',array('class'=>'settings_label'));
echo form_input( array('class'=>'settings_element','name'=>'image','value'=>'Dawson'));
echo form_close();

?>
<br/>

</div>