<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boilerplate_general_boostrap
 */

?>

</div> <!-- .content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info container text-center p-3">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'boilerplate-general-boostrap' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'boilerplate-general-boostrap' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'boilerplate-general-boostrap' ), 'boilerplate-general-boostrap', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</main><!-- #main -->

<?php wp_footer(); ?>

</body>
</html>
