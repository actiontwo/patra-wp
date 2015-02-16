<?php //

/** Create the Custom Post Type* */
add_action('init', 'testimonial_manager_register');

function testimonial_manager_register() {

    //Arguments to create post type.
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New testimonial',
        'edit_item' => 'Edit testimonial',
        'new_item' => 'New testimonial',
        'all_items' => 'All testimonial',
        'view_item' => 'View testimonial',
        'search_items' => 'Search testimonials',
        'not_found' => 'No testimoniald found',
        'not_found_in_trash' => 'No testimonial found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonial'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
    );

    //Register type and custom taxonomy for type.
    register_post_type('testimonial', $args); //register_taxonomy_for_object_type('category','player');
    register_taxonomy("testimonial-type", array("testimonial"), array("hierarchical" => true, "label" => "Testimonial Types", "singular_label" => "Testimonial Type", "rewrite" => true, "slug" => 'testimonial-type'));
}

add_filter("manage_edit-testimonial_columns", "testimonial_manager_edit_columns");

function testimonial_manager_edit_columns($columns) {
    $columns = array(
        "title" => "Testimonial Name",
        "description" => "Description"
    );
    return $columns;
}
        
add_action("manage_testimonial_posts_custom_column", "testimonial_manager_custom_columns");

function testimonial_manager_custom_columns($column) {

    global $post;
    switch ($column) {
        case "title" :
            the_title();
            break;
        case "description":
            echo the_excerpt();
            break;
        
    }
}

function restrict_books_by_genre() {
    global $typenow;
    $post_type = 'testimonial'; // change HERE
    $taxonomy = 'testimonial-type'; // change HERE
    if ($typenow == $post_type) {
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Show All {$info_taxonomy->label}"),
            'taxonomy' => $taxonomy,
            'name' => $taxonomy,
            'orderby' => 'name',
            'selected' => $selected,
            'show_count' => true,
            'hide_empty' => true,
        ));
    };
}

add_action('restrict_manage_posts', 'restrict_books_by_genre');

function convert_id_to_term_in_query($query) {
    global $pagenow;
    $post_type = 'testimonial'; // change HERE
    $taxonomy = 'testimonial-type'; // change HERE
    $q_vars = &$query->query_vars;
    if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}
add_filter('parse_query', 'convert_id_to_term_in_query');


add_action("add_meta_boxes", "testimonial_manager_add_meta");

function testimonial_manager_add_meta() {
    add_meta_box("testimonial-type", "Name", "testimonial_manager_meta_options", "testimonial", "normal", "high");
}

//Create area for extra fields
function testimonial_manager_meta_options() {
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;

    $custom = get_post_custom($post->ID);
    ?>  
    <style  rel="stylesheet">   
      <?php require_once ('admin.css'); ?>
                                                                                      
    </style>
    <table class="tableform">
        <thead>
            <tr> 
               
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            <tr>              
                <td>
                    <input name="author" value="<?= $custom["author"][0]; ?>"/>
                </td>
            </tr>        
        </tbody>
    </table>
    <?php
}

add_action('save_post', 'testimonial_manager_save_extras');

function testimonial_manager_save_extras() {
    global $post;
    if (get_post_type($post) != "testimonial")
        return $post_id;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { //if you remove this the sky will fall on your head.
        return $post_id;
    } else {
        update_post_meta($post->ID, "author", $_POST["author"]);
      
    }
}
?>
