<?php
class data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getSiteData( ){		
		$data['blog_title'] = $this->config->item('blog_title');
		$data['first_name'] = $this->config->item('first_name');
		$data['last_name'] = $this->config->item('last_name');
		$data['contact_email'] = $this->config->item('contact_email');
		$data['style'] = $this->config->item('style');	
		$data['disqus'] = $this->config->item('disqus');
		return $data;
	}

}
?>