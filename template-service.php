<?php /* Template Name: Template Serivce */ get_header(); ?>
<div class="services-page other-page">
    <div class="container">
        <h1 class="title"><?php the_title() ?></h1>
        <ul class="nav nav-pills nav-justified services-list">
            <?php
            $itemsMenu = wp_get_nav_menu_items('service-menu');
            foreach ($itemsMenu as $menu):
              $postID = $menu->object_id;
              $postMain = get_post($postID);
              $slug = $postMain->post_name;
              ?>

              <li id="li_<?= $slug ?>" >
                  <a href="#<?= $slug ?>" class="tab-click-service" data-tab="#tab_<?= $menu->object_id ?>">
                      <h4 class="sub-title"><span><?= $menu->title ?></span></h4></a>
                  <div class="traingle"> </div>
              </li>
            <?php endforeach; ?>

        </ul>
        <div class="tab-content services-list-content">
            <?php
            foreach ($itemsMenu as $menu):
              $postID = $menu->object_id;
              $post = get_post($postID);

              $slug = $post->post_name;
              ?>
              <div id="tab_<?= $menu->object_id ?>" class="tab-pane tab-pane-service <?= $slug ?>">

                  <ul class="nav nav-pills nav-stacked col-md-3">
                      <?php
                      $query = array(
                        'post_type' => 'services',
                        'services-type' => $slug,
                        'posts_per_page' => -1
                      );
                      $wpQuery = new WP_Query($query);
                      while ($wpQuery->have_posts()):$wpQuery->the_post();
                        $postService = get_post(get_the_ID());
                        $slugService = $postService->post_name;
                        ?>
                        <li><a href="#<?= $slug . '_' . $slugService ?>" data-toggle="pill"><?php the_title() ?></a></li>
                      <?php endwhile; ?>
                  </ul>
                  <div class="tab-content col-md-9">
                      <div class="tab-pane active tab-landing">
                          <?php $postMain = get_post($postID); ?>
                          <div class="content-pane">
                              <div class="img_thumnail">
                                  <?= get_the_post_thumbnail($postMain->ID); ?>  
                              </div>
                              <?= $postMain->post_content; ?>

                          </div>
                      </div>
                      <?php
                      wp_reset_query();
                      $wpQuery = new WP_Query($query);
                      while ($wpQuery->have_posts()):$wpQuery->the_post();
                        $postService = get_post(get_the_ID());
                        $slugService = $postService->post_name;
                        $mainSlug = $slug . '_' . $slugService;
                        ?>
                        <div id="<?= $mainSlug ?>" class="tab-pane">
                            <div class="content-pane">
                                <?php
                                $custom = get_post_custom();
                                $photos = split(" ", $custom['photoslide'][0]);
                                $branch = split(" ", $custom['logoSlide'][0]);
//                                echo '<pre>';
//                                var_dump($photos);
//                                echo count($photos);
                                if (count($photos) > 1 && $photos[0] != "") :
                                  ?>
                                  <ul class="image-content" style="<?= (trim(get_the_content()) == '' ) ? 'float:none;margin-left:0' : '' ?>">
                                      <div id="slider-<?= $mainSlug ?>" data-ride="carousel" class="carousel slide">
                                          <ol class="carousel-indicators">
                                              <?php foreach ($photos as $key => $photo) : ?>
                                                <li data-target="#slider-<?= $mainSlug ?>" data-slide-to="<?= $key ?>" class="<?= ($key == 0) ? 'active' : '' ?>"></li>
                                              <?php endforeach; ?>
                                          </ol>
                                          <div class="carousel-inner">
                                              <?php foreach ($photos as $key => $photo) : ?>
                                                <div class="item  <?= ($key == 0) ? 'active' : '' ?>">
                                                    <img src="<?= $photo ?>" alt="...">
                                                    <div class="carousel-caption">
                                                        <label>Client Name</label><span>2014</span>
                                                    </div>
                                                </div>
                                              <?php endforeach; ?>
                                          </div>
                                      </div>
                                  </ul>
                                <?php endif; ?>

                                <?php the_content() ?>

                                <div class="clearfix"></div>
                                <?php if (count($branch) > 1 && $branch[0] != "") : ?>
                                  <h4 class="title-brand-product">Browse other brands for this product:</h4>
                                  <div class="slide-logo col-md-12">
                                      <?php foreach ($branch as $value): ?>
                                        <div><img src="<?= $value?>"></div>
                                        
                                      <?php endforeach; ?>
                                  </div>
                                  <div class="clearfix"></div>
                                <?php endif; ?>
                            </div>

                        </div>

                      <?php endwhile; ?>

                  </div>
                  <div class="clearfix"></div>
              </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>

<script>
  var query = location.href.split('#');
  var page = 'stainless-steel-fabrication';
  if (query[1]) {
      page = query[1];
  }
  $('#li_' + page + ' ,.' + page).addClass('active');

</script>
<?php get_footer(); ?>