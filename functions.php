<?php

define('URL', get_bloginfo('stylesheet_directory'));
define('IMG', URL . "/images/");
define('CSS', URL . "/css/");
define('JS', URL . "/js/");


//define post thumbnail
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}

/* Add menu */
add_theme_support('nav-menus');
if (function_exists('register_nav_menus')) {
  register_nav_menus(array('topMenu' => 'Top menu'));
  register_nav_menus(array('service-menu' => 'Service menu'));
  register_nav_menus(array('top-menu-mobile' => 'Menu Mobile'));
  register_nav_menus(array('rightBottomMenu' => 'Right footer menu'));
}

require_once('top-menu-walker.php');
require_once('post-type/testimontials.php');
require_once('post-type/gallery.php');
require_once('post-type/services.php');
require_once('post-type/portfolio.php');
//Theme options
include_once 'include/theme-options.php';
include_once 'include/shortcode.php';
include_once 'include/enqueue_scripts.php';
