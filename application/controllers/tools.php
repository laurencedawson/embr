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

function minify( $css ) {
	$css = preg_replace( '#\s+#', ' ', $css );
	$css = preg_replace( '#/\*.*?\*/#s', '', $css );
	$css = str_replace( '; ', ';', $css );
	$css = str_replace( ': ', ':', $css );
	$css = str_replace( ' {', '{', $css );
	$css = str_replace( '{ ', '{', $css );
	$css = str_replace( ', ', ',', $css );
	$css = str_replace( '} ', '}', $css );
	$css = str_replace( ';}', '}', $css );

	return trim( $css );
}

  /*
   * Combines multiple CSS theme files together
   * @return css
   */
  function combine_css()
  {
	  $this->output
        ->set_content_type('text/css')        ->set_output($this->minify(file_get_contents(base_url().'themes/basics.css').file_get_contents(base_url().'themes/'.$this->config->item('style').'/style.css')));
  }

}