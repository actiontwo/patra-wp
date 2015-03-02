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
          <h4 class="sub-title"><span><a href='<?= home_url() ?>/service/#<?= $category->slug ?>'><?= $category->name ?></a></span>
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