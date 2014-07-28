<?php
/**
 * rtPanel Child functions and definitions
 *
 * @package rtPanel
 * 
 * @since rtPanelChild 1.0
 */

/* Define Directory Constants */
    define( 'RTP_CHILD_CSS', get_stylesheet_directory_uri() . '/css' );
    define( 'RTP_CHILD_JS', get_stylesheet_directory_uri() . '/js' );
    define( 'RTP_CHILD_IMG', get_stylesheet_directory_uri() . '/img' );
    define( 'RTP_CHILD_ASSETS_URL', get_stylesheet_directory_uri() . '/assets' );
    define( 'RTP_CHILD_BOWER_COMPONENTS_URL', get_stylesheet_directory_uri() . '/assets/foundation/bower_components' );

// Includes PHP files located in 'lib' folder
foreach( glob ( get_stylesheet_directory() . "/lib/*.php" ) as $lib_filename ) {
    require_once( $lib_filename );
}

/**
	 * Register two widget areas.
	 *
	 * @since rtpanel
	 *
	 * @return void
	 */
	function rtpanelchildtheme_widgets_init() {
	   
	    register_sidebar( array(
	        'name'          => __( 'Secondary Widget Area', 'twentythirteen' ),
	        'id'            => 'sidebar-2',
	        'description'   => __( 'Appears on posts and pages in the sidebar.', 'rtpanel-child-theme' ),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget'  => '</aside>',
	        'before_title'  => '<h3 class="widget-title">',
	        'after_title'   => '</h3>',
	    ) );
	}
	add_action( 'widgets_init', 'rtpanelchildtheme_widgets_init' );
	?>

