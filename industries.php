<?php


// create Custom post type Industries

add_action('init', 'create_industries');
function create_Industries()
{
    $labels = array(
        'name' => _x(' Industries', 'General Name', 'gdl_back_office'),
        'singular_name' => _x('Industries', 'Singular Name', 'gdl_back_office'),
        'add_new' => _x('Add New', 'Add New Industries', 'gdl_back_office'),
        'add_new_item' => __('Add New Industries ', 'gdl_back_office'),
        'edit_item' => __('Edit Industries ', 'gdl_back_office'),
        'new_item' => __('New Industries ', 'gdl_back_office'),
        'view_item' => __('View Industries', 'gdl_back_office'),
        'search_items' => __('Search Industries', 'gdl_back_office'),
        'not_found' => __('Nothing Industries found', 'gdl_back_office'),
        'not_found_in_trash' => __('Nothing Industries found in Trash', 'gdl_back_office'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'Industries'], // my custom slug
        'capability_type' => 'post',
        'capabilities' => array(
            'publish_posts' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'edit_posts' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'edit_others_posts' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'delete_posts' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'delete_others_posts' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'read_private_posts' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'edit_post' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'delete_post' => apply_filters('spu/settings_page/roles', 'manage_options'),
            'read_post' => apply_filters('spu/settings_page/roles', 'manage_options'),
        ),
        'hierarchical' => false,
        'menu_position' => 5,
        'has_archive' => true,
        "show_in_nav_menus" => false,
        'exclude_from_search' => true,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );
    register_post_type('industries', $args);
    register_taxonomy(
        "industries-category",
        array("industries"),
        array(
            "hierarchical" => true,
            'query_var' => true,
            "label" => "Industries Category",
            "singular_label" => "industries  Categories",
            "show_in_nav_menus" => false,
            "rewrite" => true
        )
    );
    register_taxonomy_for_object_type('industries-category', 'industries');
}


