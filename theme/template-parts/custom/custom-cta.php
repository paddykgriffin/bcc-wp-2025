<?php
/**
 * Partial template for grid boxes
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>




<div class="bg-secondary">
    <div class="grid md:grid-cols-12 items-center">
        <div class="col-span-6">
            <div class="bg-gray-200 text-center  py-6 md:py-25 ">
                <?php 
                $image = get_field('cta_logo');
                if( !empty($image) ): ?>
                <img class="mx-auto w-[100px]" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
            </div>
        </div>
        <div class="col-span-6">
            <div class="bg-secondary text-center py-10 md:py-0 px-10">
                <h3 class="text-white text-3xl"><?php the_field('cta_title'); ?></h3>
                <p class="text-white pb-6"><?php the_field('cta_text'); ?></p>
        

                <a class="btn bg-tertiary hover:bg-primary default-transition" href="<?php echo esc_url( 'mailto:' . antispambot( get_field('cta_link') ) ); ?>">
                    <?php /* echo esc_html( antispambot( get_field('cta_link' ) ) ); */?>
            <?php the_field('cta_link_label'); ?>
            </a>


            </div>
        </div>
    </div>
</div>
