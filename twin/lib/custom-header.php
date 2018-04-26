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
 
<svg id="site-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 577.89 81.17">
  <defs>
    <style>
      .cls-1 {
        font-size: 36.59px;
        fill: #fff;
        font-family: "brandon-grotesque", OpenSans-Bold, Open Sans;
        font-weight: 700;
        letter-spacing: 0.17em;
      }

      .cls-2 {
        fill: #c9002c;
      }
    </style>
  </defs>
  <title>stemhenrikappel</title>
  <g id="logotype">
    <text class="cls-1" transform="translate(105.65 55.02)">STEM HENRIK APPEL</text>
  </g>
  <g id="symbol">
    <g>
      <path class="cls-2" d="M3.3,35.73l-.06,0a2.09,2.09,0,0,1-1.4-2.22V24.12a4.47,4.47,0,0,1,1.31-2.85L9.43,15.9a5.79,5.79,0,0,1,3.21-1.18h8A3.27,3.27,0,0,0,24,11.46V7.27a1.94,1.94,0,0,1,1.31-1.72L39,2.25a7.89,7.89,0,0,1,3.63.23L52,6a.54.54,0,0,0,.21.1A8.52,8.52,0,0,1,54,7.51l5.07,5.68A3.26,3.26,0,0,0,63.3,14l1.31-.62c.55-.26,1.23,0,1.8.67l11.8,13.34a1.84,1.84,0,0,1,.09,2.1L65.7,46.38A3.9,3.9,0,0,1,63,47.74H60l3.24-4.5a9.14,9.14,0,0,0,1.47-4.62V28.24a7.17,7.17,0,0,0-1.86-4.53l-8.25-8.29c-1.74-1.75-2.27-2.51-5.66-2.51H38.78a5.59,5.59,0,0,0-4.3,2.37l-.63,1H28.53a4.47,4.47,0,0,0-4.5,2.2v.06l-4.59,8-.06.07a5.16,5.16,0,0,0-.19.67h-.05L17.56,42c-.08.69-.15,1.34-.17,1.95" transform="translate(-1.15 -2.13)"/>
      <path class="cls-2" d="M55.07,26.54c-1.58-1.75-3.67-4-3.6-3.87a5.24,5.24,0,0,0-3.8-1.87H41.82a2.75,2.75,0,0,0-2.56,1.38S36.33,27,36.31,27c-.82,1.49-.73,3.08,1.34,4.06,1.16.5,4,1.77,5.51,2.32,2.13.85,3.57,1.09,4.76-.59l1.58-2.16c1.29-1.69.66-2.51-.21-3.35l-1.46-1.49c-.26-.26-.36-.27-1.07-.27H46c-.42,0-.6.29-.09.77,0,0,1.13,1.25,1.57,1.77s.51.93,0,1.61l-1.33,1.76c-.57.8-.91.85-2.12.35l-5.37-2.27c-.65-.37-.73-.82-.28-1.71.06-.09,2.55-4.2,2.59-4.28A1,1,0,0,1,42,23h5.85a2.92,2.92,0,0,1,2.38,1.25s3.06,3.38,3.3,3.65c.82.79,1,1.36,1,4.75v4.82c-1.2-.3-2.5-.67-2.59-.7a8.71,8.71,0,0,0-4.71-.12l-6.11,1.88L29.3,32.91l.37-2.55A10.65,10.65,0,0,1,31,26.61l6.13-9.73a3.76,3.76,0,0,1,2.75-1.52H50.06a2.63,2.63,0,0,1,2.06.76l8.24,8.24a5.34,5.34,0,0,1,1.36,3.27V38a5.18,5.18,0,0,1-.14,1.11l-.08.29-4.86-1.31V33.14c0-3.14.06-4.81-1.55-6.6" transform="translate(-1.15 -2.13)"/>
      <path class="cls-2" d="M28.57,25.18A12.73,12.73,0,0,0,27,29.56l-.25,2.08-.31-.16-3.67-1.77A1.36,1.36,0,0,1,22,28.59l.15-.58,4.55-7.93c.61-.95,1.21-1.35,2.91-1.32h3" transform="translate(-1.15 -2.13)"/>
      <path class="cls-2" d="M22.1,31.18l.49.3,16.24,7.78L27,42.88a5,5,0,0,0-3.14,3.4l-1.62,7.21L20.69,48a13.84,13.84,0,0,1-.18-5.2l1.2-11.43.08-.4" transform="translate(-1.15 -2.13)"/>
      <path class="cls-2" d="M26.77,47.29a3.35,3.35,0,0,1,1.88-2.06L48.89,39a6.89,6.89,0,0,1,3.54.11h.09l7.93,2.17-.09.1L55.8,47.74H42.72A10.78,10.78,0,0,0,38.09,49L24.67,56.63" transform="translate(-1.15 -2.13)"/>
      <path class="cls-2" d="M39.79,82.7a1.77,1.77,0,0,1-2,.48S15.29,71.68,11.07,69.49a6.63,6.63,0,0,1-2-2.22L1.35,49.9a2.19,2.19,0,0,1-.2-.8,1.51,1.51,0,0,1,.73-1.16c.15-.1,7.53-3.75,9.79-4.9l5.81,3.39v-.06h0a14.07,14.07,0,0,0,.28,1.46c0,.05,2.59,9.05,3,10.73l0,.28-3.19,1.81a3.48,3.48,0,0,0-1.79,3.06,4,4,0,0,0,2.57,3.39l.52.26a3.43,3.43,0,0,0,.61.35L42,79.22" transform="translate(-1.15 -2.13)"/>
      <path class="cls-2" d="M83.83,44.19l-7.45,2.4a9.11,9.11,0,0,0-4,2.83l-9,12.08a8,8,0,0,1-2.95,2.2L47.64,68.38a4.7,4.7,0,0,1-3.22-.24s-11.81-6.29-12.34-6.56c-.73-.43-1.21-.33-1.21.29s0,.94,1.21,1.62l12.54,7.13a6.77,6.77,0,0,0,4.86.32l12.9-4.7a9.86,9.86,0,0,0,3.87-2.9l8.51-11.41,1.93,7.49a4.58,4.58,0,0,1-.54,3.16l-7.3,10.18c-1.29,1.73-1.86,2-4.21,2.46l-21,2.45C43.16,77.44,23.75,67.51,20,65.58a1.68,1.68,0,0,1-.9-1.33v0a1.33,1.33,0,0,1,.72-1.14L40.24,51.41a9.16,9.16,0,0,1,3.66-1H64.11a6,6,0,0,0,4.36-2.22S73.24,41.89,76.91,37l7,6.72a.83.83,0,0,1,.21.33s-.11.07-.34.17" transform="translate(-1.15 -2.13)"/>
    </g>
  </g>
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