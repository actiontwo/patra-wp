<div class="wrapper-main-bxslider">
    <ul class="main-bxslider">
        <?php
        $query = array(
          'post_type' => 'Gallery',
          'posts_per_page' => -1
        );
        query_posts($query);
        if (have_posts()):while (have_posts()):the_post();
            ?>
            <li>
                <?php the_post_thumbnail() ?>
                <div class="title">
                    <h3><?php the_title() ?></h3>
                    <span><?php the_content() ?></span>
                </div>
            </li>
            <?php
          endwhile;
        endif;
        ?> 
    </ul>
</div>