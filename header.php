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
        <link href="<?= CSS ?>bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="<?= CSS ?>style.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
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
                        <div class="navbar">
                            <div class="info">
                                <?php if (get_option('phoneNumber')): ?>
                                  <span>(02)9597 6788</span>
                                <?php else : ?>
                                  <span>(02)9597 6788</span>
                                <?php endif ?>

                                <?php if (get_option('emailInfo')): ?>
                                  <span><a href="mailto:<?= get_option('emailInfo') ?>"><?= get_option('emailInfo') ?></a></span>
                                <?php else : ?>
                                  <span>info@patragroup.con.au</span>
                                <?php endif ?>

                                <?php if (get_option('address')): ?>
                                  <span><?= get_option('address') ?></span>
                                <?php else : ?>
                                  <span>4/450 West Botany Street, Rockdale NSW, 2216</span>
                                <?php endif ?> 
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
                            <!--                            <ul class="menu">
                                <li><a href="">about</a></li>
                                <li class="service-hover"><a href="">services</a>
                                    <ul class="sub-menu">
                                        <li><a href="stainless-steel-fabrication.html" class="scroll">stainless steel fabrication</a></li>
                                        <li><a href="refrigeration.html" class="scroll">refrigeration</a></li>
                                        <li><a href="shopfitting.html" class="scroll">shopfitting</a></li>
                                        <li><a href="catering-equipment.html" class="scroll">catering equipment</a></li>
                                        <li><a href="design-consilation.html" class="scroll">design & consilation</a></li>
                                    </ul>
                                </li>
                                <li><a href="portfolio.html">portfolio</a></li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>-->
                        </div>
                        <div class="enquire">
                            <div class="btn-enquire"><i class="iconsp-35-enquire"></i><span>enquire</span></div>
                            <div class="box-enquire row">
                                <div class="box-left col-md-3">
                                    <div class="title">get in touch</div>
                                    <p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                                </div>
                                <div class="box-center col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="text" id="usr" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="usr" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <input type="text" id="usr" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" id="usr" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="usr" class="form-control">
                                    </div>
                                </div>
                                <div class="box-right col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="header-mobile" class="header">
                    <ul id="menu" class="menu">
                        <li><a href="about.html" class="scroll">about</a></li>
                        <li><a href="" class="scroll">services</a>
                            <ul>
                                <li><a href="" class="scroll">stainless steel fabrication</a></li>
                                <li><a href="" class="scroll">refrigeration</a></li>
                                <li><a href="" class="scroll">shopfitting</a></li>
                                <li><a href="" class="scroll">catering equipment</a></li>
                                <li><a href="" class="scroll">design & consilation</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio.html" class="scroll">portfolio</a></li>
                        <li><a href="contact.html" class="scroll">contact</a></li>
                        <li><a href="" class="scroll"><i class="iconsp-35-enquire-mobile"></i><span>enquire</span></a></li>
                    </ul>
                    <div id="main-menu"><a href="index.html" class="logo"><img src="<?= IMG ?>logo.png">
                            <div class="logo-traingle"></div></a>
                        <div class="contact-mobile">
                            <ul>
                                <li><a href="mailto:<?= get_option('emailINfo') ?>" target="_blank"><i class="iconsp-35-email"></i></a></li>
                                <li>
                                    <a href="https://www.google.com.au/maps/place/450-464+W+Botany+St,+Rockdale+NSW+2216/@-33.960414,151.145595,17z/data=!3m1!4b1!4m2!3m1!1s0x6b12b756afab412b:0x7be2c525df1e34c" target="_blank">
                                        <i class="iconsp-35-location"></i>
                                    </a>
                                </li>
                                <li><a href="tel:<?= preg_replace('/[^0-9]/', '', get_option('phoneNumber')) ?>"><i class="iconsp-35-phone-white"></i></a></li>
                            </ul><a href="tel:<?= preg_replace('/[^0-9]/', '', get_option('phoneNumber')) ?>" class="phone-mobile"><i class="iconsp-35-phone-black"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                if (is_home())
                  require_once 'module/slider.php';
                ?>

            </div>
