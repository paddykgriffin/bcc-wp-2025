<?php
/**
 * Template Name: Two Columns
 *
 * Template for Two Columns pages
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<?php get_template_part( 'template-parts/hero/hero', 'inner-page' ); ?>



<section class="py-10 md:py-20">


<div class="container">
    <div class="grid grid-cols-12 gap-16">
        <div class="col-span-8">
           <?php
    /* Start the Loop */
    while (have_posts()):
        the_post();

        get_template_part('template-parts/content/content', 'page');

        // If comments are open, or we have at least one comment, load
        // the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }

    endwhile; // End of the loop.
    ?>

<div class="max-w-2xl bg-secondary mt-10">
    <?php get_template_part( 'template-parts/custom/custom', 'cta' ); ?>
    </div>    
</div>
         <div class="col-span-4"> 
           <?php get_template_part('template-parts/sidebar/sidebar', 'right'); ?>

        </div>
    </div>
</div>



</section>




<?php get_footer();