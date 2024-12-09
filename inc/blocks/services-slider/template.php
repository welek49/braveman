<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('services_slider_block_visibility') && is_array(get_field('services_slider_block_visibility'))) ? implode(' ', get_field('services_slider_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
?>

<div class="services-slider fullwidth <?= $add_class ?> <?= $visibility ?>">
    <?php if (have_rows('services')) : ?>
    <div class="services-slider__wrapper boxwidth">
        <div class="services-slider__slides">
            <?php while (have_rows('services')) : the_row();
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $desc = get_sub_field('description');
                $link = get_sub_field('link');
            ?>
                <div class="services-slider__slide-wrapper">
                    <?php if ($link) : ?>
                        <a href="<?= $is_preview ? '#void' : $link ?>" class="services-slider__slide services-slider__slide--link">
                    <?php else : ?>
                        <div class="services-slider__slide">
                    <?php endif; ?>
                    <?php if ($icon) : ?>
                        <div class="services-slider__icon-wrapper">
                            <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                        </div>
                    <?php endif;
                    if ($title) : ?>
                        <h4 class="services-slider__title"><?= $title ?></h4>
                    <?php endif;
                    if ($desc) : ?>
                        <p class="services-slider__desc"><?= $desc ?></p>
                    <?php endif; ?>
                    <?php if ($link) : ?>
                        </a>
                    <?php else : ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
</div>