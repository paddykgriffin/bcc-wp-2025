<?php

/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

get_header();
?>

<?php get_template_part('template-parts/hero/hero'); ?>
<!-- #hero -->


<section id="front-page" class="hidden">
    <?php
    /* Start the Loop */
    while (have_posts()):
        the_post();

        get_template_part('template-parts/content/content', 'home');

        // If comments are open, or we have at least one comment, load
        // the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }

    endwhile; // End of the loop.
    ?>

</section>
<!-- #front-page -->

<?php get_template_part('template-parts/home/home', 'latest-sermon'); ?>
<!-- #latest sermon -->

<?php get_template_part('template-parts/home/home', 'what-we-do'); ?>
<!-- #latest sermon -->

<?php get_template_part('template-parts/home/home', 'visit'); ?>
<!-- #latest sermon -->




<?php
get_footer();
