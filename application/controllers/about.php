<?php

class About extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
	}
	
	function index()
	{	
		// Set the cache duration
		$this->output->cache(3600);

		// Pass the users info through
		$data = $this->data_model->getSiteData();

		// Load the recent blog posts
		$blog['recent'] = $this->blog_model->getRecent();
		$this->template->write_view('recent', 'blog/recent_posts', $blog );
		
		//Page Title
		$this->template->write('title', 'About');
		//Page Content
		$this->template->write_view('contents', 'about/index', $data);

		//Render the page
		$this->template->render();	
	}
}

?>
