<?php
class MY_Form_validation extends CI_Form_validation {

  /**
   * Alpha-numeric with underscores, dashes and spaces
   *
   * @access    public
   * @param    string
   * @return    bool
   */    
  function alpha_dash_space($str)
  {
	return ( ! preg_match("/^([-a-z0-9_-\s])+$/i", $str)) ? FALSE : TRUE;
  }

  /*
   * Checks that a text field isn't submitting blank data
   * @param		string
   * @return 	bool
   */
  function isnt($field){	
    return (trim("<p><br></p>")!==trim($field) && trim("<br>")!==trim($field) );
  }

  /*
   * Checks that a URL starts with http(s) and contains no spaces
   * @param		string
   * @return 	bool
   */
  function valid_url($url){       
    $pattern = '/' . '^(https?:\/\/)[^\s]+$' . '/';
    preg_match($pattern, $url, $matches);
    return (empty($matches)) ? FALSE : TRUE;
  } 

}
?>