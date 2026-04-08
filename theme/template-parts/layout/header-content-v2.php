<header class="px-4 md:px-5 py-10 flex items-center justify-end navbar bg-primary fixed z-50 w-full">
   	<div class="flex ">
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
			<img src="<?php bloginfo('template_directory'); ?>/img/logo-white.svg" alt="<?php bloginfo('name'); ?>" class="w-[200px] hover:opacity-50 default-transition" />
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
				'menu_class' => ' gap-12 lg:gap-8 xl:gap-12 hidden xl:flex',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #site-navigation -->

	<button id="menuBtn" type="button" class="mt-3 xl:hidden text-white " aria-controls="sidebar"
    aria-expanded="false" aria-label="<?php esc_attr_e('Open main menu', 'bcc'); ?>">
    <span class="material-symbols-outlined !block !text-[40px]">menu</span>
    <p class="sr-only"> <?php esc_html_e('Primary Menu', '_bless'); ?>
    </p>
</button>
</header>