<?php

/**
 *
 * Single image widget
 *
 * Text paragraph and a single image are displayed
 */

class UW_Widget_Single_Image extends WP_Widget
{
  const DEFAULT_LINK_TEXT = 'More';

  function UW_Widget_Single_Image()
  {
		parent::WP_Widget( $id = 'pic-text', $name = 'Single Image', $options = array( 'description' => 'Display an image with some featured text.', 'classname' => 'pic-text-widget' ) );

    if ( is_admin() )
      add_action('admin_enqueue_scripts', array( __CLASS__, 'scripts') );
  }

  function scripts() 
  {
    wp_enqueue_script( 'single-image',  get_bloginfo('template_directory') . '/js/widgets/single-image.js' );
    wp_enqueue_script( 'jquery-ui-autocomplete' );
    wp_enqueue_media();
  }

  function form( $instance ) 
  {

    $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Image Widget';
    $text  = isset($instance['text'])  ? esc_attr($instance['text'])  : '';
    $image = isset($instance['image']) ? esc_attr($instance['image']) : '';
    $src   = isset($instance['src']) ? esc_attr($instance['src']) : '';
    $link  = isset($instance['link']) ? esc_attr($instance['link']) : '';
    $linktext  = isset($instance['link-text']) ? esc_attr($instance['link-text']) : 'More';

    ?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

    <p>
      <span class="image-preview" data-src="<?php echo esc_attr($src); ?>" style="width:33%; display:block;">
        <?php if ( wp_get_attachment_url( $image ) ) : ?>
              <img width="100%" src="<?php echo wp_get_attachment_url( $image ); ?>" />
        <?php endif; ?>
      </span>

      <a class="select-an-image button" href="#">Select an Image</a>
      <input id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="hidden" value="<?php echo esc_attr( $image ); ?>"/>
      <input id="<?php echo $this->get_field_id( 'src' ); ?>" class="site-panels-image-fix" name="<?php echo $this->get_field_name( 'src' ); ?>" type="hidden" value="<?php echo esc_attr( $src ); ?>"/>
    </p>

		<p>
		<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Featured text:' ); ?></label> 
		<textarea class="widefat" style="resize:vertical" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( empty($instance['text']) ? '' : $instance['text'] ); ?></textarea>
		</p>

    <p>
    <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?> <small>(Search by typing a title)</small></label>
    <input id="single-image-link-<?php echo $this->id ?>" class="widefat wp-get-posts" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" data-posttype="post"/>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('link-text'); ?>"><?php _e('Link text:'); ?></label>
    <input id="single-image-link-text-<?php echo $this->id ?>" class="widefat" id="<?php echo $this->get_field_id('link-text'); ?>" name="<?php echo $this->get_field_name('link-text'); ?>" type="text" value="<?php echo $linktext; ?>" data-posttype="post"/>
    </p>

  <?php
  
  }

  function update($new_instance, $old_instance)
  {
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['text']  = strip_tags( $new_instance['text'] );
		$instance['image'] = (Int) $new_instance['image'];
		$instance['src']   = strip_tags( $new_instance['src'] );
		$instance['link']  = strip_tags( $new_instance['link'] );
		$instance['link-text']  = strip_tags( $new_instance['link-text'] );
    return $instance;
  }

  function widget($args, $instance) 
  {

		extract( $args );
		$title = $instance['title'];
    $text  = $instance['text'];
    $image = $instance['image'];
    $link  = $instance['link'];
    $linktext  = isset($instance['link-text']) ? $instance['link-text'] : self::DEFAULT_LINK_TEXT;
    $imageinfo = wp_get_attachment_image_src( $image, 'single-image-widget' );
    ?>

    <?php  echo $before_widget; ?>

      <img alt="<?php echo $title; ?>" src="<?php echo $imageinfo[0]; ?>" />  

      <span>

      <?php if ( ! empty( $link) ) : ?>
        <a href="<?php echo $link; ?>" class="pic-title">
      <?php endif; ?>

          <h3><?php echo $title; ?></h3>

      <?php if ( ! empty( $link) ) : ?>
        </a>
      <?php endif; ?>

      <?php echo wpautop($text); ?>

      <?php if ( ! empty( $link) ) : ?>
        <a href="<?php echo $link; ?>" class="pic-text-more"><?php echo $linktext; ?></a>
      <?php else: ?>
        <br/>
      <?php endif; ?>
      </span> 
    <?php echo $after_widget; 

  }
}
