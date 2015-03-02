<?php /* Template Name: Template Contact */ get_header(); ?>

<div class="contact-page other-page">
    <div style="background-image: url('<?= IMG ?>map-contact.jpg');" class="map-contact"><a href="#"></a>
        <!--img(src='images/map-contact.jpg')-->
    </div>
    <div class="wrapper-contact bg-blue">
        <div class="container">
            <div class="why-choose">
                <?php if (have_posts()):while (have_posts()):the_post(); ?>
                    <h1 class="title"><?php the_title() ?></h1>    
                    <?=  the_content(); ?>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        $('br').remove();
    </script>
</div>
<?php get_footer();
?>