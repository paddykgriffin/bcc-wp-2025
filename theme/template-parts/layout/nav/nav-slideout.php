<div id="sidebar" data-state="closed"
    class="fixed z-50 bg-gray-200  h-full max-h-full overflow-y-auto transition-transform duration-500 ease-in-out w-3/4 sm:max-w-sm transform translate-x-full inset-y-0 right-0">

    <div class="bg-primary  px-3 py-4 flex items-center justify-between">
        <button id="homeBtn" type="button" class="text-white" aria-label="<?php esc_attr_e('Home', 'bcc'); ?>" aria-controls="sidebar" aria-expanded="false">
            <span class="material-symbols-outlined !block !text-[40px]">home</span>
            <p class="sr-only"><?php esc_html_e('Home', 'bcc'); ?></p>
        </button>

        <button id="closeBtn" type="button" class="text-white" aria-label="<?php esc_attr_e('Close menu', 'bcc'); ?>" aria-controls="sidebar">
            <span class="material-symbols-outlined !block !text-[40px]">close</span>
            <p class="sr-only"><?php esc_html_e('Close Menu', 'bcc'); ?></p>
        </button>
    </div>



    <nav id="site-mobile-navigation"
        aria-label="<?php esc_attr_e('Mobile Main Navigation', 'bcc'); ?>" class="overflow-y-auto">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-2',
                'container' => false,
                'menu_id' => 'mobile-menu',
                'depth'   => 0,
                'menu_class' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
                'walker'         => new Walker_Nav_Menu_With_Button(),
            )
        );
        ?>
    </nav><!-- #site-mobile-navigation -->



</div>