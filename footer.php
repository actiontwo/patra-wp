<footer class="footer">
    <div class="container">
        <ul>
            <li><a href="<?= get_option('facebook') ?>"><i class="iconsp-35-facebook"></i></a><a href="privacy-policy/">Privacy Policy</a></li>
            <li>
                <?php if (get_option('copyright')): ?>
                  <span><?= get_option('copyright') ?></span>
                <?php else : ?>
                  <span>Copyright © 2014 Patra Group Pty Ltd.</span>
                  <span>All rights reserved.</span>
                <?php endif ?>

            </li>
            <li>
                <?php if (get_option('designBy')): ?>
                  <span><?= get_option('designBy') ?></span>
                <?php else : ?>
                  <span>Designed by Openseed</span>
                <?php endif ?>

            </li>
        </ul>
    </div>
</footer>
</div>

<script src="<?= JS ?>jquery.bxslider.min.js" type="text/javascript"></script>
<script src="<?= JS ?>jquery.slicknav.min.js" type="text/javascript"></script>
<script src="<?= JS ?>bootstrap.min.js" type="text/javascript"></script>
<script src="<?= JS ?>jquery.slicknav.min.js" type="text/javascript"></script>
<script src="<?= JS ?>slick.min.js" type="text/javascript"></script>
<script src="<?= JS ?>script.js" type="text/javascript"></script>
<?php wp_footer() ?>



</body>
</html>