<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcc
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pb-12'); ?>>

	<header class="entry-header md:py-24 text-center text-primary">
		<?php
		the_title('<h1 class="pb-0 text-5xl font-poppins font-bold">', '</h1>');
		?>
	</header><!-- .entry-header -->



	<div <?php bcc_content_class('grid lg:grid-cols-12 items-center gap-8'); ?>>
		<div class="lg:col-span-6 [&_p]:leading-10">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div>' . __('Pages:', 'bcc'),
					'after' => '</div>',
				)
			);
			?>
		</div>

		<div class="lg:col-span-6 md:pl-20">

			<?php
			// Get the featured image
			$thumb_id = get_post_thumbnail_id();
			if (!$thumb_id) {
				?>
				<div>no image...</div>
				<?php
				// Do not return, just skip the figure
			} else {

				// Get image data and sizes
				$image = wp_get_attachment_image_src($thumb_id, 'full');
				$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

				// Size keys
				$mobile_size = 'tile-md';
				$desktop_size = 'tile-lg';

				// Get the image object to access sizes array
				$image_obj = wp_get_attachment_image_src($thumb_id, $desktop_size);
				$mobile_src = wp_get_attachment_image_src($thumb_id, $mobile_size);

				// Prepare sources
				$mobile_src = $mobile_src ? $mobile_src[0] : '';
				$desktop_src = $image_obj ? $image_obj[0] : '';
				?>

				<figure class="m-0 not-prose">
					<picture>
						<?php if ($mobile_src): ?>
							<source media="(max-width: 767px)" srcset="<?php echo esc_url($mobile_src); ?>">
						<?php endif; ?>
						<img class="mobile rounded-none" src="<?php echo esc_url($desktop_src); ?>"
							alt="<?php echo esc_attr($alt); ?>" />
					</picture>
				</figure><!-- .post-thumbnail -->
			<?php } ?>
		</div>
	</div><!-- .entry-content -->




	<?php if (get_edit_post_link()): ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__('Edit <span class="sr-only">%s</span>', 'bcc'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->