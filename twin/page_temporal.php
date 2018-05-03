<?php
/**
 * This file adds the Temporary landing page template.
 *
 * @author mono voce aps
 * @package Brighton by mono voce
 * @subpackage Customizations
*/

/*
Template Name: Temporary landing page
*/

//* Add landing body class to the head
add_filter( 'body_class', 'annisennov_add_body_class' );
function annisennov_add_body_class( $classes ) {

	$classes[] = 'temporary-landing';
	return $classes;

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove navigation
remove_action( 'genesis_header', 'genesis_do_nav', 12 );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );

//* Remove breadcrumbs
remove_action( 'genesis_after_header', 'genesis_do_breadcrumbs', 20 );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );


//* Run the Genesis loop
genesis();
