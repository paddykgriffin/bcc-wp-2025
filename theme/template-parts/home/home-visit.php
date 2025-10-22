<?php

/**
 * Template part for displaying the visit section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCC
 */
?>

<section class="py-10 lg:py-20 ">

     <div class="container">
        <div class="text-center md:max-w-1/2 mx-auto">
            <h2 class="section-title"><?php the_field('plan_title', 'option'); ?></h2>
            <p class="text-xl"><?php the_field('plan_content', 'option'); ?></p>
        </div>
    </div>

    <div class="container p-0 py-20 max-w-full">
         
    <div class="relative">
          <?php
            // Use an ACF image field
            // Set the 'return value' option to "array" (this is the default)
            // This example uses three image sizes, called medium, medium_large, thumbnail
            $imageobject = get_field('plan_image', 'option');
            if( !empty($imageobject) ):
                echo '<picture>
                <source srcset="' . $imageobject['sizes']['tile-md'] .'" media="(min-width: 320px) and (max-width:399px)">
                <source srcset="' . $imageobject['sizes']['tile-lg'] .'" media="(min-width: 400px) and (max-width:799px)">
                <source srcset="' . $imageobject['sizes']['desktop-lg-hero'] .'" media="(min-width: 800px) and (max-width:1399px)">
                <source srcset="' . $imageobject['sizes']['desktop-xxl-hero'] .'" media="(min-width: 1400px)">
                <img class="w-full" src="' . $imageobject['sizes']['desktop-lg-hero'] .'"> </picture>';

            endif;
            ?>
          <a href="<?php the_field('map_link', 'option'); ?>" class="absolute bottom-0 right-0 bg-tertiary hover:bg-primary px-3 py-2 text-white btn default-transition" target="_blank">View on Google Maps</a>

        </div>

</div>


 <div class="container !max-w-xl">

<div class="grid md:grid-cols-12 gap-8">

            <div class="col-span-6">
             <?php 

            $link = get_field('button_one', 'option');

            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn bg-primary border-primary border-2 block default-transition hover:bg-secondary  hover:border-secondary hover:text-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

            </div>

             <div class="col-span-6">
             <?php 

            $link = get_field('button_two', 'option');

            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn border-secondary border-2 block default-transition hover:bg-secondary text-secondary hover:text-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

             </div>

        </div>

        </div>
</section>   