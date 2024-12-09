<?php
$visibility = !empty(get_field('wysiwyg_block_visibility') && is_array(get_field('wysiwyg_block_visibility'))) ? implode(' ', get_field('wysiwyg_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$text = get_field('wysiwyg_text') ? get_field('wysiwyg_text') : '';
$spaces = get_field('wysiwyg_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('wysiwyg_styles_space_settings'))) : null;
$align_text = get_field('wysiwyg_text_align') ? str_replace('none', '', implode(' ', get_field('wysiwyg_text_align'))) : null;
$no_margin = get_field('is_margin') ? get_field('is_margin') : false;
?>

<div class="bn-wysiwyg <?= $spaces ?> <?= $align_text ?> <?= $add_class ?> <?= $visibility ?> <?= $no_margin ? '--last-no-margin' : '' ?>">
    <?= $text ?>
</div>