<?php
$visibility = !empty(get_field('list_block_visibility') && is_array(get_field('list_block_visibility'))) ? implode(' ', get_field('list_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$columns = get_field('columns') ? get_field('columns') : null;
$type = get_field('type') ? get_field('type') : null;
$list_items = get_field('list_items') ? get_field('list_items') : null;
?>

<div class="bn-wysiwyg bn-list --col-<?= $columns ?> <?= $add_class ?> <?= $visibility ?>">
    <?php if ($type) : ?>
        <<?= $type ?>>
            <?php
            if ($list_items) :
                foreach ($list_items as $item) {
                    echo '<li>' . $item['list_item'] . '</li>';
                }
            endif;
            ?>
            </>
        <?php endif ?>
</div>