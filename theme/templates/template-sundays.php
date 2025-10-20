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



<?php get_template_part( 'template-parts/sundays/sundays', 'what' ); ?> 
<?php get_template_part( 'template-parts/sundays/sundays', 'children' ); ?> 
<?php get_template_part( 'template-parts/sundays/sundays', 'prayer' ); ?> 
<?php get_template_part( 'template-parts/sundays/sundays', 'sermons' ); ?> 


<?php get_footer();