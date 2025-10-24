<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bcc
 */

get_header();
?>

<section class="hero grid hero-inner-page bg-primary h-[40vh] [&_img]:w-full overflow-hidden" >
    <div class="col-start-1 row-start-1 z-10 flex items-center">
        <div class="container text-center">
            <h1 class="entry-title lg:pt-15 mb-0 text-5xl text-white text-shadow-md">Page Not Found</h1>
        </div>
    </div>
    <div class="col-start-1 row-start-1">
    <?php /* echo bcc_post_thumbnail($post->ID, 'hero-image'); */ ?>
    </div>
</section>

	<section class="py-10 md:py-10">
		<div class="container !max-w-3xl">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title max-w-full font-medium">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', 'bcc' ),
					get_search_query()
				);
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			bcc_the_posts_navigation();

		else :

			// If no content is found, get the `content-none` template part.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</div>
	</section><!-- #primary -->

<?php
get_footer();
