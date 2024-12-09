<?php

/**
 * Register theme styles and scripts
 */
function bn_styles_and_scripts()
{
    $api = get_field('api_key', 'option');

    wp_enqueue_style( 'bn-styles', get_template_directory_uri() . '/dist/css/main.css', array(), VER );
    wp_enqueue_script('bn-script', get_template_directory_uri() . '/dist/js/main.min.js', array(), VER, true);
    wp_enqueue_style( 'aos-animations', 'https://unpkg.com/aos@2.3.1/dist/aos.css', null, array(), false);
    wp_enqueue_script('aos-animations-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', ['jquery'], null, false);
    wp_enqueue_script('google-script', 'https://maps.googleapis.com/maps/api/js?key=' . $api . '&callback=Function.prototype', [], null, true);
    wp_enqueue_script('google-contact-map', get_template_directory_uri() . '/src/js/modules/google-map.js', ['jquery', 'google-script'], null, true);
}
add_action('wp_enqueue_scripts', 'bn_styles_and_scripts');


/**
 * Register admin login stylesheet.
 */
function bn_admin_login_styles()
{
    wp_enqueue_style('bn-admin-stylesheet', get_template_directory_uri() . '/dist/css/admin-login.css');
}
add_action('login_enqueue_scripts', 'bn_admin_login_styles');


/**
 * Register custom Gutenberg script and styles.
 */
function custom_gutenberg_script()
{
    wp_enqueue_script('blocks-js', get_template_directory_uri() . '/dist/js/blocks.js', array('wp-blocks', 'wp-i18n', 'wp-editor'), true);
    wp_enqueue_style('bn-admin-stylesheet', get_template_directory_uri() . '/dist/css/editor-styles.css');
}
add_action('enqueue_block_editor_assets', 'custom_gutenberg_script');