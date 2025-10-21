<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcc
 */

get_header();
?>


<section class="hero grid hero-inner-page bg-primary h-[40vh] [&_img]:w-full overflow-hidden" >
    <div class="col-start-1 row-start-1 z-10 flex items-center">
        <div class="container text-center">
            <?php the_title( '<h1 class="entry-title text-5xl text-white text-shadow-md">', '</h1>' ); ?>
        </div>
    </div>
    <div class="col-start-1 row-start-1">
    <img src="<?php bloginfo('template_directory'); ?>/img/banner-random-1680x375-1.jpg" alt="default image">
    </div>
</section>

<section class="py-10 md:py-10">
		<div class="container !max-w-3xl">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open, or we have at least one comment, load
				// the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</div>
	</section><!-- #primary -->

<?php
get_footer();
