<?php
class setup_model extends CI_Model{	

  /**  
    * Checks if the database exists
    * @return bool status
    */
  function checkDatabase(){
	
    $this->load->dbutil();
    if (!$this->dbutil->database_exists('blog')){
      $this->load->dbforge();
      $this->dbforge->create_database('blog');      
	  return false;
    }else
      return true;
  }

  /*
   * Adds the basic table structure to the blog database
   */
  function addTables(){

    /* Start the attempts table */
    if ( !$this->db->table_exists('attempts') ){
      $fields =  array(
        'user_id' =>array(
          'type' => 'INT',
          'contraint' => '9'
        ),
        'attempts' => array(
          'type' => 'INT',
          'constraint' => '9'
        ),
        'datet' => array(
          'type' => 'TIMESTAMP'
        ),
        'locked' => array(
          'type' =>'INT',
	        'constraint' => '9'
	    )
	  );
	  $this->dbforge->add_key('user_id', TRUE);
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('attempts');
    }

	/* Start the blog table */
	if ( !$this->db->table_exists('blog') ){
	  $this->dbforge->add_field('id');
      $fields =  array(
	    'title' => array(
	      'type' => 'TEXT'
	    ),
	    'content' => array(
	      'type' =>'TEXT'
	    ),
   	    'datet' => array(
	      'type' => 'TIMESTAMP'
	    ),
	    'image' => array(
	      'type' =>'TEXT'
	    ),
        'summary' => array(
	      'type' =>'TEXT'
	    ),
	    'comments' => array(
          'type' =>'INT'
        ),
	    'published' => array(
          'type' =>'INT'
        ),
		'source' => array(
	      'type' =>'TEXT'
	    )
	  );
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('blog');
	}

	/* Start the categories */
	if ( !$this->db->table_exists('categories') ){
	  $this->dbforge->add_field('id');
    	$fields =  array(
  	    'category' => array(
	      'type' => 'TEXT'
	    )
	  );  
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('categories');
    }

	/* Start the post_categories */
	if ( !$this->db->table_exists('post_categories') ){
	  $fields =  array(
        'post_id' => array(
	      'type' => 'INT',
	      'constraingt' => '9'
	    ),
    	  'category_id' => array(
	      'type' => 'INT',
	      'constraingt' => '9'
	    )
	  );  
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('post_categories');
    }

	/* Start the post_tags */
    if ( !$this->db->table_exists('post_tags') ){
	  $fields =  array(
	    'post_id' => array(
	      'type' => 'INT',
	      'constraingt' => '9'
        ),
	    'tag_id' => array(
	      'type' => 'INT',
	      'constraingt' => '9'
	    )
	  );  
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('post_tags');
	}

	/* Start the categories */
	if ( !$this->db->table_exists('tags') ){
	  $this->dbforge->add_field('id');
	  $fields =  array(
	    'tag' => array(
	      'type' => 'TEXT'
	    )
	  );
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('tags');
	}

	/* Start the users */
	if ( !$this->db->table_exists('users') ){
	  $this->dbforge->add_field('id');
	  $fields =  array(
	    'email' => array(
	      'type' => 'TEXT'
	    ),
	    'hash' => array(
	      'type' => 'TEXT'
	    )
	  );
	  $this->dbforge->add_field($fields);
	  $this->dbforge->create_table('users');
	}
	
	/* Add an example post */
	$data = array(        
        'title' => "Test Post",
        'content' => "Nam vel nisi leo, ac luctus eros. Aenean lacinia, augue et suscipit vehicula, neque nulla feugiat elit, ut condimentum neque mi eget metus. In ut imperdiet eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue arcu id dolor luctus varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam varius ultrices dolor, vel pharetra dolor auctor in. Aenean egestas turpis a lorem tincidunt placerat. Fusce pharetra, enim nec vestibulum dictum, nisl dui luctus nisl, non commodo risus libero ac mi. Fusce non tortor vitae libero molestie tempor. Etiam sed nibh erat. Donec viverra neque sed nisi lobortis.",
        'comments' => '1',
        'published' => '1' );
    $this->db->insert('blog', $data);
    
    $data = array(        
        'email' => "test@embr.co",
        'hash' => "5865a2e9fdb6b1444b3c1669ee4e21250e052ca4f007a986bd94675e651c96e3b1dc747df22510abafa8085050601a6e17dd1546290f3f67f3f7be75e62b9316");
    $this->db->insert('users', $data);
  }

}
