<?php 

function position() {

    $labels = array(
        'name'                => _x( 'Positions', 'Post Type General Name', 'cdm_theme' ),
        'singular_name'       => _x( 'Position', 'Post Type Singular Name', 'cdm_theme' ),
        'menu_name'           => __( 'Open Positions', 'cdm_theme' ),
        'name_admin_bar'      => __( 'Open Positions', 'cdm_theme' ),
        'parent_item_colon'   => __( 'Parent Item:', 'cdm_theme' ),
        'all_items'           => __( 'All Positions', 'cdm_theme' ),
        'add_new_item'        => __( 'Add New Position', 'cdm_theme' ),
        'add_new'             => __( 'Add New', 'cdm_theme' ),
        'new_item'            => __( 'New Position', 'cdm_theme' ),
        'edit_item'           => __( 'Edit Position', 'cdm_theme' ),
        'update_item'         => __( 'Update Position', 'cdm_theme' ),
        'view_item'           => __( 'View Position', 'cdm_theme' ),
        'search_items'        => __( 'Search Position', 'cdm_theme' ),
        'not_found'           => __( 'Not found', 'cdm_theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cdm_theme' ),
   );
    $args = array(
        'label'               => __( 'Position', 'cdm_theme' ),
        'description'         => __( 'Open job positions', 'cdm_theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-index-card',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,     
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
   );
    register_post_type( 'position', $args );
}
add_action( 'init', 'position', 0 );

function team_member() {

    $labels = array(
        'name'                => _x( 'Team Members', 'Post Type General Name', 'cdm_theme' ),
        'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'cdm_theme' ),
        'menu_name'           => __( 'Team Members', 'cdm_theme' ),
        'name_admin_bar'      => __( 'Team Members', 'cdm_theme' ),
        'parent_item_colon'   => __( 'Team Member:', 'cdm_theme' ),
        'all_items'           => __( 'All Team Members', 'cdm_theme' ),
        'add_new_item'        => __( 'Add New Team Member', 'cdm_theme' ),
        'add_new'             => __( 'Add New Team Member', 'cdm_theme' ),
        'new_item'            => __( 'New Team Member', 'cdm_theme' ),
        'edit_item'           => __( 'Edit Team Member', 'cdm_theme' ),
        'update_item'         => __( 'Update Team Member', 'cdm_theme' ),
        'view_item'           => __( 'View Team Member', 'cdm_theme' ),
        'search_items'        => __( 'Search Team Member', 'cdm_theme' ),
        'not_found'           => __( 'Not found', 'cdm_theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cdm_theme' ),
   );
    $args = array(
        'label'               => __( 'Team Member', 'cdm_theme' ),
        'description'         => __( 'Post Type Description', 'cdm_theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'page-attributes', ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-businessman',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => false,
        'can_export'          => true,
        'has_archive'         => false,     
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
   );
    register_post_type( 'team_member', $args );
}
add_action( 'init', 'team_member', 0 );

function team_categories() {

    $labels = array(
        'name'                       => _x( 'Team Categories', 'Taxonomy General Name', 'cdm_theme' ),
        'singular_name'              => _x( 'Team Category', 'Taxonomy Singular Name', 'cdm_theme' ),
        'menu_name'                  => __( 'Team Categories', 'cdm_theme' ),
        'all_items'                  => __( 'All Team Categories', 'cdm_theme' ),
        'parent_item'                => __( 'Parent Category', 'cdm_theme' ),
        'parent_item_colon'          => __( 'Parent Category:', 'cdm_theme' ),
        'new_item_name'              => __( 'New Team Category', 'cdm_theme' ),
        'add_new_item'               => __( 'Add New Category', 'cdm_theme' ),
        'edit_item'                  => __( 'Edit Category', 'cdm_theme' ),
        'update_item'                => __( 'Update Category', 'cdm_theme' ),
        'view_item'                  => __( 'View Category', 'cdm_theme' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'cdm_theme' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'cdm_theme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'cdm_theme' ),
        'popular_items'              => __( 'Popular Categories', 'cdm_theme' ),
        'search_items'               => __( 'Search Categories', 'cdm_theme' ),
        'not_found'                  => __( 'Not Found', 'cdm_theme' ),
        'no_terms'                   => __( 'No categories', 'cdm_theme' ),
        'items_list'                 => __( 'Categories list', 'cdm_theme' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'cdm_theme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'team_cat', array( 'team_member' ), $args );
}
add_action( 'init', 'team_categories', 0 );

function projects() {

  $labels = array(
    'name'                  => _x( 'Projects', 'Post Type General Name', 'cdm_theme' ),
    'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'cdm_theme' ),
    'menu_name'             => __( 'Projects', 'cdm_theme' ),
    'name_admin_bar'        => __( 'Projects', 'cdm_theme' ),
    'archives'              => __( 'Project Archives', 'cdm_theme' ),
    'parent_item_colon'     => __( 'Parent Project:', 'cdm_theme' ),
    'all_items'             => __( 'All Projects', 'cdm_theme' ),
    'add_new_item'          => __( 'Add New Project', 'cdm_theme' ),
    'add_new'               => __( 'Add New', 'cdm_theme' ),
    'new_item'              => __( 'New Project', 'cdm_theme' ),
    'edit_item'             => __( 'Edit Project', 'cdm_theme' ),
    'update_item'           => __( 'Update Project', 'cdm_theme' ),
    'view_item'             => __( 'View Project', 'cdm_theme' ),
    'search_items'          => __( 'Search Project', 'cdm_theme' ),
    'not_found'             => __( 'Not found', 'cdm_theme' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'cdm_theme' ),
    'featured_image'        => __( 'Featured Image', 'cdm_theme' ),
    'set_featured_image'    => __( 'Set featured image', 'cdm_theme' ),
    'remove_featured_image' => __( 'Remove featured image', 'cdm_theme' ),
    'use_featured_image'    => __( 'Use as featured image', 'cdm_theme' ),
    'insert_into_item'      => __( 'Insert into project', 'cdm_theme' ),
    'uploaded_to_this_item' => __( 'Uploaded to this project', 'cdm_theme' ),
    'items_list'            => __( 'Projects list', 'cdm_theme' ),
    'items_list_navigation' => __( 'Projects list navigation', 'cdm_theme' ),
    'filter_items_list'     => __( 'Filter projects list', 'cdm_theme' ),
    );
  $args = array(
    'label'                 => __( 'Project', 'cdm_theme' ),
    'description'           => __( 'Post Type Description', 'cdm_theme' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'thumbnail', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-portfolio',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'projects',    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    );
  register_post_type( 'project', $args );
}
add_action( 'init', 'projects', 0 );

function project_categories() {

  $labels = array(
    'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'cdm_theme' ),
    'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'cdm_theme' ),
    'menu_name'                  => __( 'Project Categories', 'cdm_theme' ),
    'all_items'                  => __( 'All Project Categories', 'cdm_theme' ),
    'parent_item'                => __( 'Parent Category', 'cdm_theme' ),
    'parent_item_colon'          => __( 'Parent Category:', 'cdm_theme' ),
    'new_item_name'              => __( 'New Project Category Name', 'cdm_theme' ),
    'add_new_item'               => __( 'Add New Project Category', 'cdm_theme' ),
    'edit_item'                  => __( 'Edit Project Category', 'cdm_theme' ),
    'update_item'                => __( 'Update Project Category', 'cdm_theme' ),
    'view_item'                  => __( 'View Project Category', 'cdm_theme' ),
    'separate_items_with_commas' => __( 'Separate project categories with commas', 'cdm_theme' ),
    'add_or_remove_items'        => __( 'Add or remove project categories', 'cdm_theme' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'cdm_theme' ),
    'popular_items'              => __( 'Popular Categories', 'cdm_theme' ),
    'search_items'               => __( 'Search Project Categories', 'cdm_theme' ),
    'not_found'                  => __( 'Not Found', 'cdm_theme' ),
    'no_terms'                   => __( 'No project categories', 'cdm_theme' ),
    'items_list'                 => __( 'Project Categories list', 'cdm_theme' ),
    'items_list_navigation'      => __( 'Project Categories list navigation', 'cdm_theme' ),
    );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    );
  register_taxonomy( 'project_cat', array( 'project' ), $args );
}
add_action( 'init', 'project_categories', 0 ); 

function testimonials() {

  $labels = array(
    'name'                  => _x( 'Testimonials', 'Post Type General Name', 'cdm_theme' ),
    'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'cdm_theme' ),
    'menu_name'             => __( 'Testimonials', 'cdm_theme' ),
    'name_admin_bar'        => __( 'Testimonial', 'cdm_theme' ),
    'archives'              => __( 'Testimonial Archives', 'cdm_theme' ),
    'parent_item_colon'     => __( 'Parent Testimonial:', 'cdm_theme' ),
    'all_items'             => __( 'All Testimonials', 'cdm_theme' ),
    'add_new_item'          => __( 'Add New Testimonial', 'cdm_theme' ),
    'add_new'               => __( 'Add New', 'cdm_theme' ),
    'new_item'              => __( 'New Testimonial', 'cdm_theme' ),
    'edit_item'             => __( 'Edit Testimonial', 'cdm_theme' ),
    'update_item'           => __( 'Update Testimonial', 'cdm_theme' ),
    'view_item'             => __( 'View Testimonial', 'cdm_theme' ),
    'search_items'          => __( 'Search Testimonial', 'cdm_theme' ),
    'not_found'             => __( 'Not found', 'cdm_theme' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'cdm_theme' ),
    'featured_image'        => __( 'Featured Image', 'cdm_theme' ),
    'set_featured_image'    => __( 'Set featured image', 'cdm_theme' ),
    'remove_featured_image' => __( 'Remove featured image', 'cdm_theme' ),
    'use_featured_image'    => __( 'Use as featured image', 'cdm_theme' ),
    'insert_into_item'      => __( 'Insert into Testimonial', 'cdm_theme' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'cdm_theme' ),
    'items_list'            => __( 'Testimonials list', 'cdm_theme' ),
    'items_list_navigation' => __( 'Testimonials list navigation', 'cdm_theme' ),
    'filter_items_list'     => __( 'Filter items list', 'cdm_theme' ),
  );
  $args = array(
    'label'                 => __( 'Testimonial', 'cdm_theme' ),
    'description'           => __( 'Testimonials', 'cdm_theme' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'page-attributes'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-quote',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,   
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonials', 0 );

