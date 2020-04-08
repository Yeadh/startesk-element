<?php

if ( ! function_exists('startesk_custom_post_type') ) {
	
    /**
     * Register a custom post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function startesk_custom_post_type() {

        //portfolio
        register_post_type(
            'portfolio', array(
                'labels'                 => array(
                    'name'               => _x( 'Portfolio', 'post type general name', 'startesk' ),
                    'singular_name'      => _x( 'Portfolio', 'post type singular name', 'startesk' ),
                    'menu_name'          => _x( 'Portfolio', 'admin menu', 'startesk' ),
                    'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'startesk' ),
                    'add_new'            => _x( 'Add New', 'Portfolio', 'startesk' ),
                    'add_new_item'       => __( 'Add New Portfolio', 'startesk' ),
                    'new_item'           => __( 'New Portfolio', 'startesk' ),
                    'edit_item'          => __( 'Edit Portfolio', 'startesk' ),
                    'view_item'          => __( 'View Portfolio', 'startesk' ),
                    'all_items'          => __( 'All Portfolio', 'startesk' ),
                    'search_items'       => __( 'Search Portfolio', 'startesk' ),
                    'parent_item_colon'  => __( 'Parent Portfolio:', 'startesk' ),
                    'not_found'          => __( 'No Portfolio found.', 'startesk' ),
                    'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'startesk' )
                ),

                'description'        => __( 'Description.', 'startesk' ),
                'menu_icon'          => 'dashicons-layout',
                'public'             => true,
                'show_in_menu'       => true,
                'has_archive'        => false,
                'hierarchical'       => true,
                'rewrite'            => array( 'slug' => 'portfolio' ),
                'supports'           => array( 'title', 'editor', 'thumbnail' )
            )
        );

        // portfolio taxonomy
        register_taxonomy(
            'portfolio_category',
            'portfolio',
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Category', 'startesk' ),
                    'add_new_item'      => __( 'Add New Category', 'startesk' ),
                ),
                'hierarchical' => true,
                'show_admin_column'     => true
        ));

        register_post_type( 'faq', array(
            'label'                 => __( 'FAQ', 'makplus' ),
            'description'           => __( 'Post Type Description', 'makplus' ),
            'labels'                => array(
                'name'                  => _x( 'FAQs', 'Post Type General Name', 'makplus' ),
                'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'makplus' ),
                'menu_name'             => __( 'FAQs', 'makplus' ),
                'name_admin_bar'        => __( 'FAQ', 'makplus' ),
                'archives'              => __( 'Item Archives', 'makplus' ),
                'attributes'            => __( 'Item Attributes', 'makplus' ),
                'parent_item_colon'     => __( 'Parent Item:', 'makplus' ),
                'all_items'             => __( 'All Items', 'makplus' ),
                'add_new_item'          => __( 'Add New Item', 'makplus' ),
                'add_new'               => __( 'Add New', 'makplus' ),
                'new_item'              => __( 'New Item', 'makplus' ),
                'edit_item'             => __( 'Edit Item', 'makplus' ),
                'update_item'           => __( 'Update Item', 'makplus' ),
                'view_item'             => __( 'View Item', 'makplus' ),
                'view_items'            => __( 'View Items', 'makplus' ),
                'search_items'          => __( 'Search Item', 'makplus' ),
                'not_found'             => __( 'Not found', 'makplus' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'makplus' ),
                'featured_image'        => __( 'Featured Image', 'makplus' ),
                'set_featured_image'    => __( 'Set featured image', 'makplus' ),
                'remove_featured_image' => __( 'Remove featured image', 'makplus' ),
                'use_featured_image'    => __( 'Use as featured image', 'makplus' ),
                'insert_into_item'      => __( 'Insert into item', 'makplus' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'makplus' ),
                'items_list'            => __( 'Items list', 'makplus' ),
                'items_list_navigation' => __( 'Items list navigation', 'makplus' ),
                'filter_items_list'     => __( 'Filter items list', 'makplus' ),
            ),
            'supports'              => array( 'title', 'excerpt' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        ));
    }

    add_action( 'init', 'startesk_custom_post_type' );
}