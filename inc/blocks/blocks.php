<?php

/**
 *
 * Registers all blocks at once
 *
 */
add_action('init', 'register_acf_blocks');
function register_acf_blocks()
{
    $folders = scandir(BLOCKS);

    foreach ($folders as $folder) {
        $url =  glob(BLOCKS . $folder);
        register_block_type($url[0]);
    }
}


/**
 *
 * Add new category for blocks
 *
 */
add_filter('block_categories_all', function ($categories) {

    // Adding a new categories
    $section = array(
        'slug'  => 'custom-layout',
        'title' => 'These are used for building layout:'
    );
    array_unshift($categories, $section);

    $everywhere = array(
        'slug'  => 'content',
        'title' => 'These are used to display content:'
    );
    array_unshift($categories, $everywhere);

    return $categories;
});


/**
 *
 * Disable core blocks
 * If you need to add more core blocks - https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
 *
 */
add_filter('allowed_block_types_all', function () {

    $folders = glob(BLOCKS . '*', GLOB_ONLYDIR);

    /* this is a place for adding more core blocks */
    $blocks = ['core/video', 'core/block', 'core/shortcode', 'core/embed', 'core/table', 'core/legacy-widget'];

    foreach ($folders as $folder) {
        $folder = explode('/', $folder);
        $blocks[] = 'bn/' . $folder[count($folder) - 1];
    }
    return $blocks;
});

/**
 *
 * Block's preview in editor and inserter, add preview_image variable in object(example > attributes > data) block.json to make it work
 * Uplad screenshot in .png to /assets/block-previews/
 *
 * If block contains other blocks just use show_preview without checking in block's template if it's true or false and don't add return if it's yes
 *
 */
function show_preview($block, $is_preview) {
    if (isset($block['data']['preview_image'])) {
        $block_name = str_replace('bn/', '', $block['name']);
        echo '<img src="' . ASSETS . 'block-previews/' . $block_name . '.png" style="width:100%; height:auto;">';

        return true;
    } elseif ($is_preview) {
        echo '<p class="block-description">'. $block['description'] .'</p>';

        return true;
    }
}