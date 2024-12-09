<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$background_image = get_field('block_background');
$background_video = get_field('block_video');
$background_video_mobile = get_field('block_video_mobile') ? get_field('block_video_mobile') : $background_video;
$visibility = !empty(get_field('hero_slider_block_visibility') && is_array(get_field('hero_slider_block_visibility'))) ? implode(' ', get_field('hero_slider_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
?>

<section class="fullwidth hero-slider <?= $add_class ?> <?= $visibility ?>" style="background-image: url('<?= $background_image && !$background_video ? $background_image : '' ?>');">
    <?php if ($background_video) : ?>
        <video class="hero-slider__video" autoplay muted loop playsinline>
            <source class="hero-slider__video-source" src="" data-src="<?= $background_video ?>" data-mobile="<?= $background_video_mobile ?>">
        </video>
    <?php endif; ?>
    <div class="hero-slider__container boxwidth">
        <?php if (have_rows('slides')) : ?>
            <div class="hero-slider__slides-wrapper">
                <div class="hero-slider__slides">
                    <?php while (have_rows('slides')) : the_row();
                        $title = get_sub_field('title');
                        $desc = get_sub_field('description');
                        $button = get_sub_field('button');
                    ?>

                        <div class="hero-slider__single">
                            <?php if ($title) : ?>
                                <h1 class="hero-slider__single-title"><?= $title ?></h1>
                            <?php endif;
                            if ($desc) : ?>
                                <p class="hero-slider__single-desc"><?= $desc ?></p>
                            <?php endif;
                            if ($button) : ?>
                                <a href="<?= $is_preview ? '#void' : $button['url'] ?>" target="<?= $button['target'] ? $button['target'] : '_self' ?>" class="hero-slider__single-button btn-flat-primary"><?= $button['title'] ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>