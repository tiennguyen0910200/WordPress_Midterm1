<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ample_magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>


	</header><!-- .entry-header -->

	<?php ample_magazine_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ample_magazine_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
	<footer class="entry-footer">
		<?php ample_magazine_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
