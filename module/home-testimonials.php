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
                <div class="content tk-proxima-nova-alt">
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