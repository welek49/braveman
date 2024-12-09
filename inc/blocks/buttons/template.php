<?php
$allowed_blocks = array('bn/button');
$visibility = !empty(get_field('buttons_block_visibility') && is_array(get_field('buttons_block_visibility'))) ? implode(' ', get_field('buttons_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('buttons_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('buttons_styles_space_settings'))) : null;
?>

<div class="buttons-group <?= $spaces ?> <?= $add_class ?> <?= $visibility ?>">
    <InnerBlocks allowedBlocks="<?= esc_attr(wp_json_encode($allowed_blocks)) ?>" />
</div>