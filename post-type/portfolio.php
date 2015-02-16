<?php
add_action('init', 'create_post_type_portfolio');

function create_post_type_portfolio() {
  register_post_type('portfolios', array(
    'labels' => array(
      'name' => __('Portfolios'),
      'singular_name' => __('Portfolios'),
      'add_new_item' => __('Add New Portfolio')
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail')
      )
  );
  register_taxonomy("portfolios-type", array("portfolios"), array(
    "hierarchical" => true,
    "label" => "Portfolios Type",
    "singular_label" => "Portfolios Type",
    "rewrite" => true,
    "slug" => 'portfolios-type'));
}

add_action("add_meta_boxes", "portfolio_manager_add_meta");

function portfolio_manager_add_meta() {
  add_meta_box("portfolio-meta", "Portfolio Options", "portfolio_manager_meta_options", "portfolios", "normal", "high");
}

//Create area for extra fields
function portfolio_manager_meta_options() {
  global $post;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return $post_id;
  $custom = get_post_custom($post->ID);
  ?>
  <style type="text/css">
  <?php require_once __DIR__ . '/admin.css'; ?>
  </style>

  <?php
  //add function add image'
  // 
  require __DIR__ . '/../module/add_image.php';
  ?>

  <h3> Portfolio slide</h3>
  <a  class="more-image" data-image='#photoPortfolio' data-temp='photoSlidePortfolio'>Add more</a>
  <ul class="imageOptions" id='photoPortfolio'>
      <?php
      $temp = 'photoSlidePortfolio';
      $link = array();
      $link = split(" ", $custom['photoSlidePortfolio'][0]);
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

add_action('save_post', 'new_manager_save_extras_portfolio');

function new_manager_save_extras_portfolio() {

  global $post;
  if (get_post_type($post) != "portfolios")
    return $post_id;

  foreach ($_POST as $key => $value) {
    //  echo $key."<br>";    
    if (strpos($key, 'photoSlidePortfolio') !== FALSE) {
      if ($_POST[$key] !== 'delete') {
        $save .= $_POST[$key] . " ";
      }
    }
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { //if you remove this the sky will fall on your head.
    return $post_id;
  } else {
    update_post_meta($post->ID, "photoSlidePortfolio", trim($save));
  }
}
