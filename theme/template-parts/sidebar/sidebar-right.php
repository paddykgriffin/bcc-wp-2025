<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>


<div class="bg-gray-100 p-8">

	<h3 class="mb-0 pb-0 text-secondary text-2xl">
		<?php echo wp_nav_menu_title('sidebarRightMenu'); ?>
		<button class="btn lg:hidden" data-toggle="collapse" href="#sidebarRightMenu">
			<i class="far fa-chevron-down"></i>
		</button>
	</h3>


	<p class="hidden md:block text-sm mb-6">Explore our various areas</p>


	<?php wp_nav_menu(
		array(
			'theme_location'  => 'sidebarRightMenu',
			'container_class' => 'bcc-custom-sidebar-menu',
			'container_id'    => 'sidebarRightMenu',
			'menu_class'      => 'pb-3',
			'fallback_cb'     => '',
			'menu_id'         => 'sidebarRightMenu',
			'depth'           => 2,
			'list_item_class'  => 'border-b-[1px] border-gray-300 py-2 mb-2 last:border-0 aria-[current-page]:bg-red-500',
    		'link_class'   => 'py-1 block hover:text-secondary default-transition aria-[current=page]:text-secondary'
		)
	); ?>


</div>
<!-- .bcc-custom-sidebarmenu end -->
