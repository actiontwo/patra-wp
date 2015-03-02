<?php /* Template Name: Template Portfolio */ get_header(); ?>
<div class="portfolio-page other-page">
    <div class="container">
        <h1 class="title"><?php the_title() ?></h1>
        <div class="desktop-version">
            <ul class="portfolio-bxslider image-list services-list">
                <?php
                $query = array(
                  'post_type' => 'portfolios',
                  'posts_per_page' => -1
                );
                $wpQuery = new WP_Query($query);
                $countPost = 0;
                while ($wpQuery->have_posts()):$wpQuery->the_post();
                  ?>
                  <li class="<?= ($countPost == 0) ? 'active' : '' ?>">
                      <a href="#portfolio-<?= $post->post_name ?>" data-toggle="pill">
                          <?php the_post_thumbnail() ?>
                      </a>
                  </li>
                  <?php
                  $countPost++;
                endwhile;
                ?>
            </ul>
            <div class="tab-content">
                <?php
                $wpQuery = new WP_Query($query);
                $countPost = 0;
                while ($wpQuery->have_posts()):$wpQuery->the_post();
                  ?>
                  <div id="portfolio-<?= $post->post_name ?>" class="tab-pane <?= ($countPost == 0) ? 'active' : '' ?>">
                      <?php $countPost++ ?>
                      <div class="content-pane">
                          <ul class="image-content">
                              <div id="slider-portfolio-<?= $post->post_name ?>" data-ride="carousel" data-interval="false" class="carousel slide">
                                  <?php
                                  $custom = get_post_custom();
                                  $photos = split(" ", $custom['photoSlidePortfolio'][0]);
                                  if (count($photos) > 1 && $photos[0] != "") :
                                    ?>
                                    <ol class="carousel-indicators">                                  
                                        <?php foreach ($photos as $key => $photo):
                                          ?>
                                          <li data-target="#slider-portfolio-<?= $post->post_name ?>" data-slide-to="<?= $key ?>" class="<?= ($key == 0) ? 'active' : '' ?>"></li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php foreach ($photos as $key => $photo):
                                          ?>
                                          <div class="item <?= ($key == 0) ? 'active' : '' ?>">
                                              <img src="<?= $photo ?>" alt="...">
                                              <div class="carousel-caption"></div>
                                          </div>
                                        <?php endforeach; ?>
                                    </div>
                                  <?php endif; ?>
                              </div>
                          </ul>
                          <div class="company-info">
                              <div class="company-name">
                                  <?php the_title() ?>
                              </div>
                              <div class='company-detail'>
                                  <?php the_content() ?>
                              </div>
                          </div>
                      </div>
                  </div>

                  <?php
                  $countPost++;
                endwhile;
                ?>

            </div>
        </div>

        <div class="mobile-version">
            <div class="portfolio-bxslider-mobis">
                <ul>
                    <li>
                        <?php
                        $wpQuery = new WP_Query($query);
                        $countPost = 0;
                        while ($wpQuery->have_posts()):$wpQuery->the_post();
                          if ($countPost != 0 && $countPost % 6 == 0)
                            echo '</li><li>';
                          ?>
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#mobi-portfolio-<?= $post->post_name ?>" class="modal-portfolio-btn">
                              <?php the_post_thumbnail() ?>
                          </a>
                          <?php
                          $countPost++;
                        endwhile;
                        ?>

                    </li>
                </ul>
            </div>
            <div id="modal-portfolio">
                <?php
                $wpQuery = new WP_Query($query);
                $countPost = 0;
                while ($wpQuery->have_posts()):$wpQuery->the_post();
                  ?>
                  <div id="mobi-portfolio-<?= $post->post_name ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                      <span aria-hidden="true" class="iconsp-25-delete-black"></span>
                                  </button>
                                  <div class="content-pane">
                                      <div class="company-info">
                                          <div class="company-name">
                                              <?php the_title() ?>
                                          </div>
                                          <div class="company-detail">
                                              <?php the_content() ?>
                                          </div>
                                      </div>
                                      <div class="image-content">
                                          <div id="mobi-slider-portfolio-<?= $post->post_name ?>" data-ride="carousel" data-interval="false" class="carousel slide">
                                              <?php
                                              $custom = get_post_custom();
                                              $photos = split(" ", $custom['photoSlidePortfolio'][0]);
                                              if (count($photos) > 1 && $photos[0] != "") :
                                                ?>
                                                <ol class="carousel-indicators">                                  
                                                    <?php foreach ($photos as $key => $photo):
                                                      ?>
                                                      <li data-target="#mobi-slider-portfolio-<?= $post->post_name ?>" data-slide-to="<?= $key ?>" class="<?= ($key == 0) ? 'active' : '' ?>"></li>
                                                    <?php endforeach; ?>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <?php foreach ($photos as $key => $photo):
                                                      ?>
                                                      <div class="item <?= ($key == 0) ? 'active' : '' ?>">
                                                          <img src="<?= $photo ?>" alt="...">
                                                          <div class="carousel-caption"></div>
                                                      </div>
                                                    <?php endforeach; ?>
                                                </div>
                                              <?php endif; ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
                  $countPost++;
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>