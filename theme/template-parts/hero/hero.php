<?php

/**
 * Template part for displaying a hero section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCC
 */
?>



<section class="grid h-[80vh] md:h-auto relative overflow-hidden md:overflow-auto" id="hero">

    <?php

    $image = function_exists('get_field') ? get_field('hero_image', 'option') : null;
    $size = 'full'; // (thumbnail, medium, large, full or custom size

    if (empty($image)): ?>
        <div>no image...</div>
    <?php endif; ?>

    <?php if (!empty($image)): ?>

        <img class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 md:relative max-w-none md:max-w-full md:col-start-1 md:row-start-1 md:w-full" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

    <?php endif; ?>

    <div class="inset-0 col-start-1 row-start-1 bg-black/20 transition-opacity duration-500 opacity-100"></div>

    <div class="col-start-1 row-start-1 flex items-center z-20">

        <div class="container !max-w-xl lg:pt-20">
            <h1 class="text-center pb-3 text-white text-2xl">
                <?php the_field('hero_welcome', 'option'); ?> <span class="hidden">Ballycullen Community Church</span>

            </h1>

            <?php

            $image = function_exists('get_field') ? get_field('hero_logo', 'option') : null;
            $size = 'full'; // (thumbnail, medium, large, full or custom size

            if (empty($image)): ?>
                <div>no image...</div> 
            <?php endif; ?>

            <?php if (!empty($image)): ?>

                <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

            <?php endif; ?>

            <div class="grid gap-6 md:grid-cols-12 mt-10">
                <?php

                $link = get_field('hero_button_one', 'option');

                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="btn bg-tertiary hover:bg-[#5d770e] border-2 border-tertiary hover:border-[#5d770e] btn-lg d-block col-span-6 default-transition" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
                <?php

                $link = get_field('hero_button_two', 'option');

                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class=" btn bg-transparent border-2 border-white hover:bg-white hover:text-black text-center btn-lg d-block col-span-6 default-transition" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>

             <div class="text-center lg:pt-30">
            <button id="scrollHeroDown" class="">
                        <span class="material-symbols-outlined !text-[60px] text-white">
                            keyboard_arrow_down
                        </span>
                    </button>
        </div>

        </div>
       
    </div>





</section>