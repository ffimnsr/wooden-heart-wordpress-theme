<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WoodenHeart
 */

get_header();
?>
	<section class="lg:flex">
		<main id="primary" class="container lg:flex-1 lg:max-w-3xl lg:ml-auto lg:mr-8 mx-auto mt-10">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
		<?php get_template_part( 'template-parts/ads-sidebar' ); ?>
	</section>
<?php
get_footer();
