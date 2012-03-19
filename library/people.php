<?php
/*
 * People Post Type (Address Book)
*/


// let's create the function for the custom type
function custom_post_person() { 
	// creating (registering) the custom type 
	register_post_type( 'people',
		array('labels' => array(
			'name' => __('People', 'post type general name'),
			'all_items' => __('All People'),
			'singular_name' => __('Person', 'post type singular name'),
			'add_new' => __('Add New', 'custom post type item'),
			'add_new_item' => __('Add New Person'),
			'edit' => __( 'Edit' ),
			'edit_item' => __('Edit Person'),
			'new_item' => __('New Person'),
			'view_item' => __('View Person'),
			'search_items' => __('Search People'),
			'not_found' =>  __('No People found in the database.'),
			'not_found_in_trash' => __('No People found in Trash.'),
			'parent_item_colon' => ''
			),
			'description' => __( 'This is where information about people is added. It\'s like an address book.' ),
			'public' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9, 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'permalink_epmask' => 'EP_PERMALINK & EP_YEAR',
			'supports' => array( 'title', 'author', 'thumbnail', 'revisions')
	 	) /* end of options */
	); /* end of register post type */
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_person');
	

	
/* * * 
 *
 * Custom Fields for People
 *
 * * */
 
/*function my_metabox_styles()
{
    if ( is_admin() )
    {
        wp_enqueue_style( 'wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css' );
    }
}*/
 
$custom_people_metabox = new WPAlchemy_MetaBox(array
(
    'id' => '_person_meta',
    'title' => 'Personal Information',
    'types' => array('people'),
    'template' => STYLESHEETPATH . '/library/person-meta.php',
));