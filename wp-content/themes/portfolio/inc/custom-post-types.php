<?php

/**
 * Rename Custom Post Types
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */

// Rename "Posts" to "News & Views"
add_action( 'admin_menu', 'o3_change_post_menu_label' );
add_action( 'init', 'o3_change_post_object_label' );
function o3_change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'News & Views';
  $submenu['edit.php'][5][0] = 'News & Views';
  $submenu['edit.php'][10][0] = 'Add News & Views';
  $submenu['edit.php'][16][0] = 'News & Views Tags';
  echo '';
}
function o3_change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'News & Views';
  $labels->singular_name = 'News & Views';
  $labels->add_new = 'Add News & Views';
  $labels->add_new_item = 'Add News & Views';
  $labels->edit_item = 'Edit News & Views';
  $labels->new_item = 'News & Views';
  $labels->view_item = 'View News & Views';
  $labels->search_items = 'Search News & Views';
  $labels->not_found = 'No News & Views found';
  $labels->not_found_in_trash = 'No News & Views found in Trash';
}

// Global CTA
register_post_type('global-cta',
 array(
   'labels' => array(
      'name' => __( 'CTAs', 'CTA General Name', 'o3world' ),
      'singular_name' => __( 'CTA', 'CTA Singular Name', 'o3world' ),
      'menu_name' => __( 'CTAs', 'o3world' ),
      'name_admin_bar' => __( 'CTA', 'o3world' ),
      'archives' => __( 'Item Archives', 'o3world' ),
      'attributes' => __( 'Item Attributes', 'o3world' ),
      'parent_item_colon' => __( 'Parent Item:', 'o3world' ),
      'all_items' => __( 'All Items', 'o3world' ),
      'add_new_item' => __( 'Add New Item', 'o3world' ),
      'add_new' => __( 'Add New', 'o3world' ),
      'new_item' => __( 'New Item', 'o3world' ),
      'edit_item' => __( 'Edit Item', 'o3world' ),
      'update_item' => __( 'Update Item', 'o3world' ),
      'view_item' => __( 'View Item', 'o3world' ),
      'view_items' => __( 'View Items', 'o3world' ),
      'search_items' => __( 'Search Item', 'o3world' ),
      'not_found' => __( 'Not found', 'o3world' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'o3world' ),
      'featured_image' => __( 'Featured Image', 'o3world' ),
      'set_featured_image' => __( 'Set featured image', 'o3world' ),
      'remove_featured_image' => __( 'Remove featured image', 'o3world' ),
      'use_featured_image' => __( 'Use as featured image', 'o3world' ),
      'insert_into_item' => __( 'Insert into item', 'o3world' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'o3world' ),
      'items_list' => __( 'Items list', 'o3world' ),
      'items_list_navigation' => __( 'Items list navigation', 'o3world' ),
      'filter_items_list' => __( 'Filter items list', 'o3world' ),
    ),
    'label'  => __( 'CTA', 'o3world' ),
    'supports' => array(
      'title',
      'editor',
      'custom-fields'
    ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-admin-comments',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => false,
 )
);

// Galleries
register_post_type('galleries',
 array(
   'labels' => array(
      'name' => __( 'Galleries', 'Gallery General Name', 'o3world' ),
      'singular_name' => __( 'Gallery', 'Gallery Singular Name', 'o3world' ),
      'menu_name' => __( 'Galleries', 'o3world' ),
      'name_admin_bar' => __( 'Gallery', 'o3world' ),
      'archives' => __( 'Item Archives', 'o3world' ),
      'attributes' => __( 'Item Attributes', 'o3world' ),
      'parent_item_colon' => __( 'Parent Item:', 'o3world' ),
      'all_items' => __( 'All Items', 'o3world' ),
      'add_new_item' => __( 'Add New Item', 'o3world' ),
      'add_new' => __( 'Add New', 'o3world' ),
      'new_item' => __( 'New Item', 'o3world' ),
      'edit_item' => __( 'Edit Item', 'o3world' ),
      'update_item' => __( 'Update Item', 'o3world' ),
      'view_item' => __( 'View Item', 'o3world' ),
      'view_items' => __( 'View Items', 'o3world' ),
      'search_items' => __( 'Search Item', 'o3world' ),
      'not_found' => __( 'Not found', 'o3world' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'o3world' ),
      'featured_image' => __( 'Featured Image', 'o3world' ),
      'set_featured_image' => __( 'Set featured image', 'o3world' ),
      'remove_featured_image' => __( 'Remove featured image', 'o3world' ),
      'use_featured_image' => __( 'Use as featured image', 'o3world' ),
      'insert_into_item' => __( 'Insert into item', 'o3world' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'o3world' ),
      'items_list' => __( 'Items list', 'o3world' ),
      'items_list_navigation' => __( 'Items list navigation', 'o3world' ),
      'filter_items_list' => __( 'Filter items list', 'o3world' ),
    ),
    'label'  => __( 'Gallery', 'o3world' ),
    'supports' => array(
      'title',
      'editor',
      'custom-fields'
    ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-images-alt2',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => false,
 )
);

// Work
register_post_type('case-studies',
  array(
    'labels' => array(
      'name' =>  __( 'Work', 'Work General Name', 'o3world' ),
      'singular_name' =>  __( 'Work', 'Work Singular Name', 'o3world' ),
      'menu_name' => __( 'Work', 'o3world' ),
      'name_admin_bar' => __( 'Work', 'o3world' ),
      'archives' => __( 'Item Archives', 'o3world' ),
      'attributes' => __( 'Item Attributes', 'o3world' ),
      'parent_item_colon' => __( 'Parent Item:', 'o3world' ),
      'all_items' => __( 'All Items', 'o3world' ),
      'add_new_item' => __( 'Add New Item', 'o3world' ),
      'add_new' => __( 'Add New', 'o3world' ),
      'new_item' => __( 'New Item', 'o3world' ),
      'edit_item' => __( 'Edit Item', 'o3world' ),
      'update_item' => __( 'Update Item', 'o3world' ),
      'view_item' => __( 'View Item', 'o3world' ),
      'view_items' => __( 'View Items', 'o3world' ),
      'search_items' => __( 'Search Item', 'o3world' ),
      'not_found' => __( 'Not found', 'o3world' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'o3world' ),
      'featured_image' => __( 'Featured Image', 'o3world' ),
      'set_featured_image' => __( 'Set featured image', 'o3world' ),
      'remove_featured_image' => __( 'Remove featured image', 'o3world' ),
      'use_featured_image' => __( 'Use as featured image', 'o3world' ),
      'insert_into_item' => __( 'Insert into item', 'o3world' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'o3world' ),
      'items_list' => __( 'Items list', 'o3world' ),
      'items_list_navigation' => __( 'Items list navigation', 'o3world' ),
      'filter_items_list' => __( 'Filter items list', 'o3world' ),
    ),
    'label'  => __( 'Work', 'o3world' ),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'excerpt',
      'thumbnail',
      'page-attributes'
    ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-awards',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'work',
      'with_front' => false
    )
  )
);

// Labs
register_post_type('o3-labs',
  array(
    'labels' => array(
      'name' =>  __( 'Labs', 'Labs General Name', 'o3world' ),
      'singular_name' =>  __( 'Labs', 'Labs Singular Name', 'o3world' ),
      'menu_name' => __( 'Labs', 'o3world' ),
      'name_admin_bar' => __( 'Labs', 'o3world' ),
      'archives' => __( 'Item Archives', 'o3world' ),
      'attributes' => __( 'Item Attributes', 'o3world' ),
      'parent_item_colon' => __( 'Parent Item:', 'o3world' ),
      'all_items' => __( 'All Items', 'o3world' ),
      'add_new_item' => __( 'Add New Item', 'o3world' ),
      'add_new' => __( 'Add New', 'o3world' ),
      'new_item' => __( 'New Item', 'o3world' ),
      'edit_item' => __( 'Edit Item', 'o3world' ),
      'update_item' => __( 'Update Item', 'o3world' ),
      'view_item' => __( 'View Item', 'o3world' ),
      'view_items' => __( 'View Items', 'o3world' ),
      'search_items' => __( 'Search Item', 'o3world' ),
      'not_found' => __( 'Not found', 'o3world' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'o3world' ),
      'featured_image' => __( 'Featured Image', 'o3world' ),
      'set_featured_image' => __( 'Set featured image', 'o3world' ),
      'remove_featured_image' => __( 'Remove featured image', 'o3world' ),
      'use_featured_image' => __( 'Use as featured image', 'o3world' ),
      'insert_into_item' => __( 'Insert into item', 'o3world' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'o3world' ),
      'items_list' => __( 'Items list', 'o3world' ),
      'items_list_navigation' => __( 'Items list navigation', 'o3world' ),
      'filter_items_list' => __( 'Filter items list', 'o3world' ),
    ),
    'label'  => __( 'Labs', 'o3world' ),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'excerpt',
      'thumbnail',
      'page-attributes'
    ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-carrot',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'labs',
      'with_front' => false
    )
  )
);

// Team Members
register_post_type('team',
  array(
    'labels' => array(
      'name' =>  __( 'Team Members', 'Team Members General Name', 'o3world' ),
      'singular_name' =>  __( 'Team Member', 'Team Members Singular Name', 'o3world' ),
      'menu_name' => __( 'Team Members', 'o3world' ),
      'name_admin_bar' => __( 'Team Member', 'o3world' ),
      'archives' => __( 'Item Archives', 'o3world' ),
      'attributes' => __( 'Item Attributes', 'o3world' ),
      'parent_item_colon' => __( 'Parent Item:', 'o3world' ),
      'all_items' => __( 'All Items', 'o3world' ),
      'add_new_item' => __( 'Add New Item', 'o3world' ),
      'add_new' => __( 'Add New', 'o3world' ),
      'new_item' => __( 'New Item', 'o3world' ),
      'edit_item' => __( 'Edit Item', 'o3world' ),
      'update_item' => __( 'Update Item', 'o3world' ),
      'view_item' => __( 'View Item', 'o3world' ),
      'view_items' => __( 'View Items', 'o3world' ),
      'search_items' => __( 'Search Item', 'o3world' ),
      'not_found' => __( 'Not found', 'o3world' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'o3world' ),
      'featured_image' => __( 'Featured Image', 'o3world' ),
      'set_featured_image' => __( 'Set featured image', 'o3world' ),
      'remove_featured_image' => __( 'Remove featured image', 'o3world' ),
      'use_featured_image' => __( 'Use as featured image', 'o3world' ),
      'insert_into_item' => __( 'Insert into item', 'o3world' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'o3world' ),
      'items_list' => __( 'Items list', 'o3world' ),
      'items_list_navigation' => __( 'Items list navigation', 'o3world' ),
      'filter_items_list' => __( 'Filter items list', 'o3world' ),
    ),
    'label'  => __( 'Team Members', 'o3world' ),
    'supports' => array(
      'title',
      'editor',
      'custom-fields'
    ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-businessman',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'about/team',
      'with_front' => false
    )
  )
);
