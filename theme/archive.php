<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WoodenHeart
 */

get_header();
?>
	<section class="flex">
		<main id="primary" class="flex-1 container md:max-w-3xl ml-auto mr-8 mt-10">

			<?php if ( have_posts() ) : ?>

				<header>
					<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div>', '</div>' );
					?>
				</header>

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
		<?php get_template_part( 'template-parts/ads-sidebar' ); ?>
	</section>
<?php
get_footer();