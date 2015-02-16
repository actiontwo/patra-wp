<?php
define('URL', get_bloginfo('stylesheet_directory'));
define('IMG', URL . "/images/");
define('CSS', URL . "/css/");
define('JS', URL . "/js/");
?>

<?php 
//define post thumbnail
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}
?>
<?php

/* Add menu */
add_theme_support('nav-menus');
if (function_exists('register_nav_menus')) {
    register_nav_menus(array('topMenu' => 'Top menu'));
    register_nav_menus(array('service-menu' => 'Service menu'));
    register_nav_menus(array('leftBottomMenu' => 'Left footer menu'));
    register_nav_menus(array('rightBottomMenu' => 'Right footer menu'));
}
?>

<?php
require_once('top-menu-walker.php');
require_once('post-type/testimontials.php');
require_once('post-type/gallery.php');
require_once('post-type/services.php');
require_once('post-type/portfolio.php');
//Theme options
include_once 'include/theme-options.php';

?>