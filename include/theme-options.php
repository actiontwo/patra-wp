<?php
// create custom plugin settings menu
add_action('admin_menu', 'director_create_menu');

function director_create_menu() {
//create new submenu
  add_submenu_page('themes.php', 'Theme Options', 'Theme Options', 'administrator', __FILE__, 'director_settings_page');

//call register settings function
  add_action('admin_init', 'director_register_settings');
}

function director_register_settings() {
//register our settings

  $arg = array(
    'Logo' => 'logo',
    'Phone Number' => 'phoneNumber',
    'Facebook' => 'facebook',
    'Email' => 'emailInfo',
    'Address' => 'address',
    'Copyright' => 'copyright',
    'Design By' => 'designBy',
  );

  foreach ($arg as $items => $value) {
    register_setting('settings-group', $value);
  }
}

function director_settings_page() {
  ?> 
  <style> 
      table input,table textarea{
          width: 300px;
      }
  </style>
  <div class="wrap">
      <h2>Theme Settings</h2>
      <form id="landingOptions" method="post" action="options.php">
          <?php settings_fields('settings-group'); ?>
          <table class="form-table">
              <tr valign = "top">
                  <th scope = "row">Logo:</th>
                  <td>
                      <input type = "text" name = "logo" value = "<?php print get_option('logo'); ?>" placeholder='uploads/sites/4/2015/01/logo1.png' />
                      <div style = "padding:10px; background:#dedede; display:inline-block">
                          <img src = "<?php print get_home_url() . "/wp-content/" . get_option('logo'); ?>" />
                      </div>
                      <br/>
                      *Upload using the Media Uploader and paste the URL
                      here.
                  </td>
              </tr>
              <tr valign = "top">
                  <th scope = "row">Phone Number:</th>
                  <td>
                      <input type = "text" name = "phoneNumber"
                             value = "<?php print get_option('phoneNumber'); ?>" placeholder="(02)9597 6788" />
                  </td>
              </tr>
              <tr valign = "top">
                  <th scope = "row">Email :</th>
                  <td>
                      <input type = "text" name = "emailInfo" value = "<?php print get_option('emailInfo'); ?>" placeholder="info@patragroup.con.au" />
                  </td>
              </tr>
              <tr valign = "top">
                  <th scope = "row">Address :</th>
                  <td>
                      <input type = "text" name = "address" value = "<?php print get_option('address'); ?>" placeholder="4/450 West Botany Street, Rockdale NSW, 2216" />
                  </td>
              </tr>
              <tr valign = "top">
                  <th scope = "row">Copyright Text:</th>
                  <td>
                      <input style="width:100%" type = "text" name = "copyright" value = "<?php print get_option('copyright'); ?>" placeholder="Copyright © 2014 Patra Group Pty Ltd.All rights reserved." />
                  </td>
              </tr>
              

              <tr valign = "top">
                  <th scope = "row">Design by:</th>
                  <td>
                      <input type = "text" name = "designBy" value = "<?php print get_option('designBy'); ?>" placeholder='Designed by Openseed' />

                  </td>
              </tr>
              
              <tr valign = "top">
                  <th scope = "row">Facebook link:</th>
                  <td>
                      <input type = "text" name = "facebook" value = "<?php print get_option('facebook'); ?>" placeholder='' />

                  </td>
              </tr>
          </table>
          <p class="submit">
              <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
          </p>
      </form>
  </div>
<?php } ?>

