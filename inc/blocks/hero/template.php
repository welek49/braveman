<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('hero_page_block_visibility') && is_array(get_field('hero_page_block_visibility'))) ? implode(' ', get_field('hero_page_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$title = get_field('title') ? get_field('title') : get_the_title();
$subtitle = get_field('subtitle') ? get_field('subtitle') : null;
$background = get_field('background') ? "background-image: url('" . get_field('background') . "')" : null;
$breadcrumbs = get_field('breadcrumbs') ? true : false;
?>

<section class="fullwidth flex vertical vertical__center hero <?= $add_class ?> <?= $visibility ?>" style="<?= $background ?>">
    <div class="boxwidth row horizontal__center hero__inner">
        <?php if ($breadcrumbs) : ?>
            <div class="col col-xxs-12">
                <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p class="breadcrumbs">', '</p>');
                    }
                ?>
            </div>
        <?php endif; ?>
        <div class="col col-xxs-12">
            <h1 class="title"><?= $title ?></h1>
            <div class="hero__second-line">
                <?= $subtitle ? '<p class="subtitle">' . $subtitle . '</p>' : '' ?>
            </div>
        </div>
    </div>
</section>