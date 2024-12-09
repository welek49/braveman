<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('logotypes_list_block_visibility') && is_array(get_field('logotypes_list_block_visibility'))) ? implode(' ', get_field('partners_list_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$logotypes = get_field('list') ?? null;
$image_size = get_field('img_size') ?? 'full';
?>

<div class="logotypes-list <?= $add_class ?> <?= $visibility ?>">
    <div class="logotypes-list__wrapper">
        <?php if ($logotypes) : ?>
            <div class="logotypes-list__slider">
                <?php foreach ($logotypes as $logotype) : ?>
                    <div class="logotypes-list__col">
                        <?php if ($logotype['url']) : ?>
                            <a href="<?= $is_preview ? '#void' : $logotype['url']['url'] ?>" <?= $logotype['url']['target'] ? 'target="' . $logotype['url']['target'] . '"' : null ?>>
                            <?php endif; ?>
                            <?php
                            echo wp_get_attachment_image($logotype['image'], $image_size);
                            ?>
                            <?php if ($logotype['url']) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>