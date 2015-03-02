<?php /* Template Name: Template About us */ get_header(); ?>

<div class="other-page">
    <div class='container'>
        <h1 class='title'><?php the_title() ?></h1>
        <?php
        while (have_posts()):the_post();
          the_content();
        endwhile;
        ?>
    </div>
</div>
<?php get_footer();
?>