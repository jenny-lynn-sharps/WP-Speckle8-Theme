<?php
/*
 * Portfolio Projects Post Type (Work)
*/


// let's create the function for the custom type
function custom_post_portfolio_project() { 
	// creating (registering) the custom type 
	register_post_type( 'portfolio_project',
		array('labels' => array(
			'name' => __('Projects', 'post type general name'),
			'all_items' => __('All Projects'),
			'singular_name' => __('Project', 'post type singular name'),
			'add_new' => __('Add New', 'custom post type item'),
			'add_new_item' => __('Add New Project'),
			'edit' => __( 'Edit' ),
			'edit_item' => __('Edit Project'),
			'new_item' => __('New Project'),
			'view_item' => __('View Project'),
			'search_items' => __('Search Projects'),
			'not_found' =>  __('No projects found in the database.'),
			'not_found_in_trash' => __('No projects found in Trash.'),
			'parent_item_colon' => ''
			),
			'description' => __( 'This is where past and current work is added.' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'rewrite' => array( 'slug' => 'projects' ),
			'capability_type' => 'post',
			'hierarchical' => false,
			'permalink_epmask' => 'EP_PERMALINK & EP_YEAR',
			'has_archive' => 'projects',
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions', 'sticky'),
			'taxonomies' => array('post_tag')
	 	) /* end of options */
	); /* end of register post type */
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_portfolio_project');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'portfolio_project_categories', 
    	array('portfolio_project'),
    	array('hierarchical' => true,           
    		'labels' => array(
    			'name' => __( 'Project Categories' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Category' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Categories' ), /* search title for taxomony */
    			'all_items' => __( 'Categories' ), /* all title for taxonomies */
    			'edit_item' => __( 'Edit Category' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Category' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Category' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Category Name' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'area-of-expertise' )
    	)
    );
    
    
    
	register_taxonomy( 'project_skills', 
		array('portfolio_project'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'label' => __( 'Skills Used' ),             
			'labels' => array(
				'name' => __( 'Skills Used' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Skill' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Skills' ), /* search title for taxomony */
				'popular_items' => __( 'Most Used Skills' ),
				'all_items' => __( 'All Skills' ), /* all title for taxonomies */
				'edit_item' => __( 'Edit Skill' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Skill' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Skill' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Skill Name' ) /* name title for taxonomy */,
				'new_item' => __( 'New Skill' ),
				'view' => __( 'View Skill' ),
				'view_item' => __( 'View Skill' ),
				'add_or_remove_items' => __( 'Add or remove Skill' ),
				'choose_from_most_used' => __( 'Choose from the most used Skills' ),
				'menu_name' => __( 'Skills' ),
				'not_found' => __( 'No Skills Found' ),
 				'not_found_in_trash' => __( 'No Skills Found in Trash' )
			),
			'show_ui' => true,
			'query_var' => true,
			'show_tagcloud' => true,
			'rewrite' => array( 'slug' => 'skill' )
		)
	); 
	
	
/* * * 
 *
 * Custom Fields for Portfolio Projects
 *
 * * */
 
/*function my_metabox_styles()
{
    if ( is_admin() )
    {
        wp_enqueue_style( 'wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css' );
    }
}*/
 
$custom_project_metabox = new WPAlchemy_MetaBox(array
(
    'id' => '_portfolio_projects_meta',
    'title' => 'Project Options',
    'types' => array('portfolio_project'),
    'template' => STYLESHEETPATH . '/library/portfolio-project-meta.php',
));