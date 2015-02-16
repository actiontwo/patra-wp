<?php 
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'Gallery',
    array(
      'labels' => array(
        'name' => __( 'Gallery' ),
        'singular_name' => __( 'Gallery' ),
        'add_new_item' => __('Add new Gallery')
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' =>'dashicons-video-alt',
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );
}