<?php
class UW_YouTube_Playlist_Widget extends WP_Widget {

    public function UW_YouTube_Playlist_Widget() {
        parent::__construct(
            'widget_youtube_playlist',
            'YouTube Playlist',
            array( 'classname' => 'widget_youtube_playlist', 'description' => __( "Put your YouTube playlist into your page"), )
        );

    }

    public function widget( $args, $instance ) {
		wp_register_script('youtube-iframe', '//www.youtube.com/player_api');
		wp_enqueue_script('youtube-iframe');
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

    echo str_replace('span4','span8',$before_widget);?>

      <div id="nc-video-player">
        <div id="tube-wrapper">
          <div id="customplayer" data-pid="<?php echo $instance['playlist_id']; ?>"></div>
        </div>
        <div id="vidSmall">
            <div class="scrollbar">
            <div class="track">
            <div class="thumb">
            <div class="end">
            </div></div></div></div>
            <div class="viewport">
            <div id="vidContent" class="overview">
            </div></div>
          </div>
      </div>

    <?php
        echo $after_widget;
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['playlist_id'] = strip_tags( $new_instance['playlist_id'] );

        return $instance;
    }

    public function form( $instance ) {

        $title  = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Videos', '' );
        $id     = isset( $instance[ 'playlist_id' ] ) ?  $instance[ 'playlist_id' ] :  __( '', '' ); ?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'playlist_id' ); ?>"><?php _e( 'Playlist ID:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'playlist_id' ); ?>" name="<?php echo $this->get_field_name( 'playlist_id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" />
        </p>

        <?php
    }

}
?>
