<?echo validation_errors() ? "<div class=\"post\">".validation_errors()."</div>":''?>
<div class="post image_padding">  
<?//Open the post editor; if the form detects content, open in edit mode
  echo isset($update)?form_open('update','',array('hidden_title'=>$post['content']['title'])):form_open('create');

  //Add the comments and published checkboxes, fill in any previous values
  echo "<div class=\"right\">";
  echo form_checkbox('comments', 'accept', (isset($post_comments)?$post_comments:(isset($post['content']['comments'])?$post['content']['comments']:FALSE)));
  echo " <span class=\"pad\">Enable Comments</span>";
  echo form_checkbox('published', 'accept', (isset($post_published)?$post_published:(isset($post['content']['published'])?$post['content']['published']:TRUE)));
  echo " Published</div>";

  //Add the title label and input, fill in any previous values
  echo form_label('<b>Title</b> <i>(optional)</i><br/>');
  echo form_input(array('class'=>'title_box form_title','name'=>'title','value'=>(isset($post_title)?$post_title:(isset($post['content']['title'])?$post['content']['title']:''))));
	  
  //If editing an image post, only show the image post, fill in any previous values
  if(isset($post['content']['image']))	
    echo "<div class=\"bump\">".form_label('<b>Image Post URL</b><br/>').form_input( array('class'=>'post_image_box','name'=>'image','value'=>(isset($post_image) ? $post_image : (isset($post['content']['image']) ? $post['content']['image']:''))))."</div>";
	
  //If editing text post, only show the text post
  else if(isset($post['content']['content']))
    echo "<div class=\"bump\">".form_label('<b>Post</b><br/>', 'user_email', array( 'class' => 'post_label') ).form_textarea(array('id'=>'textarea','class' => 'content_box', 'name' => 'content', 'rows' => '8','value' => (isset($post['content']['content'])?$post['content']['content']:'')))."</div>";

  //Otherwise start a new post with text and image options
  else{
	echo "<div class=\"bump\">";
	echo "<div class=\"right\"><a class=\"aip\" href=\"#\">Switch to Image Post</a></div>";
	echo "<div class=\"right pad\"><a class=\"extra\" href=\"#\">More Options</a></div>";
	echo form_label('<b>Text Post</b><br/>', 'label', array( 'class' => 'post_label') );
    echo "<div class=\"text_area_wrapper\">";	
    echo form_textarea(array('id'=>'textarea','class'=>'content_box','name' =>'content','rows'=>'6','value'=>(isset($post['content']['content'])?$post['content']['content']:'')));
    echo "</div>";
    echo form_input(array('style'=>'display: none','class'=>'post_image_box','name'=>'image', 'value'=>(isset($post_image)?$post_image:(isset($post['content']['image'])?$post['content']['image']:''))));
    echo "</div>";
  }

  //Source, Categories and tags
  echo "<div class=\"extra_options_pane bump\">";
echo form_label('<b>Post Source URL</b> <i>(optional)</i><br/>').form_input( array('class'=>'post_source_box','name'=>'source','value'=>(isset($post_source) ? $post_source : (isset($post['content']['source']) ? $post['content']['source']:''))));
  echo "<div class=\"bump\">";
  echo "<div class=\"right\">";
  echo form_label('<b>Post Category</b><br/>');
  echo form_input( array('class'=>'post_tags_box','name'=>'tags','value'=>(isset($post_category) ? $post_category : (isset($post['content']['category']) ? $post['content']['category']:''))));
  echo "</div>";
  echo form_label('<b>Post Tags</b><br/>');
  echo form_input( array('class'=>'post_tags_box','name'=>'tags','value'=>(isset($post_category) ? $post_category : (isset($post['content']['category']) ? $post['content']['category']:''))));
  echo "</div></div>";

  //Show the submit and cancel options
  echo "<input type=\"submit\" name=\"submit\" value=\"Post\" class=\"submit bump\" />";
  echo "<input type=\"submit\" name=\"cancel\" value=\"Cancel\" class=\"cancel right bump\" />";
  
  //Close the form
  echo form_close();

  //If the reblog is set, print it out
  echo isset($reblog) ? "<a href=\"".$reblog_url."\">".$blog_title."</a>":''?>

</div>

<script src="<?=base_url()?>js/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas)</script>