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
    <?php endif; ?><?php
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

