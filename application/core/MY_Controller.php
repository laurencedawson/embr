<?php
class  MY_Controller  extends  CI_Controller  {
  
  /*
   * If facebook tags are enabled, enable the facebok plugin
   */  
  protected function facebook_plugin( $data ){  
      if( isset($data['opengraph']) && $data['opengraph'] )
        $this->template->write_view('opengraph', 'blog/plugin/opengraph', $data);  
  }

  /*
   * If comments are enabled and Disqus is set, enable the comment plugin
   */  
  protected function disqus_plugin( $data ){
    if( $data['disqus'] && $data['post']['content']['comments'] )
      $this->template->write_view( 'comments', 'blog/plugin/comments', $data );
  }

  /*
   * If the legend is enabled, enable the legend plugin
   */  
  protected function legend_plugin( $data ){
    if( $data['legend'] )
      $this->template->write_view( 'legend', 'blog/plugin/legend', $data );
  }

  /*
   * If the debug view is enabled, enable the debug view
   */  
  protected function debug_plugin( $data ){
    if( $data['debug'] )
      $this->template->write_view( 'debug', 'blog/plugin/debug', $data );
  }

  /*
   * If the mobile view is enabled, enable the mobile view
   */  
  protected function mobile_plugin( $data ){
	if( $data['mobile'] )
      $this->template->write_view( 'mobile', 'blog/plugin/mobile', $data );
  }

  /*
   * If analytics is enabled, enable google analytics
   */  
  protected function analytics_plugin( $data ){
    if( $data['google_analytics'] )
      $this->template->write_view( 'analytics', 'blog/plugin/analytics', $data );
  }  

} 