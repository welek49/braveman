<?php

/**
 * ACF save field options
 */
add_filter('acf/settings/save_json', 'bn_acf_json_save_point');
function bn_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/inc/config/acf-json';

    return $path;
}

add_filter('acf/settings/load_json', 'bn_acf_json_load_point');
function bn_acf_json_load_point($paths)
{
    unset($paths[0]);

    $paths[] = get_stylesheet_directory() . '/inc/config/acf-json';

    return $paths;
}

add_action('rest_api_init', 'create_ACF_meta_in_REST');
function create_ACF_meta_in_REST()
{
    $postypes_to_exclude = ['acf-field-group', 'acf-field'];
    $extra_postypes_to_include = ["page"];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'), $postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field(
            $post_type,
            'acf',
            [
                'get_callback'    => 'expose_ACF_fields',
                'schema'          => null,
            ]
        );
    }
}

function expose_ACF_fields($object)
{
    $ID = $object['id'];
    return get_fields($ID);
}

add_filter('acf/fields/wysiwyg/toolbars', 'my_toolbars');
function my_toolbars($toolbars)
{
    // Remove some options from 'Full' Wysiwyg toolbars
    $to_unset = ['blockquote', 'wp_more', 'fullscreen', 'wp_adv', 'hr', 'charmap', 'indent', 'outdent', 'wp_help'];

    foreach ($to_unset as $to_unset_single) {
        if (($key = array_search($to_unset_single, $toolbars['Full'][1])) !== false) {
            unset($toolbars['Full'][1][$key]);
        }
        if (($key = array_search($to_unset_single, $toolbars['Full'][2])) !== false) {
            unset($toolbars['Full'][2][$key]);
        }
    }

    return $toolbars;
}

/**
 * Modify TinyMCE 
 *
 * @param array $in
 * @return array $in
 */
function my_tiny_mce_before_init( $in ) {

    // Keep the "kitchen sink" open:   
    $in[ 'wordpress_adv_hidden' ] = FALSE;

    return $in;
}
add_filter( 'tiny_mce_before_init', 'my_tiny_mce_before_init' );