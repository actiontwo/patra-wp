<?php
add_action('init', 'create_post_type_service');

function create_post_type_service() {
  register_post_type('services', array(
    'labels' => array(
      'name' => __('Services'),
      'singular_name' => __('Services'),
      'add_new_item' => __('Add New Service')
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail')
      )
  );
  register_taxonomy("services-type", array("services"), array(
    "hierarchical" => true,
    "label" => "Services Type",
    "singular_label" => "Services Type",
    "rewrite" => true,
    "slug" => 'services-type'));
}

add_action("add_meta_boxes", "service_manager_add_meta");

function service_manager_add_meta() {
  add_meta_box("service-meta", "Service Options", "service_manager_meta_options", "services", "normal", "high");
}

//Create area for extra fields
function service_manager_meta_options() {
  global $post;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return $post_id;

  $custom = get_post_custom($post->ID);
  $photo_hardware = 7;
  ?>
  <style type="text/css">
  <?php require_once __DIR__ . '/admin.css'; ?>
  </style>

  <?php
  //add function add image'
  // 
  require __DIR__ . '/../module/add_image.php';
  ?>
  
  <h3> Service slide</h3>
  <a  class="more-image" data-image='#photo' data-temp='photoslide'>Add more</a>
  <ul class="imageOptions" id='photo'>
      <?php
      $temp = 'photoslide';
      $link = array();
      
      $link = split(" ", $custom['photoslide'][0]);
      $i = 0;

      foreach ($link as $value) :
        $name = $temp . '_' . $i;
        ?>
        <li class="wrapper-image">
            <input type="hidden" name="<?= $name ?>" value="<?php echo $value; ?>" id="in_<?= $name ?>" />

            <img src="<?php echo $value; ?>"  alt="click to add image" id="<?= $name ?>" class="add_image" data="<?= $name ?>"/>
            <span class="delete-image" data="<?= $name ?>">X</span>
        </li>  
        <?php
        $i++;
      endforeach;
      ?>
  </ul>
  <h3> Branch slide</h3>
  <a  class="more-image" data-image='#branch' data-temp='logoSlide'>Add more</a>
  <ul class="imageOptions" id='branch'>
      <?php
      $temp = 'logoSlide';
      $link = array();
      $link = split(" ", $custom['logoSlide'][0]);
      $i = 0;

      foreach ($link as $value) :
        $name = $temp . '_' . $i;
        ?>
        <li class="wrapper-image">
            <input type="hidden" name="<?= $name ?>" value="<?php echo $value; ?>" id="in_<?= $name ?>" />

            <img src="<?php echo $value; ?>"  alt="Add Image" id="<?= $name ?>" class="add_image" data="<?= $name ?>"/>
            <span class="delete-image" data="<?= $name ?>">X</span>
        </li>  
        <?php
        $i++;
      endforeach;
      ?>
  </ul>
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
        jQuery('.more-image').click(function () {
            var mainEl = $(this).data('image');
            var temp = $(this).data('temp');
            var length = jQuery(mainEl + ' li').length;

            var html = '<li class="wrapper-image">';
            html += '<input type="hidden" name="' + temp + '_' + length + '" value="delete" id="in_' + temp + '_' + length + '" />';

            html += '<img src=" "  alt="Add Image" id="' + temp + '_' + length + '" class="add_image" data="' + temp + '_' + length + '"/>';
            html += '<span class="delete-image" data="' + temp + '_' + length + '">X</span>';
            html += '</div> ';
            html += '</li>';
            jQuery(mainEl + ' li:first-child').before(html);
            add();
        });
    });

  </script>
  <?php
}

add_action('save_post', 'new_manager_save_extras');

function new_manager_save_extras() {

  global $post;
  if (get_post_type($post) != "services")
    return $post_id;

  foreach ($_POST as $key => $value) {
    //  echo $key."<br>";    
    if (strpos($key, 'photoslide') !== FALSE) {
      if ($_POST[$key] !== 'delete') {
        $save .= $_POST[$key] . " ";
      }
    }
    if (strpos($key, 'logoSlide') !== FALSE) {
      if ($_POST[$key] !== 'delete') {
        $saveLogo .= $_POST[$key] . " ";
      }
    }
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { //if you remove this the sky will fall on your head.
    return $post_id;
  } else {
    update_post_meta($post->ID, "photoslide", trim($save));
    update_post_meta($post->ID, "logoSlide", trim($saveLogo));
  }
}
