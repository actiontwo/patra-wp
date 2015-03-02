<?php
// Add script js to footer 
function themeslug_enqueue_script() {
  $scripts = array(
    array(
      'id' => 'jquery.bxslider.min',
      'src' => 'jquery.bxslider.min.js',
      'in_footer' => true // true put to footer, else to head
    ),
    array(
      'id' => 'jquery.slicknav.min',
      'src' => 'jquery.slicknav.min.js',
      'in_footer' => true
    ),
    array(
      'id' => 'bootstrap.min',
      'src' => 'bootstrap.min.js',
      'in_footer' => true
    ),
    array(
      'id' => 'slick.min',
      'src' => 'slick.min.js',
      'in_footer' => true
    ),
    array(
      'id' => 'script',
      'src' => 'script.js',
      'in_footer' => true
    )
  );

  foreach ($scripts as $script) {
    wp_enqueue_script($script['id'], JS . $script['src'], array(), null, $script['in_footer']);
  }
}

add_action('wp_enqueue_scripts', 'themeslug_enqueue_script');


//add style to header

function themeslug_enqueue_styles() {
  $styles = array(
    array(
      'id' => 'bootstrap.min',
      'src' => 'bootstrap.min.css',
      'in_footer' => false // true put to footer, else to head
    ),
    array(
      'id' => 'style',
      'src' => 'style.css',
      'in_footer' => false
    ),
    array(
      'id' => 'mainStyle',
      'src' => '../style.css',
      'in_footer' => false
    )
  );

  foreach ($styles as $style) {
    wp_enqueue_style($style['id'], CSS . $style['src'], array(), null, $style['in_footer']);
  }
}

add_action('wp_enqueue_scripts', 'themeslug_enqueue_styles');

