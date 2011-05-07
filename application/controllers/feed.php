<?php
class Feed extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->db = $this->load->database('blog', TRUE);
  }

  /**
    * The default entry point for feed
    */
  function index()
  {
    $this->load->helper('xml');
    $this->load->helper('text');
    $this->load->model('blog_model');
    $data = $this->data_model->getSiteData();
    $data['feed_name'] =  $data['blog_title'].' - '.$data['first_name'].' '.$data['last_name'];
    $data['encoding'] = 'utf-8';
    $data['feed_url'] = base_url().'feed';
    $data['page_description'] = $data['site_description'];
    $data['page_language'] = 'en-en';
    $data['creator_email'] = $data['contact_email'];
    $data['posts'] = $this->blog_model->getPosts();
    header("Content-Type: application/rss+xml");
    $this->load->view('feed', $data);
  }

}?>
