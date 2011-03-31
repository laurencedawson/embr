<?php

class Blog extends CI_Controller {

	public function __construct() { 
		parent::__construct(); 
	}
	
	function index( )
	{	
		// Set the cache duration
		$this->output->cache(3600);
		
		// Pass the users info through
		$data = $this->data_model->getSiteData();
				
		$data['posts'] = $this->blog_model->getPosts();
		
		$this->template->write('title', 'Blog');
		$this->template->write_view('contents', 'blog/index', $data);
		$this->template->render();	
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