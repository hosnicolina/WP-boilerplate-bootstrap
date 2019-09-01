<?php
/**
 * Enqueue scripts and styles.
 */
function boilerplate_general_boostrap_scripts() {

	wp_enqueue_style( 'boilerplate-general-boostrap-style', get_template_directory_uri() . '/assets/dist/css/style.css' , array(), '1.0.0');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'boilerplate_general_boostrap_scripts' );
