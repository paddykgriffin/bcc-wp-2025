<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcc
 */

?>

<header id="masthead" class="fixed px-4 md:px-5 top-0 left-0 w-full navbar z-50 default-transition flex justify-end md:p-10 items-center">

	<div class="block md:hidden logo">
		<?php
		if (is_front_page()) :
		?>
			<a href="<?php echo esc_url(home_url('/')); ?>" className="group">
				<img src="<?php bloginfo('template_directory'); ?>/img/logo-white.svg" alt="<?php bloginfo('name'); ?>" class="w-[200px] hover:opacity-50 default-transition" />
			</a>
		<?php
		else :
		?>
		<a href="<?php echo esc_url(home_url('/')); ?>" className="group">
			<img src="<?php bloginfo('template_directory'); ?>/img/logo-white.svg" alt="<?php bloginfo('name'); ?>" class="w-[250px] hover:opacity-50 default-transition" />
			</a>
		<?php
		endif;

		$bcc_description = get_bloginfo('description', 'display');
		if ($bcc_description || is_customize_preview()) :
		?>
			<p><?php echo $bcc_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
				?></p>
		<?php endif; ?>
	</div>

	<nav id="site-navigation" class="flex justify-end" aria-label="<?php esc_attr_e('Main Navigation', 'bcc'); ?>">
		
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class' => ' gap-12 lg:gap-8 xl:gap-12 hidden md:flex',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #site-navigation -->

	<button id="menuBtn" class="mt-3 lg:hidden text-white " aria-controls="primary-menu"
    aria-expanded="false">
    <span class="material-symbols-outlined !block !text-[40px]">menu</span>
    <p class="sr-only"> <?php esc_html_e('Primary Menu', '_bless'); ?>
    </p>
</button>

</header><!-- #masthead -->