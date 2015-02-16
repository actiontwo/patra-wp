<?php /* Template Name: Template Portfolio */ get_header(); ?>

<div class="portfolio-page other-page">
    <div class="container">
        <h1 class="title"><?php the_title() ?></h1>

        <ul class='portfolio-slider'>
            <?php
            $query = array(
              'post_type' => 'portfolios',
              'posts_per_page' => -1
            );
            $wpQuery = new WP_Query($query);
            while ($wpQuery->have_posts()):$wpQuery->the_post();
              ?>
              <li><?php the_post_thumbnail() ?></li>
            <?php endwhile; ?>
        </ul>

        <div class='portfolio-content'>
            <?php
            $wpQuery = new WP_Query($query);
            while ($wpQuery->have_posts()):$wpQuery->the_post();
              ?>
              <div class='portfolio-content-detail'>
                  <ul class='portfolio-content-detail-slider'>
                      <?php
                      $custom = get_post_custom();
                      $photos = split(" ", $custom['photoSlidePortfolio'][0]);
                      foreach ($photos as $photo):
                        ?>
                        <li><img src='<?= $photo ?>'/></li>
                      <?php endforeach; ?>
                  </ul>
                  <div class='portfolio-content-desc'>
                      <div class='title-content-desc'>
                          <?php the_title() ?>
                      </div>
                      <?php the_content() ?>
                  </div>
              </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>