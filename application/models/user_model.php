<?php
class user_model extends CI_Model
{
	
  /**  
    * Returns the corresponding ID of a given email
    * @param string $email
    * @return int Returns the ID of the user
    */
  function getUserID( $email ){
    $this->db->select( 'id' );
    $query = $this->db->get_where( 'users', array('email' => $email) );
	return $query->row();
  }

  /**
    * Checks for a valid user login
    * @param string $email
    * @param string $password
    * @return int Returns user login (0, bad login) ( 1, good login), (2, account locked)
    */
  public function authenticate($email, $password){

    //Check if the username exists
    $id = $this->getUserID($email);
    if( !$id )
      return 0;

    //Check if the account has been locked
    $this->db->select( 'attempts.*' );
    $where = "user_id = $id->id";
    $this->db->where( $where );
    $query = $this->db->get( 'attempts' )->row();

    //Check how long the account was locked out (lock for 15mins or so)
    if( sizeof( $query ) && $query->locked){

      $datetime1 = new DateTime('now');
	  $datetime2 = new DateTime( $query->last_lock );
	  $interval = $datetime1->diff($datetime2);

      //Also if a day, month or year has gone by reset the account
      if ( $interval->y || $interval->m
	    || $interval->d || $interval->i >= 15){
        $data = array( 'attempts' => 0, 'locked' => 0 );
        $this->db->where('user_id', $id->id);
        $this->db->update('attempts', $data);
      }else{
        return 2;
      }
    }
	
    //Hash the password and check for a valid login
    $hash = hash('sha512', $email.$password.$this->config->item('encryption_key') );
    $user = $this->db->select('id')->get_where('users', array(
		'email' => $email,
        'hash' => $hash
    ))->row();

    //If the user login is ok, skip the locking security
    if( sizeof($user) )
      return 1;

    //Get the email id again and set the attempts + 1
    $id = ($this->getUserID($email)->id);
    if( !sizeof($user) ){		
      $this->db->where('user_id', $id );
      $this->db->set('attempts','attempts + 1',false);
      $this->db->update('attempts');
    }
	
    //Check if the username has been locked
    $this->db->select( 'attempts' );
    $query = $this->db->get_where( 'attempts', array('user_id' => $id ) )->row();

    //If the no# attempts is > 2; lock out the account
    if( !sizeof( $query ) ){
	
	  //If this is a first offense for the account, create a new entry
      $data = array(
        'user_id' => $id,
        'attempts' => 1,
        'locked' => 0 );
      $this->db->insert('attempts', $data);
	
	} else if($query->attempts > 2 ){
      $this->db->where('user_id', $id);
      $this->db->set('locked','1',false);
      $this->db->update('attempts');
    }

    return 0;
  }
    
}