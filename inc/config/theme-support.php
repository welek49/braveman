<?php

/**
 *
 * Add thumbnail support for posts
 *
 */
add_theme_support('post-thumbnails');
add_theme_support('editor-color-palette');
add_theme_support('responsive-embeds');

/**
 *
 * Add option pages with acf
 *
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => __('General options'),
        'menu_title' => __('Theme options'),
        'menu_slug' => 'theme_general_settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Footer options'),
        'menu_title' => __('Footer options'),
        'parent_slug' => 'theme_general_settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Social media'),
        'menu_title' => __('Social media'),
        'parent_slug' => 'theme_general_settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Popup'),
        'menu_title' => __('Popup'),
        'parent_slug' => 'theme_general_settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' => __('Google map'),
        'menu_title' => __('Google map'),
        'parent_slug' => 'theme_general_settings'
    ));
}

/**
 *
 * Register menus
 *
 */
function add_nav_menus()
{
    register_nav_menus(array(
        'header-menu' => 'Header menu', // for main menu
    ));
}
add_action('init', 'add_nav_menus');

/**
 *
 * Register a custom menu page.
 *
 */
function bn_register_menu_page()
{
    // add reusable blocks as menu link
    add_menu_page(
        __('Patterns'),
        'Patterns',
        'manage_options',
        'edit.php?post_type=wp_block',
        '',
        'dashicons-excerpt-view',
        8
    );

    // add instructions as menu page
    add_menu_page(
        'Instructions',
        'Instructions',
        'manage_options',
        'instructions',
        'theme_instructions',
        'dashicons-shortcode',
        2
    );
}
add_action('admin_menu', 'bn_register_menu_page');

/**
 *
 * include file with instructions about using themeplate
 *
 */
function theme_instructions()
{
    include TMP . 'admin-pages/instructions.php';
}

/**
 *
 * Google maps
 *
 */
function my_acf_google_map_api($api)
{
    $key = get_field('api_key', 'option');
    $api['key'] = $key;
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/**
 *
 * Add figure tag to image in wysiwyg editor, add data for lightbox
 *
 * TODO: figure how workaround jquery problem with update align image
 *
 */
function bn_wrap_attachments($html, $id, $caption, $title, $align, $url)
{
    $image = wp_get_attachment_image_src($id, 'full');
    $replace = 'data-cropped="true" data-pswp-width="' . $image[1] . '" data-pswp-height="' . $image[2] . '"';

    $html = preg_replace('/(<a.*?)>/', '$1 ' . $replace . '>', $html);

    $output = "<figure>";
    $output .= $html;
    $output .= "</figure>";
    return $output;
}
add_filter('image_send_to_editor', 'bn_wrap_attachments', 10, 9);


/**
 *
 * Register wigets.
 *
 */
function bn_widgets_init()
{
    if (get_field('header_menu_top', 'option')) {
        register_sidebar(array(
            'name'          => 'Menu top',
            'id'            => 'menu-top',
            'before_widget' => ' ',
            'after_widget'  => ' ',
            'before_title'  => ' ',
            'after_title'   => ' ',
        ));
    }

    if (get_field('header_menu_bottom', 'option')) {
        register_sidebar(array(
            'name'          => 'Menu bottom',
            'id'            => 'menu-bottom',
            'before_widget' => ' ',
            'after_widget'  => ' ',
            'before_title'  => ' ',
            'after_title'   => ' ',
        ));
    }

    if (get_field('header_before_hamburger', 'option')) {
        register_sidebar(array(
            'name'          => 'Before hamburger',
            'id'            => 'before-hamburger',
            'before_widget' => ' ',
            'after_widget'  => ' ',
            'before_title'  => ' ',
            'after_title'   => ' ',
        ));
    }

    if (get_field('header_after_hamburger', 'option')) {
        register_sidebar(array(
            'name'          => 'After hamburger',
            'id'            => 'after-hamburger',
            'before_widget' => ' ',
            'after_widget'  => ' ',
            'before_title'  => ' ',
            'after_title'   => ' ',
        ));
    }

    register_sidebar(array(
        'name'          => 'Footer column 2',
        'id'            => 'footer-2',
        'before_widget' => ' ',
        'after_widget'  => ' ',
        'before_title'  => ' ',
        'after_title'   => ' ',
    ));

    register_sidebar(array(
        'name'          => 'Footer column 3',
        'id'            => 'footer-3',
        'before_widget' => ' ',
        'after_widget'  => ' ',
        'before_title'  => ' ',
        'after_title'   => ' ',
    ));
}
add_action('widgets_init', 'bn_widgets_init');


/**
 *
 * Add support for acf field with menu item - the ability to convert a link to a button
 *
 */
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {
        if (get_field('button', $item) != 'none') {
            $class = get_field('button', $item);
            array_push($item->classes, '--button --button__' . $class);
        }
    }

    return $items;
}
