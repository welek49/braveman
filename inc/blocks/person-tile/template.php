<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('person_tile_block_visibility') && is_array(get_field('person_tile_block_visibility'))) ? implode(' ', get_field('person_tile_block_visibility')) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$image = get_field('image');
$name = get_field('name');
$position = get_field('position');
$desc = get_field('description');
$email = get_field('email');
?>

<div class="person-tile fullwidth <?= $add_class ?> <?= $visibility ?>">
    <div class="person-tile__image-wrapper">
        <?php if ($image) : ?>

            <?php
            echo wp_get_attachment_image($image, 'person-tile', false, ['class' => "person-tile__image"]);
            ?>
        <?php endif; ?>
    </div>
    <?php if ($name) : ?>
        <h4 class="person-tile__name"><?= $name ?></h4>
    <?php endif;
    if ($position) : ?>
        <p class="person-tile__position"><?= $position ?></p>
    <?php endif;
    if ($desc) : ?>
        <p class="person-tile__desc"><?= $desc ?></p>
    <?php endif;
    if ($email) : ?>
        <a href="<?= $is_preview ? '#void' : ("mailto:" . $email) ?>" class="person-tile__email"><?= $email ?></a>
    <?php endif; ?>
</div>