<?php // <- Don't add me in
// Gist updated to use code from Genesis Framework 2.4.2
//remove initial header functions
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_header', 'genesis_do_header' );
//add in the new header markup - prefix the function name - here sm_ is used
add_action( 'genesis_header', 'sm_genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'sm_genesis_header_markup_close', 15 );
add_action( 'genesis_header', 'sm_genesis_do_header' );

//New Header functions
function sm_genesis_header_markup_open() {
 genesis_markup( array(
 'html5' => '<header %s>',
 'context' => 'site-header',
 ) );
 /* Added in content
 echo '<div class="header-ghost"></div>';
 */
 genesis_structural_wrap( 'header' );
}
function sm_genesis_header_markup_close() {
 genesis_structural_wrap( 'header', 'close' );
 genesis_markup( array(
 'close' => '</header>',
 'context' => 'site-header',
 ) );
}

function sm_genesis_do_header() {
 global $wp_registered_sidebars;
 genesis_markup( array(
 'open' => '<div %s>',
 'context' => 'title-area',
 ) );
 // Added in content
 echo '<div class="site-id">
 		<a class="site-logo" href="' . esc_url( home_url( '/' ) ) . '">
 
<svg id="site-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 197.39 60">
  <defs></defs>
  <title>TWIN</title>
  <path id="name" class="cls-1" d="M132.7,1.91,114.59,59s0,0,0,0a1.22,1.22,0,0,1-.18.36l0,.06a1.48,1.48,0,0,1-.28.28l-.07,0a1.11,1.11,0,0,1-.34.18h0a1.32,1.32,0,0,1-.39.06h-.1a1.44,1.44,0,0,1-.4-.06h0a1.16,1.16,0,0,1-.35-.18l-.07,0a2.47,2.47,0,0,1-.28-.28l0-.06a1.29,1.29,0,0,1-.18-.35s0,0,0,0L95.09,6.31,78.38,59s0,0,0,0a1.22,1.22,0,0,1-.18.36l0,.06a2.47,2.47,0,0,1-.28.28l-.07,0a1.16,1.16,0,0,1-.35.18h0A1.85,1.85,0,0,1,77,60H77a2,2,0,0,1-.42-.07h0a1.11,1.11,0,0,1-.34-.18l-.07,0a1.94,1.94,0,0,1-.29-.28l0-.06A1.22,1.22,0,0,1,75.6,59l0,0L57.78,2.85h-26V58.57a1.43,1.43,0,0,1-1.89,1.36,1.46,1.46,0,0,1-1-1.42V2.85H1.73A1.43,1.43,0,0,1,.3,1.43,1.44,1.44,0,0,1,1.73,0H58.94c.1,0,.19,0,.29.06l.25.07a1.49,1.49,0,0,1,.29.2l.13.11a1.36,1.36,0,0,1,.27.39s0,0,0,.05a.57.57,0,0,1,.08.13L77,53.69,93.69,1a.41.41,0,0,1,0-.09A.76.76,0,0,1,93.8.77a.83.83,0,0,1,.08-.12A1,1,0,0,1,94,.54l.1-.11.1-.09.11-.08A.91.91,0,0,1,94.4.18a.61.61,0,0,1,.14-.07l.11,0h0l.16,0L95,0h.28l.11,0,.18,0h0l.12,0a.75.75,0,0,1,.13.06.57.57,0,0,1,.13.08L96,.33l.11.11.09.1a1.25,1.25,0,0,1,.09.12l.07.11a1.11,1.11,0,0,1,.07.16l0,.09L113.2,53.69,129.91,1a1.46,1.46,0,0,1,2.79.89Zm12.5,56.62V1.47a1.43,1.43,0,1,0-2.85,0V58.53a1.43,1.43,0,1,0,2.85,0Zm52.17.91.09-.12.06-.11c0-.05,0-.09.07-.13a.65.65,0,0,0,0-.13c0-.05,0-.09,0-.14a1.27,1.27,0,0,0,0-.28V1.47a1.43,1.43,0,0,0-2.86,0v52.4L159,.67h0c-.06-.07-.11-.14-.18-.21l-.1-.08a.54.54,0,0,0-.12-.09.39.39,0,0,0-.11-.06l-.13-.07-.11,0-.16,0a.55.55,0,0,0-.18,0h-.17a.65.65,0,0,0-.2,0l-.18,0-.09,0a1.48,1.48,0,0,0-.47.31l-.08.1-.09.12s0,.08-.07.11l-.06.13a.65.65,0,0,0,0,.13.74.74,0,0,0,0,.14,1.27,1.27,0,0,0,0,.28V58.53a1.43,1.43,0,1,0,2.85,0V6.13l35.89,53.2h0a1.21,1.21,0,0,0,.21.24l.08.07.18.13.09,0,.22.08.08,0a1.12,1.12,0,0,0,.32,0h0a1.5,1.5,0,0,0,.37-.05l.08,0a1.39,1.39,0,0,0,.56-.34Z" transform="translate(-0.3)"/>
</svg>


 	</a>';
 do_action( 'genesis_site_title' );
 do_action( 'genesis_site_description' );
 
 genesis_markup( array(
 'close' => '</div></div>',
 'context' => 'title-area',
 ) );
 if ( ( isset( $wp_registered_sidebars['header-right'] ) && is_active_sidebar( 'header-right' ) ) || has_action( 'genesis_header_right' ) ) {
 genesis_markup( array(
 'open' => '<div %s>' . genesis_sidebar_title( 'header-right' ),
 'context' => 'header-widget-area',
 ) );
 do_action( 'genesis_header_right' );
 add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
 add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
 dynamic_sidebar( 'header-right' );
 remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
 remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
 genesis_markup( array(
 'close' => '</div>',
 'context' => 'header-widget-area',
 ) );
 }
}