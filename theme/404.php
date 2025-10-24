<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

			<div>
				<header class="page-header hidden">
					<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'bcc' ); ?></h1>
				</header><!-- .page-header -->

				<div <?php bcc_content_class( 'page-content' ); ?>>
					<p><?php esc_html_e( 'This page could not be found. It might have been removed or renamed, or it may never have existed.', 'bcc' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div>

		</div>
	</section><!-- #primary -->

<?php
get_footer();
