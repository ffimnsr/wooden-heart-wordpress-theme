<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WoodenHeart
 */

?>
		<footer class="text-center mt-10">
			<div>
				<?php
				printf( esc_html__( 'Photos from %1$s', 'wooden-heart' ), '<a class="text-gray-700 hover:text-gray-400" href="https://unsplash.com/">Unsplash</a>' );
				?>
			</div>
			<div>
				<?php
				printf( esc_html__( 'Copyright &copy; 2018 - 2021 by %2$s. All Rights Reserved.', 'wooden-heart' ), 'wooden-heart', '<a class="text-gray-700 hover:text-gray-400" href="/">ItsFizN4</a>' );
				?>
			</div>
		</footer>
	</div><!-- #content-root -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
