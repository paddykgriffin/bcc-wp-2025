<?php
/**
 * Template Name: Contact
 *
 * Template for contact page
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<?php get_template_part( 'template-parts/hero/hero', 'inner-page' ); ?>



<section class="py-10 md:py-20">


<div class="container !max-w-3xl">
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

    

</div>

<div class="container">
    <?php get_template_part( 'template-parts/custom/custom', 'location' ); ?>
</div>
</section>


<?php get_footer();