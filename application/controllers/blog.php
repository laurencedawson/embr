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

		// Load the recent blog posts
		//$blog['recent'] = $this->blog_model->getRecent();
		//$this->template->write_view('recent', 'blog/recent_posts', $blog );
 
		//$this->template->write('meta_description','<meta content="My blog focussing on technology, programming and experiences as a PhD student at Durham University." name="description" />' );		
		$data['posts'] = $this->blog_model->getPosts();
		
		$this->template->write('title', 'Blog');
		$this->template->write_view('contents', 'blog/index', $data);
		$this->template->render();	
	}

	function posts( $id = null ){

	

		// Set the cache duration
		$this->output->cache(3600);
		
		// Pass the users info through
		$data = $this->data_model->getSiteData();

		// Get the current post
		$post = $this->blog_model->getPost( str_replace("-"," ",$id ) );
		
		// Load the recent blog posts
		$blog['recent'] = $this->blog_model->getRecent();
		$this->template->write_view('recent', 'blog/recent_posts', $blog );
		

		$data['post'] = $post;
		$data['tags'] = $this->blog_model->getTags( $post[0]['id'] );
		
		$this->template->write_view('tools', 'blog/tools', $data);
		$this->template->write_view('comments', 'blog/comments', $data);
		$this->template->write_view('contents', 'blog/posts', $data);
		$this->template->render();
	}


}
