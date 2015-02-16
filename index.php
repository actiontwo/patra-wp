<?php get_header() ?>
<div class="services">
    <div class="container">
        <h1 class="title">services</h1>
        <?php
        $categoriesService = get_terms('services-type', array(
          'orderby' => 'DESC',
          'hide_empty' => false,
        ));
        ?>
        <ul class="services-list">
            <?php foreach ($categoriesService as $category) : ?>
              <li>
                  <h4 class="sub-title"><span><a href='<?= home_url()?>/services-2/#<?= $category->slug?>'><?= $category->name ?></a></span>
                      <div class="traingle"></div>
                  </h4>
                  <p><i class="<?= $category->description ?>"></i></p>
                  <ul class="name-list">
                      <?php
                      wp_reset_query();
                      $query = array(
                        'post_type' => 'services',
                        'services-type' => $category->slug,
                        'posts_per_page' => 4
                      );
                      $wpQuery = new WP_Query($query);
                      ?>
                      <?php if ($wpQuery->have_posts()):while ($wpQuery->have_posts()): $wpQuery->the_post() ?>
                          <li>
                              <a><span class='text-capitalize'><?php the_title() ?></a></span>
                          </li>
                          <?php
                        endwhile;
                      else :
                        echo 'not service';
                      endif;
                      ?>
                  </ul>

              </li>
            <?php endforeach; ?>
          
        </ul>
    </div>
</div>
<div class="why-choose">
    <div class="background-before"><img src="<?= IMG ?>before-why-choose.jpg" height="280"></div>
    <div class="container">
        <h1 class="title">why choose patra group</h1>
        <?php
        $query = array(
          'category_name' => 'about-us',
          'posts_per_page' => 3
        );
        query_posts($query);
        ?>
        <ul class="row">
            <?php if (have_posts()):while (have_posts()):the_post(); ?>
                <li class="col-md-4">
                    <h3 class="sub-title"><?php the_title() ?></h3>
                    <?php the_content() ?>
                </li>

              <?php endwhile; ?>

            <?php else : ?>
              <li class="col-md-4">
                  <h3 class="sub-title">experience</h3><span>Benefit 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
              </li>
              <li class="col-md-4">
                  <h3 class="sub-title">quality</h3><span>Benefit 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
              </li>
              <li class="col-md-4">
                  <h3 class="sub-title">modern</h3><span>Benefit 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
              </li>
            <?php endif; ?>
        </ul><a href="" class="read-more">read more about us</a>
    </div>
    <div class="background-after"><img src="<?= IMG ?>after-why-choose.jpg" height="143"></div>
</div>
<div class="testimonials">
    <div class="container">
        <h1 class="title">testimonials</h1>
        <ul class="testimonials-bxSlider">
            <li>
                <?php
                query_posts(array('post_type' => 'testimonial', 'posts_per_page' => -1));
                $countTes = 0;
                if (have_posts()) : while (have_posts()):the_post();
                    if ($countTes != 0) {
                      if ($countTes % 2 == 0) {
                        echo '</li><li>';
                      }
                    }
                    ?>
                    <div><a href="" class="logo-image">
                            <?php if (has_post_thumbnail()): the_post_thumbnail(); ?>
                            <?php else: ?>
                              <img src="<?= IMG ?>testimonials-logo-1.jpg">
                            <?php endif ?>
                        </a>
                        <div class="content">
                            <?php the_content() ?>
                            <?php
                            $custom_fields = get_post_custom();
                            ?>
                            <h4 class="company"><?php the_title() ?></h4><span><?= $custom_fields['author'][0] ?></span>
                        </div>
                    </div>

                    <?php
                    $countTes++;
                  endwhile;
                else :
                  ?>
              <li>
                  <div><a href="" class="logo-image"><img src="<?= IMG ?>testimonials-logo-1.jpg"></a>
                      <div class="content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci-didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer-citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
                          <h4 class="company">pasiri's</h4><span>Eastwood</span>
                      </div>
                  </div>
                  <div><a href="" class="logo-image"><img src="<?= IMG ?>testimonials-logo-1.jpg"></a>
                      <div class="content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci-didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer-citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
                          <h4 class="company">pasiri's</h4><span>Eastwood</span>
                      </div>
                  </div>
              </li>
              <li>
                  <div><a href="" style="padding-top: 24px;" class="logo-image"><img src="<?= IMG ?>testimonials-logo-2.jpg"></a>
                      <div class="content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci-didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer-citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
                          <h4 class="company">subway</h4><span>Marrickville</span>
                      </div>
                  </div>
                  <div><a href="" class="logo-image"><img src="<?= IMG ?>testimonials-logo-3.jpg"></a>
                      <div class="content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci-didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer-citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
                          <h4 class="company">garlos pies</h4><span>Eastwood</span>
                      </div>
                  </div>
              </li>
              <li>
                  <div><a href="" class="logo-image"><img src="<?= IMG ?>testimonials-logo-1.jpg"></a>
                      <div class="content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci-didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer-citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
                          <h4 class="company">pasiri's</h4><span>Eastwood</span>
                      </div>
                  </div>
                  <div><a href="" class="logo-image"><img src="<?= IMG ?>testimonials-logo-3.jpg"></a>
                      <div class="content">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci-didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer-citation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure</p>
                          <h4 class="company">garlos pies</h4><span>Eastwood</span>
                      </div>
                  </div>
              </li>
            <?php endif; ?>
            </li>

        </ul>
    </div>
</div>

<!--button.btn.btn-primary.btn-lg(type='button', data-toggle='modal', data-target='#myModal')-->
<!--#myModal.modal.fade(tabindex='-1', role='dialog', aria-labelledby='myModalLabel', aria-hidden='true')-->
<!--  .modal-dialog-->
<!--    .modal-content-->
<!--      .modal-header-->
<!--        button.close(type='button', data-dismiss='modal', aria-label='Close')-->
<!--          span(aria-hidden='true') &times;-->
<!--        h4#myModalLabel.modal-title Modal title-->
<!--      .modal-body-->
<!--      .modal-footer-->
<!--        button.btn.btn-default(type='button', data-dismiss='modal') Close-->
<!--        button.btn.btn-primary(type='button') Save changes-->




<?php get_footer(); ?>