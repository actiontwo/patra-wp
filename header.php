<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>Your Site</title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!--if lt IE 9
        script(src='js/html5shiv.min.js')
        script(src='js/respond.min.js')
        -->
        <!-- stylesheet-->
        <link rel="icon" type="image/png" href="<?= IMG ?>favicon.ico">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="//use.typekit.net/dyz7gkx.js"></script>
        <script>try {
            Typekit.load();
          } catch (e) {
          }</script>
<?php wp_head() ?>
    </head>
    <body>
        <div class="home-page page">
            <div class="slider">
                <div id="header" class="header">
                    <div class="container">
                        <a href="<?= home_url() ?>" class="logo">
                            <?php if (get_option('logo')): ?>
                              <img src="<?= get_home_url() . "/wp-content/" . get_option('logo') ?>">
<?php else : ?>
                              <img src="<?= IMG ?>logo.png">
                        <?php endif ?>
                            <div class="logo-traingle"></div>

                        </a>
                        <?php
                        $phoneNumber = '(02)9597 6788';
                        $email = 'info@patragroup.con.au';
                        $address = '4/450 West Botany Street, Rockdale NSW, 2216';
                        if (get_option('phoneNumber')) {
                          $phoneNumber = get_option('phoneNumber');
                        }
                        if (get_option('emailInfo')) {
                          $email = get_option('emailInfo');
                        }
                        if (get_option('address')) {
                          $address = get_option('address');
                        }
                        $phoneNumberRe = preg_replace('/[^0-9]/', '', $phoneNumber);
                        ?>
                        <div class="navbar">
                            <div class="info">
                                <span><a href='tel:<?= $phoneNumberRe ?>'><?= $phoneNumber ?></a></span>
                                <span><a href="mailto:<?= $email ?>"><?= $email ?></a></span>
                                <span><?= $address ?></span>
                            </div>
                            <?php
                            $topMenu = array(
                              'theme_location' => 'topMenu',
                              'container' => '',
                              'container_id' => 'header_menu',
                              'menu_class' => 'menu',
                              'menu' => '',
                              'walker' => new Top_Menu_Walker
                            );
                            wp_nav_menu($topMenu);
                            ?>
                        </div>
                        <div class="enquire">
                            <div class="btn-enquire"><i class="iconsp-35-enquire"></i><span>enquire</span></div>
                        </div>
                    </div>
                </div>
                <div class="box-enquire">

                    <?php
                    $query = new WP_Query('pagename=get-in-touch');

                    while ($query->have_posts()):$query->the_post();
                      the_content();
                    endwhile;
                    wp_reset_query();
                    ?>

                    <div class="bg-contac-form"><img src="<?= IMG ?>bottom-bg-form.png"></div>
                </div>
                <div id="header-mobile" class="header">
                    <?php
                    $topMenuMobile = array(
                      'theme_location' => 'top-menu-mobile',
                      'container' => '',
                      'container_id' => 'header_menu',
                      'menu_class' => 'menu',
                      'menu_id' => 'menu',
                      'menu' => 'menu',
                      'walker' => new Top_Menu_Walker
                    );
                    wp_nav_menu($topMenuMobile);
                    ?>
                    <div id="main-menu"><a href="<?= home_url() ?>" class="logo"><img src="<?= IMG ?>logo.png">
                            <div class="logo-traingle"></div></a>
                        <div class="contact-mobile">
                            <ul>
                                <li><a href="mailto:<?= $email ?>" target="_blank"><i class="iconsp-35-email"></i></a></li>
                                <li>
                                    <a href="https://www.google.com.au/maps/place/450-464+W+Botany+St,+Rockdale+NSW+2216/@-33.960414,151.145595,17z/data=!3m1!4b1!4m2!3m1!1s0x6b12b756afab412b:0x7be2c525df1e34c" target="_blank">
                                        <i class="iconsp-35-location"></i>
                                    </a>
                                </li>
                                <li><a href="tel:<?= $phoneNumberRe ?>"><i class="iconsp-35-phone-white"></i></a></li>
                            </ul><a href="tel:<?= $phoneNumberRe ?>" class="phone-mobile"><i class="iconsp-35-phone-black"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                if (is_home())
                  require_once 'module/slider.php';
                ?>

            </div>
