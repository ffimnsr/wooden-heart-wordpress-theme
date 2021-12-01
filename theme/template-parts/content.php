<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WoodenHeart
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white mb-6 md:rounded overflow-hidden shadow-lg py-8' ); ?>>
	<header class="entry-header mb-4">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title mb-0">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title mb-0"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		get_template_part( 'template-parts/publisher' );
		?>
	</header>

	<?php woodenheart_post_thumbnail(); ?>

	<div class="entry-content prose">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span> "%s"</span>', 'wooden-heart' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . esc_html__( 'Pages:', 'wooden-heart' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="entry-footer mt-4">
		<div>
			<?php woodenheart_entry_footer(); ?>
		</div>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
