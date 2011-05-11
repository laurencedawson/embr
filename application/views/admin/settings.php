<div class="post">
  <h2>Settings</h2>
<?
	$this->load->helper('cookie');
	$cookie = array(
	                   'name'   => 'embr',
	                   'value'  => 'http://localhost/embr/',
	                   'expire' => '86500',
	                   'domain' => '*.com',
	                   'path'   => '/',
	                   'prefix' => 'embr_',
	               );

	set_cookie($cookie);


?>



</div>