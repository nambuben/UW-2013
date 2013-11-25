<?php

/**
 * Install stylesheets
 *    - bloginfo('template_directory')  gives you the url to the parent theme
 *    - bloginfo('stylesheet_directory')  gives you the url to the child theme
 */

class UW_Install_Styles
{

  public $STYLES;

  function UW_Install_Styles() 
  {
    $this->STYLES = array( 

      'google-font-open-sans' => array(
          'id'      => 'google-font-open-sans',
          'url'     => 'https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800',
          'deps'    => array(),
          'version' => '3.6',
          'admin'   => true
      ),

      'google-font-droid-serif' => array(
          'id'    => 'google-font-droid-serif',
          'url'   => 'https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic',
          'deps'  => array(),
          'version' => '3.6',
          'admin'   => true
      ),

      'uw-master' => array ( 
        'id'      => 'uw-master',
        'url'     => get_bloginfo( 'template_url' ) . '/style' . $this->dev_stylesheet() . '.css',
        'deps'    => array(),
        'version' => '3.6'
      ),

      'uw-style' => array ( 
          'id'      => 'uw-style',
          'url'     => get_bloginfo('stylesheet_url'),
          'deps'    => array(),
          'version' => '3.6',
          'child'   => true
      ),

    );

    add_action( 'wp_enqueue_scripts', array( $this, 'uw_register_default_styles' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'uw_enqueue_default_styles' ) );
    add_action( 'admin_head', array( $this, 'uw_enqueue_admin_styles' ) );

  }

  function uw_register_default_styles() 
  {
      foreach ( $this->STYLES as $style ) 
      {
        $style = (object) $style;

        wp_register_style( 
          $style->id,
          $style->url,
          $style->deps,
          $style->version
        );

      }

  }

  function uw_enqueue_default_styles() 
  {
      wp_enqueue_style( 'uw-master' );
      foreach ( $this->STYLES as $style ) 
      {
        $style = (object) $style;

        if ( array_key_exists( 'child', $style ) 
              && $style->child && ! $this->is_child_theme() )
          continue;

        wp_enqueue_style( $style->id );

      }

  }

  function uw_enqueue_admin_styles()
  {
    if ( ! is_admin() )
      return;

    foreach ( $this->STYLES as $style ) 
    {

      $style = (object) $style;

      if ( array_key_exists( 'admin', $style) 
            && $style->admin )
      {
        wp_register_style( 
          $style->id,
          $style->url,
          $style->deps,
          $style->version
        );

        wp_enqueue_style( $style->id );
      }

    }

  }

  function is_child_theme() 
  {
    return get_bloginfo( 'template_directory' ) != get_bloginfo( 'stylesheet_directory' );
  }

  private function dev_stylesheet()
  {
    return is_user_logged_in() ? '.dev' : '';
  }

}
new UW_Install_Styles;
