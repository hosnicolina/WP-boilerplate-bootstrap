<?php
/**
 * new blog viral functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blogviral
 */

if ( ! defined('ABSPATH') ) {
	die('Sorry Men');
}

/**
* Setup theme
*/
require get_template_directory() . '/inc/setup.php';

/**
 * Enqueue
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Bootstrap Nav.
 */
require get_template_directory() . '/inc/bs4-nav.php';

/**
 * Widget Area.
 */
require get_template_directory() . '/inc/widget-area.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

