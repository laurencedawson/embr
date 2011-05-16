<?php
class Blog extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

	//Check if the database needs setting up
    $this->load->model('setup_model');
    if( !$this->setup_model->checkDatabase() ){
	  //If so add the tables to the database 'blog'
	  $this->db = $this->load->database('blog', TRUE);
      $this->setup_model->addTables();
 	}else
	  //Load the database model as usual
      $this->db = $this->load->database('blog', TRUE);
	
	//Load the template library
	$this->load->library('template');
	
	//Load the url and form helpers
	$this->load->helper('form');
  }

  /**
    * The default entry point for blog
    * @param int $page
    */
  function index( $page = '0', $message = null )
  {
	//Cache output
	$this->output->cache( 5 );
	
	//Load the typography library
	$this->load->library('typography');
	//Load the pagination library
	$this->load->library('pagination');
	
    // Setup pagination    
    $config['base_url'] = base_url().'blog/archive';
    $config['total_rows'] = $this->db->count_all('blog');
    $this->pagination->initialize($config);
           
    // Pass the users info through
    $data = $this->data_model->getSiteData();
    
    // Load the posts for the index page
    $data['posts'] = $this->blog_model->getPosts( 5, $page );
    
    // Write to the template and render
    $this->template->write('title', 'Blog');
    $this->template->write_view('contents', 'blog/index', $data);
    $this->template->render();

  }
	
  /**
    * Duplicate entry point for blog with checking
    * @param int $page
    */  
  function archive( $page = null )
  {
    if( $page < $this->db->count_all('blog') )       
      $this->index( $page );
    else
      show_404();
  }

  /**
    * View an individual post
    * @param int $id
    * @param bool $xml
    */
  function posts( $id = null, $xml = null )
  {    
    $this->output->cache(3600);

    if( $id == null)
      show_404();
    
    // Pass the users info through
    $data = $this->data_model->getSiteData();

	//Load the typography library
	$this->load->library('typography');
    
    // Get the current post
    $post = $this->blog_model->getPost( str_replace("-"," ",$id ) );
    
    if( !isset( $post['content'] ) )
      show_404();
    
	// Put the contents of the post into the data array
    $data['post'] = $post;

    //Write the post as XML
	if( $xml )
      $this->load->view('blog/xml_posts', $data);
    else{    
      // Write to the view
	  $this->template->write('title', $data['post']['content']['title'] );
	  $this->template->write_view('facebook_connect', 'blog/widgets/facebook', $data);
      $this->template->write_view( 'tags', 'blog/widgets/tags', $data );
      $this->template->write_view( 'comments', 'blog/comments', $data );
      $this->template->write_view( 'contents', 'blog/posts', $data );
      $this->template->render();
    }
  }

  /**
    * View all posts with a given tag
    * @param string $tag
    * @param int $page
    */
  function tag( $tag = null, $page = 0 )
  {	
    // Set the cache duration
    $this->output->cache(3600);
    
    // Pass the users info through
    $data = $this->data_model->getSiteData();

	//Load the typography library
	$this->load->library('typography');
	//Load the pagination library
	$this->load->library('pagination');
    
    // Load the related posts
    $data['tag'] = $tag;
    
    // TODO somehow remove this step
    // Count how many related posts there are
    $data['count'] = count( $this->blog_model->getRelatedPostsTags( str_replace("-"," ",$tag) ) );
            
    // Load the posts with the related tags
    $data['posts'] = $this->blog_model->getRelatedPostsTags( str_replace("-"," ",$tag), 5, $page );
    
    // Setup pagination    
    $config['base_url'] = base_url().'tag/'.$tag;
    $config['total_rows'] = $data['count'];
    $this->pagination->initialize($config);
      
    // Write to the view                  
    $this->template->write_view('contents', 'blog/tags', $data);
    $this->template->render();  
  }

  /**
    * View all posts with a given category
    * @param string $cat
    * @param int $page
    */	
  function category( $cat = null, $page = 0 )
  {		
    // Set the cache duration
    $this->output->cache(3600);
    
    // Pass the users info through
    $data = $this->data_model->getSiteData();

	//Load the typography library
	$this->load->library('typography');
	//Load the pagination library
	$this->load->library('pagination');
    
    // Load the related posts
    $data['category'] = $cat;
    
    // Load the posts with the related tags
    $data['posts'] = $this->blog_model->getRelatedPostsCategory( str_replace("-"," ",$cat), 5, $page );                 
    
    // Count how many related posts there are
    $data['count'] = count( $this->blog_model->getRelatedPostsCategory( str_replace("-"," ",$cat) ) );
    
    // Setup pagination    
    $config['base_url'] = base_url().'category/'.$cat;
    $config['total_rows'] = $data['count'];
    $this->pagination->initialize($config);
    
    $this->template->write_view('contents', 'blog/category', $data);
    $this->template->render();  
  }

}