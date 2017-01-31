<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
// Let's define this as a constant so that we can use it in more than one place
define( 'QUOTES_POST_TYPE', 'quotes' );

// Wherein we register the QUOTE post type
add_action( 'init', 'meo_init' );
function meo_init() {
	// Let's do the labels first
	// These make the admin area respond entirely to our post_type
	$labels = array(
		'name' => 'Quotes',
		'singular_name' => 'Quote',
		'add_new' => 'Add New Quote',
		'add_new_item' => 'Add New Quote',
		'edit_item' => 'Edit Quote',
		'new_item' => 'New Quote',
		'view_item' => 'View Quote Details',
		'search_items' => 'Search Quotes ',
		'not_found' => 'No quotes  found',
		'not_found_in_trash' => 'No quotes  found in trash',
		'all_items' => 'All Quotes'
	);
	
	// We're not using all the $args
	// See http://codex.wordpress.org/Function_Reference/register_post_type
	$args = array(
		// features we should support in the admin UI
		'supports' => array('title', 'editor', 'thumbnail', 'categories', 'page-attributes'),
		// Which slug should precede individual items
		'rewrite' => array('slug' => 'quotes'),
		// Which slug should be used for the quotes archive
		'has_archive' => 'quotes',
		// We defined the labels above
		'labels' => $labels,
		// Show on the front end
		'public' => true,
		// Show the admin UI
		// Technically, setting public makes this unnecessary
		'show_ui' => true,
		// moves our side menu item just underneath "posts"
		'menu_position' => 4,
		//add taxonomies to the custom post type allowing for categories and tags
		'taxonomies' => array('post_tag','category'),
		'show_in_nav_menus' => true,
		'hierarchical' => true
	);
	
	register_post_type( QUOTES_POST_TYPE, $args );
}
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
