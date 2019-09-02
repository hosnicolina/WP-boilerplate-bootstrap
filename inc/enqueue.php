<?php
/**
 * Enqueue scripts and styles.
 */
function blogviral_scripts() {

	wp_enqueue_style( 'blogviral-style', get_template_directory_uri() . '/assets/dist/css/style.css' , array(), '1.0.0');

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/dist/js/scripts.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogviral_scripts' );
