<?php
class blog_model extends CI_Model {
	
  /**
    * Returns all blog posts
    * @param int $limit
    * @param int $offset    
    * @return array Returns all blog posts
    */
  function getPosts( $limit = null, $offset = null )
  {
    $this->db->order_by( "id", "desc" );
    $this->db->limit( $limit, $offset );
    $query = $this->db->get( 'blog' );
    return $query->result_array();
  }

  /**
    * Returns the corresponding ID of a given blog post tite
    * @param string $title
    * @return int Returns the ID of the title
    */
  function getID( $title )
  {
    $this->db->select( 'id' );
    $query = $this->db->get_where( 'blog', array('title' => $title ) );
    return $query->row();
  }
  
  /**  
    * Returns the corresponding ID of a given tag
    * @param string $tag
    * @return int Returns the ID of the tag
    */  
  function getTagID( $tag ){
    $this->db->select('id');     	
    $query = $this->db->get_where( 'tags', array('tag' => $tag) );
    return $query->row();
  }

  /**  
    * Returns the corresponding ID of a given category
    * @param string $cat
    * @return int Returns the ID of the category
    */    
  function getCatID( $cat ){
    $this->db->select( 'id' );
    $query = $this->db->get_where( 'categories', array('category' => $cat) );
    return $query->row();
  }
  
  /**
    * Returns the category name for a given category ID
    * @param string $id
    * @return string Returns the category
    */
  function getCategory( $id ){
    $this->db->select( 'categories.*' );
    $this->db->from( 'post_categories' );
    $where = "post_categories.post_id = $id AND categories.id = post_categories.category_id";
    $this->db->where( $where );
    $query = $this->db->get( 'categories' );
    return $query->result_array();
  }
  
  /**
    * Returns all tags for a given blog post ID
    * @param string $id
    * @return array Returns an array of tags
    */
  function getTags( $id ){
    $this->db->select( 'tags.tag' );
    $this->db->from( 'post_tags' );	
    $where = "post_tags.post_id = $id AND tags.id = post_tags.tag_id";
    $this->db->where( $where );
    $query = $this->db->get( 'tags' );
    return $query->result_array();
  }

  /**
    * Returns the blog post of a corresponding title
    * @param string $title
    * @return string Returns the blog post
    */
  function getPost( $title )
  {
    $temp = $this->getID( $title );
    if( isset( $temp->id ) ){
      $id = $temp->id;
      $this->db->select( '*' );
      $this->db->join( 'post_categories', 'post_categories.post_id = blog.id', 'left outer' );
      $this->db->join( 'categories', 'categories.id = post_categories.category_id', 'left' );
      $query = $this->db->get_where( 'blog', array('blog.id' => $id) );
      $data['id'] = $id; //Save the id if the second join fails
      $data['content'] = $query->row_array();
      $data['tags'] = $this->getTags( $id );        
      $data['next'] = $this->getNext( $id );
      $data['prev'] = $this->getPrev( $id );        
      return $data;
    }
  }

  /**
    * Returns all post tags for a given post tile
    * @param string $title
    * @param int $limit
    * @param int $offset    
    * @return array Returns an array of post tags
    */
  function getRelatedPostsTags( $title, $limit=null, $offset=null )
  {
    $result = $this->getTagID( $title );
    if( isset( $result->id ) ){
      if( isset( $limit ) )
        $this->db->limit( $limit, $offset );
      $this->db->select( '*' );
      $this->db->order_by( "blog.id", "desc" ); 
      $this->db->from( 'post_tags' );	
      $where = "blog.id = post_tags.post_id AND post_tags.tag_id = $result->id";
      $this->db->where( $where );
      $query = $this->db->get( 'blog' );
      return $query->result_array();
    }
  }

  /**
    * Returns the post category for a given post tile
    * @param string $title
    * @param int $limit
    * @param int $offset    
    * @return array Returns an array of post tags
    */
  function getRelatedPostsCategory( $title, $limit=null, $offset=null)
  {
    $result = $this->getCatID( $title );
    if( isset( $result->id ) ){        
      if( isset( $limit ) )
        $this->db->limit( $limit, $offset );
      $this->db->select( '*' );
      $this->db->order_by( "blog.id", "desc" ); 
      $this->db->from( 'post_categories' );
      $where = "blog.id = post_categories.post_id AND post_categories.category_id = $result->id";
      $this->db->where( $where );
      $query = $this->db->get( 'blog' );
      return $query->result_array();
    }
  }	
	
  /**  
    * Returns the next post for a given blog id
    * @param int $id
    * @return string Returns the title of the next post
    */ 
  function getNext( $id )
  {
    $this->db->select( 'title' );
    $where = "blog.id = $id+1";
    $this->db->where( $where );
    $query = $this->db->get( 'blog' );
    return $query->row_array();
  }
  
  /**  
    * Returns the previous post for a given blog id
    * @param int $id
    * @return string Returns the title of the previous post
    */   
  function getPrev( $id ){
    $this->db->select( 'title' );
    $where = "blog.id = $id-1";
    $this->db->where( $where );
    $query = $this->db->get( 'blog' );
    return $query->row_array();
  }  

  /**
    * Returns the recent posts
    * @return array An array of recent posts titles
    */
  function getRecent()
  {
    $this->db->order_by( "datet", "desc" );
    $this->db->select( 'title, datet' );
    $query = $this->db->get( 'blog' );
    return $query->result_array();
  }

}
?>