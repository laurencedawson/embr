<?php
class blog_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
 
    	function getPosts()
	{
          $this->db->order_by("datet", "desc"); 
          $query = $this->db->get('blog');
          return $query->result_array();
	}

	function getPost( $id )
	{
     	//$this->db->cache_off();
     	$this->db->where('title', $id);
     	$this->db->set('views','views + 1',false);
     	$this->db->update('blog'); 
		$query = $this->db->get_where( 'blog', array('title' => $id) );
		//$this->db->cache_on();
		return $query->result_array();
	}

	function getTags( $id ){
        $this->db->select('tags.tag');
        $this->db->from('post_tags');	
        $where = "post_tags.post_id = $id AND tags.id = post_tags.tag_id";
        $this->db->where( $where);
        $query = $this->db->get('tags');
        return $query->result_array();
	}





	function getRecent()
	{
     	$this->db->order_by("datet", "desc"); 
		$this->db->select('title, datet');
		$query = $this->db->get('blog');
         return $query->result_array();
	}


}
?>
