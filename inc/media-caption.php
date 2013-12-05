<?php
/**
 * Adds a media credit to images in the media library
 */

class UW_Media_Caption
{

  function UW_Media_Caption()
  {
    add_filter( 'img_caption_shortcode', array( $this, 'add_media_credit_to_caption_shortcode_filter'), 10, 3 );
  }

  /**
   * Override the caption html - original in wp-includes/media.php
   */
  function add_media_credit_to_caption_shortcode_filter($val, $attr, $content = null)
  {
    extract(shortcode_atts(array(
      'id'	=> '',
      'align'	=> '',
      'width'	=> '',
      'caption' => ''
    ), $attr));
    
    if ( 1 > (int) $width || empty($caption) )
      return $content;

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

    preg_match('/([\d]+)/', $id, $match);

    if ( $match[0] ) $credit = get_post_meta($match[0], '_media_credit', true);

    if ( $credit ) $credit = '<p class="wp-media-credit">'. $credit . '</p>';

    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
    . do_shortcode( $content ) . $credit . '<p class="wp-caption-text">' . $caption . '</p></div>';
  }

}

new UW_Media_Caption;
