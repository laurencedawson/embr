<?php
class Admin extends CI_Controller{
	
  /*
   * Constructor for the Admin class
   */
  public function __construct()
  {
    parent::__construct();
    $this->db = $this->load->database('blog', TRUE);
	
	//Load the template library
	$this->load->library('template');
	
	//Load the url and form helpers
	$this->load->helper('form');
  }

  /**
    * The default entry point for Admin
    */
  function index( $min = null)
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login/'.$min);
      
    // Pass the users info through
    $data = $this->data_model->getSiteData();
    
	//If requested, set the template to the minified version
	if( $min == "min" ) $this->template->set_master_template('min_template.php');	

    $this->template->write('title', 'Admin');
    $this->template->write_view('contents', 'admin/index', $data);
    $this->template->render();  	
  }

  /**
    * Login page for users; also displays error messages
    * @param string $msg
    */
  function login( $msg = null )
  {
	if ($this->session->userdata('loggedin'))
      redirect('admin');
	
    // Pass the users info through
    $data = $this->data_model->getSiteData();

	// Alert the user to any errors
	$data['msg'] = $msg;
	
	//If requested, set the template to the minified version
	if( $msg == "min" ) $this->template->set_master_template('min_template.php');
	      
    $this->template->write('title', 'Admin Login');
    $this->template->write_view('contents', 'admin/login', $data);
    $this->template->render();
  }
  
  /**
    * Authenticate a users account credentials
    */
  function authenticate()
  {	
	//Load the encrypt library
	$this->load->library('encrypt');
	
    $user = $this->input->post('user');    
    $this->load->model('user_model');
	$res = $this->user_model->authenticate($user['email'], $user['password']);
	
	if( $res == 1 ){
	  $this->session->set_userdata('loggedin', true);        
	  redirect( $_SERVER['HTTP_REFERER'] );
	}
	else if( $res == 2 )
	  $this->login('That account has been locked for 15mins or so. Try again later.');
	else
	  $this->login('Bad username or pass, try again.');
  }

  /**
    * Log a user out
    */  
  function logout()
  {
    $this->session->unset_userdata('loggedin');
	redirect( $_SERVER['HTTP_REFERER'] );
  }


  /**
    * Create a new post
    */
  function new_post( $reblog = null )
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

    // Pass the users info through
    $data = $this->data_model->getSiteData();
    
/* Currently removed the reblog feature
	// Check if reblog URL is set to true
	if( $reblog ){
	  $ch = simplexml_load_file($reblog);
	  $data['reblog'] = TRUE;
	  $data['blog_title'] = $ch->blog_title;
	  $data['reblog_title'] = $ch->post_title;
	  $data['reblog_content'] = $ch->post_content;
	  $data['reblog_url'] = $ch->post_url;
    }
*/	

    $this->template->write('title', 'New Post');
    $this->template->write_view('contents', 'admin/editor', $data);
    $this->template->render();
  }


  /**
    * Edit a new post
    */
  function edit( $id )
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

    // Pass the users info through
    $data = $this->data_model->getSiteData();

	// Get the current post
    $post = $this->blog_model->getPost( str_replace("-"," ",$id ) );
    
    if( !isset( $post['content'] ) )
      show_404();
    
	// Put the contents of the post into the data array
    $data['post'] = $post;
	$data['update'] = TRUE;

    $this->template->write('title', 'Edit Post');
    $this->template->write_view('contents', 'admin/editor', $data);
    $this->template->render();
  }

  /**
    * Delete a post
    */
  function delete( $id )
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

	// Delete the post
    $post = $this->blog_model->delete( str_replace("-"," ",$id ) );

    // Redirect to the main page
    redirect('/');
  }

  /**
    * View the blog settings
    */
  function customize()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

    // Pass the users info through
    $data = $this->data_model->getSiteData();

    $this->template->write('title', 'Customize');
    $this->template->write_view('contents', 'admin/customize', $data);
    $this->template->render();
  }

  /*
   * With valided data create a new post
   */
  private function create_validated_post( $image_post )
  {
    //Grab the title, if there isn't a title, epoch it
    $post['title'] = $this->input->post('title') ? $this->input->post('title') : time();

	//Grab the image, content, source, comments and published
    $post['image'] = $image_post ? $this->input->post('image') : NULL;
    $post['content'] = $image_post ? NULL : $this->input->post('content');
    $post['source'] = $this->input->post('source');
    $post['comments'] = $this->input->post('comments');
    $post['published'] = $this->input->post('published');

    //Submit the data to the model
    $this->blog_model->create( $post );

    //Redirect to the newly created post
	redirect( str_replace(" ","-",$post['title']) );
  }

  /*
   * Create a new image or text post (called by completing a form)
   */
  function create()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');	
    
    //Check the user pressed submit
	$my_action = $this->input->post("submit");
    if ($my_action == "Post") {
	  
      //Load the validation library
	  $this->load->library('form_validation');
	  //Set the formatting of any error messages
      $this->form_validation->set_error_delimiters('<h3>', '</h3>');
      //Set the rule that the title must comply with alpha_dash_space
      $this->form_validation->set_rules('title', 'Title', 'alpha_dash_space');
      
      //Check if the user has entered an image
      $image = $this->input->post('image');
      $image_post = ( isset($image) && strlen($image) );

      //Set the rule that an image post requires a valid image and data OR Set the rule that a text post requires valid content
      $image_post ? $this->form_validation->set_rules('image', 'Image', 'required|valid_url') : 
        $this->form_validation->set_rules('content', 'Content', 'required|trim|isnt');
	  
	  //If the form passes validation create the new post
      if ($this->form_validation->run() == TRUE)
        $this->create_validated_post( $image_post );
	  else{
        // Pass the users info through	
	    $data = $this->data_model->getSiteData();

	    //Manually setting values as set_value doesn't seem to be working
	    //http://codeigniter.com/user_guide/libraries/form_validation.html#repopulatingform
	    $data['post_title'] = $this->input->post('title');
	    $data['post_image'] = $this->input->post('image');
	    $data['source'] = $this->input->post('source');	
	    $data['post_comments'] = $this->input->post('comments')=='accept' ? TRUE : FALSE;
	    $data['post_published'] = $this->input->post('published')=='accept' ? TRUE : FALSE;

	    //Write the form out again, keeping the values
	    $this->template->write('title', 'New Post');
	    $this->template->write_view('contents', 'admin/editor', $data);
	    $this->template->render();
	  }
    }
    else //Otherwise the user has cancelled so redirect to the last page they were on
      redirect( '/' );
  }

  /*
   * Updates a text or image post
   * TODO add form validation
   */
  function update()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');	

    //Check the user pressed submit
	$my_action = $this->input->post("submit");
    if ($my_action == "Post") {
	
	  //Check if the user has entered an image
	  $image = $this->input->post('image');
	  $image_post = ( isset($image) && strlen($image) );

      //Grab the hidden title incase the user has changed the title
      $post['hidden_title'] = $this->input->post('hidden_title');
      //Grab the title, if there isn't a title, epoch it
      $post['title'] = $this->input->post('title') ? $this->input->post('title') : time();

      //Grab the image, content, comments and published
      $post['image'] = $image_post ? $this->input->post('image') : NULL;
      $post['content'] = $image_post ? NULL : $this->input->post('content');
      $post['source'] = $this->input->post('source');
      $post['comments'] = $this->input->post('comments');
      $post['published'] = $this->input->post('published');

      //Update the posts
      $this->blog_model->update( $post );

      //Redirect to the post
	  redirect( strtolower(str_replace(" ","-",$this->input->post('title'))) );
    }
    
    else //Otherwise redirect to post
	  redirect( strtolower(str_replace(" ","-",$this->input->post('title'))) );
  }


  /*
   * Reblogs a post, needs quite a bit of work still
   */
  function reblog( $url = null ){
	//Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');
	
	//Create a new post, pass the url through
    $this->new_post( prep_url(base64_decode($url)."/xml") );
  }

}