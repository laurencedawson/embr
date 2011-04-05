<?php
class blog_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
 
    	function getPosts($limit = null, $offset = null)
	{
          $this->db->order_by("id", "desc"); 
          $this->db->limit($limit, $offset);
          
          $query = $this->db->get('blog');
          return $query->result_array();
	}

    function getID( $title ){
      $this->db->select('id');
      $query = $this->db->get_where( 'blog', array('title' => $title ) );
      return $query->row();
    }


	/*
     	Requires post title
	*/
	function getPost( $title )
	{
        $temp = $this->getID($title);
        if( isset($temp->id) ){
          $id = $temp->id;
          $this->db->select('*');
          $this->db->join('post_categories', 'post_categories.post_id = blog.id', 'left outer' );
          $this->db->join('categories', 'categories.id = post_categories.category_id', 'left' );
          $query = $this->db->get_where( 'blog', array('blog.id' => $id) );
          $data['id'] = $id; //Save the id if the second join fails
          $data['content'] = $query->row_array();
          $data['tags'] = $this->getTags( $id );        
          $data['next'] = $this->getNext($id);
          $data['prev'] = $this->getPrev($id);        
          return $data;
        }
	}
	
	
    function getCategory( $id ){
        $this->db->select('categories.*');
        $this->db->from('post_categories');
        $where = "post_categories.post_id = $id AND categories.id = post_categories.category_id";
        $this->db->where( $where);
        $query = $this->db->get('categories');
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
	
	
	function getTagID( $tag ){
      $this->db->select('id');     	
      $query = $this->db->get_where( 'tags', array('tag' => $tag) );
      return $query->row();
	}
	
	function getCatID( $cat ){
      $this->db->select('id');     	
      $query = $this->db->get_where( 'categories', array('category' => $cat) );
      return $query->row();
	}
	
	function getRelatedPostsTags( $tag, $limit=null, $offset=null ){
        $result = $this->getTagID( $tag );
        if( isset( $result->id ) ){
          if(isset($limit))
            $this->db->limit($limit, $offset);
          $this->db->select('*');
          $this->db->order_by("blog.id", "desc"); 
          $this->db->from('post_tags');	
          $where = "blog.id = post_tags.post_id AND post_tags.tag_id = $result->id";
          $this->db->where( $where);
          $query = $this->db->get('blog');
          return $query->result_array();
        }
	}
	
	function getRelatedPostsCategory( $cat, $limit=null, $offset=null){
        $result = $this->getCatID( $cat );
        if( isset( $result->id ) ){        
          if(isset($limit))
            $this->db->limit($limit, $offset);
          $this->db->select('*');
          $this->db->order_by("blog.id", "desc"); 
          $this->db->from('post_categories');
          $where = "blog.id = post_categories.post_id AND post_categories.category_id = $result->id";
          $this->db->where( $where);
          $query = $this->db->get('blog');
          return $query->result_array();
        }
	}	
	
	

    /*
      Requires post ID
    */
    function getNext( $id ){
        $this->db->select('title');
        $where = "blog.id = $id+1";
        $this->db->where( $where );
        $query = $this->db->get('blog');
        return $query->row_array();
    }

    /*
      Requires post ID
    */
    function getPrev( $id ){
        $this->db->select('title');
        $where = "blog.id = $id-1";
        $this->db->where( $where );
        $query = $this->db->get('blog');
        return $query->row_array();
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
