<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('numbers_tile_block_visibility') && is_array(get_field('numbers_tile_block_visibility'))) ? implode(' ', get_field('numbers_tile_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$number = get_field('number');
$title = get_field('title');
$desc = get_field('description');
$animation_name = get_field('numbers_tile_animation_name') ? get_field('numbers_tile_animation_name') : null;
$animation_delay = get_field('numbers_tile_animation_delay') ? get_field('numbers_tile_animation_delay') : null;
?>

<div class="numbers-tile <?= $add_class ?> <?= $visibility ?>" <?= $animation_name ? 'data-aos="'. $animation_name . '"' : "" ?><?= $animation_delay ? 'data-aos-delay="'. $animation_delay .'"' : "" ?>>
    <?php if ($number) : ?>
        <p class="numbers-tile__number-wrapper"><span class="numbers-tile__number" data-number="<?= $number ?>">0</span>+</p>
    <?php endif;
    if ($title) : ?>
        <h4 class="numbers-tile__title"><?= $title ?></h4>
    <?php endif;
    if ($desc) : ?>
        <p class="numbers-tile__desc"><?= $desc ?></p>
    <?php endif; ?>
</div>