<footer class="footer">
    <div class="container">
        <ul class="row">
            <li class="col-md-4"><a href="<?= get_option('facebook') ?>"><i class="iconsp-35-facebook"></i></a>
              <a href="http://openseed.com.au/~patragroup/privacy-policy/">Privacy Policy</a></li>
            <li class="col-md-5">
                <?php if (get_option('copyright')): ?>
                  <span><?= get_option('copyright') ?></span>
                <?php else : ?>
                  <span>Copyright © 2014 Patra Group Pty Ltd.</span>
                  <span>All rights reserved.</span>
                <?php endif ?>

            </li>
            <li class="col-md-3">
                <?php if (get_option('designBy')): ?>
                <a href="http://www.openseed.com.au" target="_blank"><span><?= get_option('designBy') ?></span></a>
                <?php else : ?>
                 <a href="http://www.openseed.com.au" target="_blank"><span>Designed by Openseed</span></a>
                <?php endif ?>

            </li>
        </ul>
    </div>
</footer>
</div>

<?php wp_footer() ?>

</body>
</html>