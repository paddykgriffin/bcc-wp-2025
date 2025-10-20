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



<!-- <section class="py-10 md:py-20">


<div class="container">
    content...
</div>
</section> -->

<?php get_template_part( 'template-parts/about/about', 'who' ); ?>
<?php get_template_part( 'template-parts/about/about', 'vision' ); ?>

<?php get_template_part( 'template-parts/about/about', 'teach' ); ?>
<?php get_template_part( 'template-parts/about/about', 'team' ); ?>



<?php get_footer();