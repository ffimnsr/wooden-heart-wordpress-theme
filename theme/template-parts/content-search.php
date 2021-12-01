<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WoodenHeart
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white mb-6 md:rounded overflow-hidden shadow-lg py-8' ); ?>>
	<header class="entry-header mb-4">
		<?php
		the_title( sprintf( '<h2 class="entry-title mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		get_template_part( 'template-parts/publisher' );
		?>
	</header>

	<?php woodenheart_post_thumbnail(); ?>

	<div class="entry-content prose">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry-footer mt-4">
		<div><?php woodenheart_entry_footer(); ?></div>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
