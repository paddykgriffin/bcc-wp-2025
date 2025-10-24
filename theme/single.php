<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bcc
 */

get_header();
?>


<section class="hero grid hero-inner-page bg-primary h-[40vh] [&_img]:w-full overflow-hidden" >
    <div class="col-start-1 row-start-1 z-10 flex items-center">
        <div class="container text-center">
            <?php the_title( '<h1 class="entry-title lg:pt-15 mb-0 text-5xl text-white text-shadow-md">', '</h1>' ); ?>
        </div>
    </div>
    <div class="col-start-1 row-start-1">
   
    </div>
</section>




	<section class="md:py-20">
			<div class="container max-w-3xl">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span aria-hidden="true">' . __( 'Next Post', 'bcc' ) . '</span> ' .
								'<span class="sr-only">' . __( 'Next post:', 'bcc' ) . '</span> <br/>' .
								'<span>%title</span>',
							'prev_text' => '<span aria-hidden="true">' . __( 'Previous Post', 'bcc' ) . '</span> ' .
								'<span class="sr-only">' . __( 'Previous post:', 'bcc' ) . '</span> <br/>' .
								'<span>%title</span>',
						)
					);
				}

				// If comments are open, or we have at least one comment, load
				// the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				// End the loop.
			endwhile;
			?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
