<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WoodenHeart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-gray-100 text-gray-900 antialiased' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="relative min-h-screen md:flex md:gap-4" x-data="{ isSidebarOpen: false }">
	<?php get_sidebar(); ?>
	<div id="content-root" class="md:p-10 md:flex-1 py-10">
		<header id="masthead" class="w-full z-10">
			<div>
				<div class="text-center">
					<h1><a class="text-gray-900 font-extrabold text-4xl" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					$woodenheart_description = get_bloginfo( 'description', 'display' );
					if ( $woodenheart_description || is_customize_preview() ) :
					?>
						<p><?php echo $woodenheart_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div>

				<div class="text-center">
					<nav id="site-navigation" class="mt-12">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class' 	 => 'primary-nav space-x-4',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->
