<?php
$visibility = !empty(get_field('button_block_visibility') && is_array(get_field('button_block_visibility'))) ? implode(' ', get_field('button_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$button_link = get_field('button_link') ? get_field('button_link') : null;
$button_type = get_field('button_button_type') ? get_field('button_button_type') : 'btn-flat-secondary';

if (is_array($button_link)) :
    if ($button_link['url'] != '' &&  $button_link['title'] != '') :
?>
        <a href="<?= $is_preview ? '#void' : $button_link['url'] ?>" target="<?= $button_link['target'] ?>" class="<?= $button_type . ' ' . $add_class . ' ', $visibility ?>"><?= $button_link['title'] ?></a>
<?php
    endif;
endif;
?>