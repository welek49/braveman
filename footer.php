<?php
$facebook = get_field('facebook_link', 'option') ? get_field('facebook_link', 'option') : null;
$instagram = get_field('instagram_link', 'option') ? get_field('instagram_link', 'option') : null;
$linkedin = get_field('linkedin_link', 'option') ? get_field('linkedin_link', 'option') : null;
$youtube = get_field('youtube_link', 'option') ? get_field('youtube_link', 'option') : null;
$email_address = get_field('email_address', 'option') ? get_field('email_address', 'option') : '';
$copyright_text = get_field('copyright_text', 'option') ? get_field('copyright_text', 'option') : '';
?>
</div><!-- #CONTENT END -->
</main>

<footer class="footer fullwidth flex vertical vertical__center">
    <div class="row boxwidth">
        <div class="col col-xxs-12 col-xs-12 col-sm-4 footer__column">
            <object class="footer__logo" data="<?= IMAGES ?>" type="image/svg+xml">
                LOGO
            </object>
            <div class="footer__social">
                <?php if ($facebook) : ?>
                    <a href="<?= $facebook ?>" target="_blank"><svg>
                            <use href="#facebook" />
                        </svg></a>
                <?php endif;
                if ($instagram) : ?>
                    <a href="<?= $instagram ?>" target="_blank"><svg>
                            <use href="#instagram" />
                        </svg></a>
                <?php endif;
                if ($linkedin) : ?>
                    <a href="<?= $linkedin ?>" target="_blank"><svg>
                            <use href="#linkedin" />
                        </svg></a>
                <?php endif; ?>
                <?php if ($youtube) : ?>
                    <a href="<?= $youtube ?>" target="_blank"><svg>
                            <use href="#youtube" />
                        </svg></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col col-xxs-12 col-xs-12 col-sm-4 footer__column">

            <?php
            /*
                *
                * Widget - footer column 2
                * Remove it for adding custom elements
                *
                */
            if (is_active_sidebar("footer-2")) :
            ?>

                <div class=""><?php dynamic_sidebar("footer-2"); ?></div>
            <?php endif ?>
        </div>
        <div class="col col-xxs-12 col-xs-12 col-sm-4 footer__column">
            <?php
            /*
                *
                * Widget - footer column 2
                * Remove it for adding custom elements
                *
                */
            if (is_active_sidebar("footer-3")) :
            ?>

                <div class=""><?php dynamic_sidebar("footer-3"); ?></div>
            <?php endif ?>
        </div>
        <div class="col col-xxs-12 col-xs-12 footer__copyrights">
            <?= $copyright_text ?>
        </div>
    </div>
</footer>

<?php include(TMPSHARED . 'bn-popup.php')  ?>

<?php wp_footer(); ?>

</body>

</html>