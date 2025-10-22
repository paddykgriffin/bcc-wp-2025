<?php

/**
 * Template part for displaying the latest sermon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCC
 */
?>

<section class="py-10 lg:py-20 latest-sermon-home" id="latest-sermon">

    <div class="container max-w-4xl">
        <div class="text-center">
            <h2 class="section-title">Latest Sermon</h2>
             <?php echo do_shortcode('[asp-sermons post="1"]'); ?>
             
        </div>
    </div>
</section>