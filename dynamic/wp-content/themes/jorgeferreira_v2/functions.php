<?php 

add_action( 'after_setup_theme', 'my_setup' );

function my_setup() {
	add_theme_support( 'automatic-feed-links' );	// RSS
	add_theme_support( 'html5' ); 					// HTML 5
	// add_editor_style( 'css/editor.css' );			// CSS Editor
	
	register_nav_menu( 'primary', 'Menu' ); 		// Menu

	set_post_thumbnail_size( 400, 400, true );
	add_image_size( 'jf_avatar', 250, 250, true );
	add_image_size( 'jf_job', 1000, 9999, false );
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.10.1.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.min.js', array( 'jquery' ), filemtime( TEMPLATEPATH . '/js/scripts.min.js' ), true );
}
