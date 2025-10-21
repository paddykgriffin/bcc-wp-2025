<?php
/**
 * Partial template for grid boxes
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>





<div class="grid grid-cols-12 items-center">
    <div class="col-span-6">
        <div class="bg-gray-200 text-center  py-25 ">
            <?php 
            $image = get_field('cta_logo', 'option');
            if( !empty($image) ): ?>
            <img class="mx-auto w-[100px]" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php endif; ?>
        </div>
    </div>
    <div class="col-span-6">
        <div class="bg-secondary text-center px-10">
            <h3 class="text-white text-3xl"><?php the_field('cta_title', 'option'); ?></h3>
            <p class="text-white pb-6"><?php the_field('cta_text', 'option'); ?></p>
            <a href=" <?php the_field('cta_link', 'option'); ?>" class="btn bg-tertiary hover:bg-primary default-transition">Contact Us</a>
        </div>
    </div>
</div>
