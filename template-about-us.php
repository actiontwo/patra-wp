<?php /* Template Name: Template About us */ get_header(); ?>

<div class="about-page other-page">
    <div class="background-image"><img src="<?= IMG ?>about-background.png"></div>
    <div class='why-choose'>
        <div class="background-before"><img src="<?= IMG ?>before-why-choose.png" height="280"></div>
        <div class="container">

            <h1 class="title">about patra group</h1>
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
            </ul>
        </div>
        <div class="background-after"><img src="<?= IMG ?>after-why-choose.png" height="143"></div>
    </div>

    <div class='our-process'>
        <?php
        $query = array(
          'category_name' => 'our-process',
          'posts_per_page' => 1
        );
        query_posts($query);
        ?>
        <div class='container'>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <h1 class="title"><?php the_title() ?></h1>
                <div class='content-post'>
                    <?php the_content() ?>
                </div>

                <?php
              endwhile;
            else:
              echo 'No post';
            endif;
            ?>
        
        </div>
        <div class="background-after"><img src="<?= IMG ?>after-background-process.png" heigh="170"></div>
    </div>

    <div class = 'our-history'>
        <?php
        $query = array(
          'category_name' => 'our-history',
          'posts_per_page' => 1
        );
        query_posts($query);
        ?>
        <div class = 'container'>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>

                <h1 class="title"><?php the_title() ?></h1>
                <div class='content-post'>
                    <?php the_content() ?>
                </div>

                <?php
              endwhile;
            else:
              echo 'No post';
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer();
?>