<?php

function wrapperContact_func($atts, $content = null) {
  $html = '<ul class="row">';
  $html .= do_shortcode($content);
  $html .= '</ul>';

  return str_replace('<br>', '', $html);
}

add_shortcode('wrapperContact', 'wrapperContact_func');

function contact_func($atts, $content = null) {

  $title = $atts['title'];
  $contentTitle = explode(',', $atts['contenttitle']);
  $content = explode(',', $atts['content']);
  $html = '<li class="col-md-4">';
  $html .='<h3 class="sub-title">' . $title . '</h3>';

  foreach ($contentTitle as $key => $value) {
    $html .='<span class="content-title">' . $value . '</span><span class="content">' . $content[$key] . '</span>';
  }
  $html .='</li>';
  return $html;
}

add_shortcode('contact', 'contact_func');

function processList_func($atts, $content = null) {
  $html = '<ul class="process-list">';
  $html .= do_shortcode($content);
  $html .= '</ul>';

  return str_replace('<br>', '', $html);
}

add_shortcode('processList', 'processList_func');

function process_func($atts, $content = null) {

  $title = $atts['title'];
  $icon = $atts['icon'];
  $content = $atts['content'];
  $html = '<li>';
  $html .='<div class="sub-title"><span>' . $title . '</span><div class="traingle"></div></div>';
  $html .=' <p><i class="iconsp-' . $icon . '"></i></p>';
  $html .= '<div class="content">' . $content . '</div>';
  $html .='</li>';
  return $html;
}

add_shortcode('process', 'process_func');
//
//function getintouch_func($atts, $content = null) {
//
//  $title = $atts['title'];
//  $content = $atts['content'];
//  $html = '<div class="thankyou">';
//  $html .= '<h1> ' . $title . ' </h1>';
//  $html .= '<p>'.$content.'</p>';
//  $html .= '<span onclick="$(\'.wpcf7-response-output\').hide()">Close</span>';
//  $html .= '</div>';
//  return $html;
//}
//
//add_shortcode('getintouch', 'getintouch_func');
?>
