<?php

function register_board_members()
{
    $labels = array(
        'name'                => 'Board members',
        'singular_name'       => 'Board member',
        'menu_name'           => 'Board members',
        'all_items'           => 'All members',
        'view_item'           => 'View member',
        'add_new_item'        => 'Add member',
        'add_new'             => 'Add new member',
        'edit_item'           => 'Edit member',
        'update_item'         => 'Update member',
        'search_items'        => 'Search members',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in trash'
    );
    $args = array(
        'description'           => 'Board members',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => 4,
        'menu_icon'             => 'dashicons-businessman',
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite' => array(
            'slug' => __('about-us'),
            'with_front' => false
        ),
    );
    register_post_type('board-members', $args);
}
//add_action('init', 'register_board_members', 0);
