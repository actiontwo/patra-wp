<?php

function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
//    wp_register_script('my-upload', WP_PLUGIN_URL . '/my-script.js', array('jquery', 'media-upload', 'thickbox'));
//    wp_enqueue_script('my-upload');

    require_once __DIR__ . '/../js/jquery.min.js';
}

function my_admin_styles() {

    wp_enqueue_style('thickbox');
}

// better use get_current_screen(); or the global $current_screen
if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {

    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}
?>
<script>
    add();
    function add() {
        jQuery(document).ready(function($) {
            $data = '';
            $('.add_image').click(function() {
                $data = $(this).attr('data');

                formfield = $data;
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });

            window.send_to_editor = function(html) {

                imgurl = $('img', html).attr('src');

                $('#in_' + $data).val(imgurl);
                $('#' + $data).attr('src', imgurl);
                tb_remove();
            }

            $('.delete-image').click(function() {
                $data = $(this).attr('data');
                $('#in_' + $data).val("delete");
                $('#' + $data).attr("src", '');

            });


        });
    }
</script>  