<?php
$facebook = get_field('facebook_link', 'option') ? get_field('facebook_link', 'option') : null;
$instagram = get_field('instagram_link', 'option') ? get_field('instagram_link', 'option') : null;
$linkedin = get_field('linkedin_link', 'option') ? get_field('linkedin_link', 'option') : null;
$youtube = get_field('youtube_link', 'option') ? get_field('youtube_link', 'option') : null;
$email_address = get_field('email_address', 'option') ? get_field('email_address', 'option') : '';
$copyright_text = get_field('copyright_text', 'option') ? get_field('copyright_text', 'option') : '';
$footer_logo = get_field('footer_logo', 'option') ? get_field('footer_logo', 'option') : '';
$footer_title = get_field('footer_title', 'option') ? get_field('footer_title', 'option') : '';
$footer_description = get_field('footer_description', 'option') ? get_field('footer_description', 'option') : '';
?>
</div><!-- #CONTENT END -->
</main>

<footer class="footer fullwidth flex vertical vertical__center">
    <div class="row boxwidth">
        <div class="col col-xxs-12 col-xs-12 col-sm-6 footer__column">
            <p class="footer__title"><?= $footer_title ?></p>
            <p class="footer__description"><?= $footer_description ?></p>
        </div>
        <div class="col col-xxs-12 col-xs-12 col-sm-6 footer__logo vertical__center">
            <img src="<?= $footer_logo['url'] ?>" alt="footer logo">
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
        <div class="col col-xxs-12 col-xs-12 footer__copyrights">
            <?= $copyright_text ?>
        </div>
    </div>
</footer>

<?php include(TMPSHARED . 'bn-popup.php')  ?>

<?php wp_footer(); ?>

</body>

</html>