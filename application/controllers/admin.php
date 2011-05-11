<?php
class Admin extends CI_Controller{
	
  public function __construct()
  {
    parent::__construct();
    $this->db = $this->load->database('blog', TRUE);
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
  function login( $msg = null ){
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
  function authenticate(){
	
    $user = $this->input->post('user');    
    $this->load->model('user_model');
	$res = $this->user_model->authenticate($user['email'], $user['password']);
	
	if( $res == 1 ){
	  $this->session->set_userdata('loggedin', true);        
	  redirect( $this->session->userdata('redirect') );
	}else if( $res == 2 )
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
	redirect( $this->session->userdata('redirect') );
  }


  /**
    * Create a new post
    */
  function new_post()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

    // Pass the users info through
    $data = $this->data_model->getSiteData();

    $this->template->write('title', 'New Post');
    $this->template->write_view('contents', 'admin/new', $data);
    $this->template->render();
  }


  /**
    * Edit a new post
    */
  function edit()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

    // Pass the users info through
    $data = $this->data_model->getSiteData();

    $this->template->write('title', 'Edit Post');
    $this->template->write_view('contents', 'admin/edit', $data);
    $this->template->render();
  }


  /**
    * View the blog settings
    */
  function settings()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');

    // Pass the users info through
    $data = $this->data_model->getSiteData();

    $this->template->write('title', 'Settings');
    $this->template->write_view('contents', 'admin/settings', $data);
    $this->template->render();
  }


  function create()
  {
    //Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');	

    //Check the user pressed submit
	$my_action = $this->input->post("submit");
    if ($my_action == "Post") {

        //Create a new post
        $post['title'] = $this->input->post('title');
        $post['content'] = $this->typography->auto_typography( $this->input->post('content') );
        $post['comments'] = $this->input->post('comments');
        $post['published'] = $this->input->post('published');
		$this->blog_model->create( $post );
	    redirect( '/' );
    }
    //Otherwise redirect to the last page they were on
    else
	  redirect( $this->session->userdata('redirect') );
  }

  function reblog( $url = null ){
	//Check if the user is logged in  
    if (!$this->session->userdata('loggedin'))
      redirect('admin/login');
	
	// Pass the users info through
    $data = $this->data_model->getSiteData();

	//Save the url
	$data['reblog_url'] = prep_url(base64_decode($url));
	
    $this->template->write('title', 'Reblog');
    $this->template->write_view('contents', 'admin/new', $data);
    $this->template->render();


  }

}