<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('horizontal_tabs_block_visibility') && is_array(get_field('horizontal_tabs_block_visibility'))) ? implode(' ', get_field('horizontal_tabs_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$title = get_field('title') ? get_field('title') : get_the_title();
$tabs = get_field('tabs') ? get_field('tabs') : null;
$count = count($tabs);

for ($i = 0; $i < $count; $i++) {
    $keys[$i] = generateRandomString(10);
}
?>

<div class="fullwidth row horizontal-tabs">
    <div class="col col-xxs-12 horizontal-tabs-navigation">
        <h2><?= $title ?></h2>

        <div class="horizontal-tabs-navigation__buttons">
            <?php $index = 0; ?>
            <?php foreach ($tabs as $tab) : ?>
                <?php $title = $tab['title']; ?>
                <span class="<?= $index == 0 ? 'btn-flat-primary' : 'btn-flat-secondary' ?>" data-tab-nav="<?= $keys[$index] ?>"><?= $title ?></span>
                <?php $index++ ?>
            <?php endforeach ?>
        </div>
        <div class="horizontal-tabs-navigation__select">
            <select name="" id="">
                <?php $index = 0; ?>
                <?php foreach ($tabs as $tab) : ?>
                    <?php $title = $tab['title']; ?>
                    <option value="<?= $keys[$index] ?>"><?= $title ?></option>
                    <?php $index++ ?>
                <?php endforeach ?>
            </select>
        </div>

    </div>
    <div class="col col-xxs-12">
        <?php $index = 0; ?>
        <?php foreach ($tabs as $tab) : ?>
            <?php $title = $tab['title']; ?>
            <?php $gallery = $tab['gallery']; ?>

            <div class="horizontal-tabs-tab bn-gallery-container <?= $index == 0 ? '--show' : '' ?>" data-tab="<?= $keys[$index] ?>">
                <?php foreach ($gallery as $image) : ?>
                    <a href="<?= $is_preview ? '#void' : $image['url'] ?>" data-cropped="true" data-pswp-width="<?= $image['width'] ?>" data-pswp-height="<?= $image['height'] ?>" class="horizontal-tabs-tab__item --a">
                        <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                    </a>
                <?php endforeach ?>
            </div>
            <?php $index++ ?>
        <?php endforeach ?>

    </div>
</div>