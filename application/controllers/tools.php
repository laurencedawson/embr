<?php
class Tools extends CI_Controller{

  /*
   * Checks session data to see if a user is logged in
   * @return json
   */
  function logged_in()
  {
    $this->output
      ->set_content_type('application/json')
	  ->set_output(json_encode(array('logged_in' => $this->session->userdata('loggedin') )));
  }

}