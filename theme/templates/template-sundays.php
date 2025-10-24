<?php
/**
 * Template Name: Sundays
 *
 * Template for sundays page
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<?php get_template_part( 'template-parts/hero/hero', 'inner-page' ); ?>


<?php
    /* Start the Loop */
    while (have_posts()):
        the_post();

        get_template_part('template-parts/content/content', 'custom');

        // If comments are open, or we have at least one comment, load
        // the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }

    endwhile; // End of the loop.
    ?>


<?php get_template_part( 'template-parts/sundays/sundays', 'what' ); ?> 
<?php get_template_part( 'template-parts/sundays/sundays', 'children' ); ?> 
<?php get_template_part( 'template-parts/sundays/sundays', 'prayer' ); ?> 
<?php get_template_part( 'template-parts/sundays/sundays', 'sermons' ); ?> 


<?php get_footer();