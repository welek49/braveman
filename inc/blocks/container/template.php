<?php
$add_id = get_field('container_id') ? get_field('container_id') : null;
$visibility = !empty(get_field('container_block_visibility') && is_array(get_field('container_block_visibility'))) ? implode(' ', get_field('container_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('container_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('container_styles_space_settings'))) : null;
$background_pattern = get_field('container_background_pattern') ? str_replace('none', '', get_field('container_background_pattern')) : null;
$content_align_horizontal = isset(get_field('container_content_align_settings')['horizontal']) ? implode(' ', get_field('container_content_align_settings')['horizontal']) : null;
$content_align_vertical = isset(get_field('container_content_align_settings')['vertical']) ? implode(' ', get_field('container_content_align_settings')['vertical']) : null;
$content_align = $content_align_horizontal || $content_align_vertical ? 'flex ' . $content_align_horizontal . ' ' . $content_align_vertical  : '';
$animation_name = get_field('container_animation_name') ? get_field('container_animation_name') : null;
$animation_delay = get_field('container_animation_delay') ? get_field('container_animation_delay') : null;
?>

<div <?= $add_id ? 'id="' . $add_id . '"' : '' ?> class="bn-container <?= $spaces ?> <?= $background_pattern ?> <?= $content_align ?> <?= $add_class ?> <?= $visibility ?>" <?= $animation_name ? 'data-aos="'. $animation_name . '"' : "" ?><?= $animation_delay ? 'data-aos-delay="'. $animation_delay .'"' : "" ?>>
    <InnerBlocks allowedBlocks="all" />
</div>