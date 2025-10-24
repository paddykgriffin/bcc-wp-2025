<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bcc
 */

?>

</main><!-- #content -->

	<?php get_template_part( 'template-parts/layout/footer', 'content' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<div id="overlay" data-state="closed" aria-hidden="true" class="fixed z-40 bg-black/50 transition-opacity duration-300 inset-0  opacity-0 hidden"></div>
<?php get_template_part('template-parts/layout/nav/nav', 'slideout'); ?>

</body>
</html>
