<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WoodenHeart
 */

if ( ! function_exists( 'woodenheart_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function woodenheart_posted_on() {
		$time_string = '<time datetime="%1$s">%2$s</time>';
		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 	$time_string = '<time datetime="%1$s">%2$s</time><time datetime="%3$s">%4$s</time>';
		// }

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'wooden-heart' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'woodenheart_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function woodenheart_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'wooden-heart' ),
			'<span><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'woodenheart_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function woodenheart_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'wooden-heart' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="categories block space-y-2 mb-2">' .
					'<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pt-0.5 mr-0.5 inline-block" fill="currentColor" viewBox="0 0 24 24">' .
					'<path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />' .
			  		'</svg> %1$s</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'wooden-heart' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags block space-y-2 mb-2">' .
					'<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pt-0.5 mr-0.5 inline-block" fill="currentColor" viewBox="0 0 24 24">' .
					'<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />' .
					'</svg> %1$s</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}


		echo '<div class="float-right block space-x-2">';
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span>';
			comments_popup_link(
				'<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 20 20" fill="currentColor">' .
				'<path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />' .
				'<path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />' .
				'</svg>',
				'<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 20 20" fill="currentColor">' .
				'<path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />' .
				'<path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />' .
				'</svg>',
				'<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 20 20" fill="currentColor">' .
				'<path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />' .
				'<path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />' .
				'</svg>',
				css_class: 'post-comment-link bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded inline-block'
			);
			echo '</span>';
		}

		edit_post_link(
			'<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 20 20" fill="currentColor">' .
			'<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />' .
			'<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />' .
		  	'</svg>',
			'<span>',
			'</span>',
			class: 'post-edit-link bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded inline-block'
		);
		echo '</div>';
		echo '<div class="clear-both"></div>';
	}
endif;

if ( ! function_exists( 'woodenheart_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function woodenheart_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div>
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>

			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
