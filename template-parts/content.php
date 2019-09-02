<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blogviral
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-3'); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="entry-meta">
			<?php
			blogviral_posted_on();
			blogviral_posted_by();
			?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->

	<?php blogviral_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php blogviral_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
