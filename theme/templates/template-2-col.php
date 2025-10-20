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
    Two Columns content...
</div>
</section>


<?php get_footer();