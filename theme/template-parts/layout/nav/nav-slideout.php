<div id="sidebar" data-state="closed"
    class="fixed z-50 bg-primary  h-full transition-transform duration-500 ease-in-out w-3/4 sm:max-w-sm transform translate-x-full inset-y-0 right-0">

    <div class="border-b-1 border-white/70  px-6 py-4 flex items-center justify-between">
        <button id="homeBtn" class="text-white ">
            <span class="material-symbols-outlined !block">home</span>
            <p class="sr-only"> <?php esc_html_e('Close Menu', '_bless'); ?>
        </button>

        <?php if (have_rows('boxes', 'option')): ?>
            <?php while (have_rows('site_links_repeat', 'option')):
                the_row(); ?>

                <?php
                $link = get_sub_field('site_link_url');

                if ($link): ?>
                    <a href="<?php echo esc_url($link); ?>"
                        class="hover:opacity-75 transition-all duration-300" target="_blank">
                        <?php
                        $image = get_sub_field('site_link_icon'); // Get image field

                        if ($image && is_array($image) && isset($image['url'])): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <button id="closeBtn" class="text-white">
            <span class="material-symbols-outlined !block">close</span>
            <p class="sr-only"> <?php esc_html_e('Close Menu', '_bless'); ?>
        </button>
    </div>



    <nav id="site-mobile-navigation"
        aria-label="<?php esc_attr_e('Mobile Main Navigation', '_bless'); ?>" class="">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                'container' => false,
                'menu_id' => 'primary-menu',
                'menu_class' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
            )
        );
        ?>
    </nav><!-- #site-mobile-navigation -->



</div>