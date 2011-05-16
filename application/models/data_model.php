<?php 
class data_model extends CI_Model {
  
  /**
    * Returns all blog config items
    * @return array Returns an array all blog config items 
    */
  function getSiteData( )
  {		
    $data['blog_title'] = $this->config->item('blog_title');
    $data['tagline'] = $this->config->item('tagline');
    $data['first_name'] = $this->config->item('first_name');
    $data['last_name'] = $this->config->item('last_name');
    $data['contact_email'] = $this->config->item('contact_email');
    $data['style'] = $this->config->item('style');	
    $data['disqus'] = $this->config->item('disqus');
	$data['google_analytics'] = $this->config->item('google_analytics');
    $data['not_found'] = $this->config->item('not_found');
	$data['site_description'] = $this->config->item('site_description');
	$data['debug'] = $this->config->item('debug');
	$data['legend'] = $this->config->item('legend');
    return $data;
  }
  
}
?>