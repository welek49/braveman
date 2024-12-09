<?php
$visibility = !empty(get_field('link_block_visibility') && is_array(get_field('link_block_visibility'))) ? implode(' ', get_field('link_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$align_text = get_field('link_text_align') ? str_replace('none', '', implode(' ', get_field('link_text_align'))) : null;
$spaces = get_field('link_space_settings') ? str_replace('none', '', implode(' ', get_field('link_space_settings'))) : null;
$link = get_field('link_link') ? get_field('link_link') : null;
$animation_name = get_field('link_animation_name') ? get_field('link_animation_name') : null;
$animation_delay = get_field('link_animation_delay') ? get_field('link_animation_delay') : null;

if (is_array($link)) : ?>
    <a href="<?= $is_preview ? '#void' : $link['url'] ?>" target="<?= $link['target'] ?>" class="link <?= $add_class ?> <?= $align_text ?> <?= $spaces ?> <?= $visibility ?>" <?= $animation_name ? 'data-aos="'. $animation_name . '"' : "" ?><?= $animation_delay ? 'data-aos-delay="'. $animation_delay .'"' : "" ?>><?= $link['title'] ?></a>
<?php endif; ?>