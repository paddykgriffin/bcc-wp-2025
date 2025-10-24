<?php
/**
 * Template Name: About
 *
 * Template for about page
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


<?php get_template_part( 'template-parts/about/about', 'who' ); ?>
<?php get_template_part( 'template-parts/about/about', 'vision' ); ?>

<?php get_template_part( 'template-parts/about/about', 'teach' ); ?>
<?php get_template_part( 'template-parts/about/about', 'team' ); ?>



<?php get_footer();