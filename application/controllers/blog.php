<?php

class Blog extends CI_Controller {

	public function __construct() { 
		parent::__construct(); 
	}
	
	function index( $page = null )
	{	
     	if( !isset($page) )
            $page = '0';
	
		// Set the cache duration
		$this->output->cache(3600);
		
		// Setup pagination
		$this->load->library('pagination');
         $per_page = 2;
         $config['base_url'] = 'http://blog.laurencedawson.com/blog/archive';
         $config['total_rows'] = $this->db->count_all('blog');
         $config['per_page'] = $per_page;       
         $config['next_link'] = 'Older Posts &raquo;';
         $config['prev_link'] = '&laquo; Newer Posts';
         $config['next_tag_open'] = '<div class="blogNav right">';
         $config['next_tag_close'] = '</div>';
         $config['prev_tag_open'] = '<div class="blogNav left">';
         $config['prev_tag_close'] = '</div>';
         $config['display_pages'] = FALSE;          
         $this->pagination->initialize($config);         
          
		// Pass the users info through
		$data = $this->data_model->getSiteData();
				
		$data['posts'] = $this->blog_model->getPosts($per_page, $page );
		
		$this->template->write('title', 'Blog');
		$this->template->write_view('contents', 'blog/index', $data);
		$this->template->render();	
	}
	
	function archive( $page = null ){
      $this->index( $page );
	}

	function posts( $id = null ){

		// Set the cache duration
		$this->output->cache(3600);
		
		if( $id ==null)
      		show_404();
		
		// Pass the users info through
		$data = $this->data_model->getSiteData();

		// Get the current post
		$post = $this->blog_model->getPost( str_replace("-"," ",$id ) );
		
		if( !isset( $post['content'] ) )
      		show_404();
					
		// Put the contents of the post into the data array
		$data['post'] = $post;
		
		// Write to the view
		$this->template->write_view('tools', 'blog/tools', $data);
		$this->template->write_view('comments', 'blog/comments', $data);
		$this->template->write_view('contents', 'blog/posts', $data);
		$this->template->render();
	}

	function tag( $tag = null ){
	
		// Set the cache duration
		$this->output->cache(3600);
		
		// Pass the users info through
		$data = $this->data_model->getSiteData();

         // Load the related posts
         $data['tag'] = $tag;
         
         // Load the posts with the related tags
         $data['posts'] = $this->blog_model->getRelatedPostsTags( str_replace("-"," ",$tag) );
         
        // Test
         $this->blog_model->getCategory( 0 );
         
         // Count how many related posts there are
         $data['count'] = count( $data['posts'] );
            
        // Write to the view                  
        $this->template->write_view('contents', 'blog/tags', $data);
        $this->template->render();

	}
	
	function category( $cat = null ){
	
		// Set the cache duration
		$this->output->cache(3600);
		
		// Pass the users info through
		$data = $this->data_model->getSiteData();
		
         // Load the related posts
         $data['category'] = $cat;
         
         // Load the posts with the related tags
         $data['posts'] = $this->blog_model->getRelatedPostsCategory( str_replace("-"," ",$cat) );                 
         
         // Count how many related posts there are
         $data['count'] = count( $data['posts'] );
		
		$this->template->write_view('contents', 'blog/category', $data);
		$this->template->render();

	}

}