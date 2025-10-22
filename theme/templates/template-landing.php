<?php
/**
 * Template Name: Landing
 *
 * Template for Landing page
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php get_template_part( 'template-parts/hero/hero', 'inner-page' ); ?>
<section class="py-10 md:py-20">
    <div class="container max-w-4xl pb-20">
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
    <div class="container max-w-6xl">
        <?php get_template_part( 'template-parts/custom/custom', 'grid-boxes' ); ?>
        <?php get_template_part( 'template-parts/custom/custom', 'staff' ); ?>
       
    </div>
     <div class="container !max-w-2xl bg-secondary p-0 lg:mt-20">
         <?php get_template_part( 'template-parts/custom/custom', 'cta' ); ?>
    </div>
</section>
<?php get_footer();