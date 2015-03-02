<?php get_header() ?>

<div class="services">
    <div class="container">
       <?php require_once 'module/home-service.php';?>
    </div>
</div>

<div class="why-choose">
    <div class="background-before"><img src="<?= IMG ?>before-why-choose.jpg" height="280"></div>
    <div class="container">
        <h1 class="title">why choose patra group</h1>
        <?php require_once 'module/why-choose.php' ?>;
        </ul><a href="about/" class="read-more">read more about us</a>
    </div>
    <div class="background-after"><img src="<?= IMG ?>after-why-choose.jpg" height="143"></div>
</div>

<div class="testimonials">
    <div class="container">
      <?php require_once 'module/home-testimonials.php';?>
    </div>
</div>


<?php get_footer(); ?>