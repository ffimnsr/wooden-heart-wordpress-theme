<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WoodenHeart
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="block p-4 text-white font-bold"><?php bloginfo( 'name' ); ?></a>
	<button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700" @click="isSidebarOpen = !isSidebarOpen">
		<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
		</svg>
    </button>
</div>

<div @keydown.esc="isSidebarOpen = !isSidebarOpen"
	x-show="isSidebarOpen"
	x-transition:enter="ease-out transition-medium"
	x-transition:enter-start="opacity-0"
	x-transition:enter-end="opacity-100"
	x-transition:leave="ease-out transition-medium"
	x-transition:leave-start="opacity-100"
	x-transition:leave-end="opacity-0"
	class="z-10 fixed inset-0 transition-opacity">
	<div @click="isSidebarOpen = !isSidebarOpen"
		class="absolute inset-0 bg-black opacity-50"
		tabindex="0"></div>
</div>

<aside id="secondary"
	class="z-20 sidebar bg-white w-64 py-8 px-4 space-y-4 shadow-md absolute inset-y-0 left-0 transform md:relative md:translate-x-0 transition duration-200 ease-in-out"
	:class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full'">
	<?php the_custom_logo(); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
