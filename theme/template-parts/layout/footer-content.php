<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bcc
 */

?>

<footer id="colophon" class="">

<div class="bg-[#f4f6f8] py-3 md:py-10">
	<div class="container">
		<div class="grid md:grid-cols-12 gap-6">
			<div class="col-span-12 lg:col-span-4 ">
			
				<?php get_template_part('template-parts/sidebar/sidebar', 'mailchimp'); ?>


			</div>
			<div class="col-span-12 lg:col-span-3 lg:col-start-7  ">
			<?php if (has_nav_menu('footer1')) : ?>
				<h4 class="text-xl">
					<?php echo wp_nav_menu_title('footer1'); ?>
						</h4>
			<nav aria-label="<?php esc_attr_e('Footer Menu', 'bcc'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer1',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
						'list_item_class'  => 'nav-item',
    					'link_class'   => 'py-1 block hover:text-secondary default-transition'
					)
				);
				?>
			</nav>
		<?php endif; ?>
		</div>
		<div class="col-span-12 lg:col-span-4 lg:col-start-10 ">
			<?php if (has_nav_menu('footer2')) : ?>
				<h4 class="text-xl">
					<?php echo wp_nav_menu_title('footer2'); ?>
						</h4>
			<nav aria-label="<?php esc_attr_e('Footer Menu', 'bcc'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer2',
						'menu_class'     => 'footer-menu flex flex-wrap',
						'depth'          => 1,
						'list_item_class'  => 'nav-item max-w-[50%] basis-1/2',
						'link_class'   => 'py-1 block hover:text-secondary default-transition' 
					)
				);
				?>
			</nav>
		<?php endif; ?>
		</div> 
	</div>
	</div>
</div>


<div class="bg-primary py-10 lg:py-20 text-white">
	<div class="container">
		<div class="grid grid-cols-12 gap-6">

		<div class="col-span-12 lg:col-span-6">

		
<div class="md:text-sm mb-6 text-center lg:text-left">
						<?php
			$bcc_blog_info = get_bloginfo('name');
			if (! empty($bcc_blog_info)) :
			?>
			&copy;	<?php echo date("Y"); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>,
			<?php
			endif;

			/* translators: 1: WordPress link, 2: WordPress. */
			// printf(
			// 	'<a class="text-center lg:text-left md:text-sm hover:opacity-50 default-transition" href="%1$s">proudly powered by %2$s</a>.',
			// 	esc_url(__('https://wordpress.org/', 'bcc')),
			// 	'WordPress'
			// );
			?>
			</div>

			<div class="flex flex-col md:flex-row gap-8 md:gap-2 py-10 md:py-0">

				<?php

					$link = get_field('footer_link', 'option');

					if ($link): ?>

						<a class="text-center md:my-0 block hover:opacity-70 default-transition" href="<?php echo $link; ?>" target="_blank">

							<?php

							$image = get_field('footer_logo', 'option');

							if (!empty($image)): ?>

								<img class="mx-auto xl:mx-0 md:w-[240px]" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>

						</a>

					<?php endif; ?>


					<?php

					$linkTwo = get_field('footer_link_two', 'option');

					if ($linkTwo): ?>

						<a class="text-center md:my-0 block hover:opacity-70 default-transition" href="<?php echo $linkTwo; ?>" target="_blank">

							<?php

							$imageTwo = get_field('footer_logo_two', 'option');

							if (!empty($imageTwo)): ?>

								<img class="mx-auto xl:mx-0 md:w-[240px]" src="<?php echo $imageTwo['url']; ?>" alt="<?php echo $imageTwo['alt']; ?>" />

							<?php endif; ?>

						</a>

					<?php endif; ?>
 
					 </div>


						<?php if (is_active_sidebar('sidebar-1')) : ?>
			<aside role="complementary" aria-label="<?php esc_attr_e('Footer', 'bcc'); ?>">
				<?php dynamic_sidebar('sidebar-1'); ?>
			</aside>
		<?php endif; ?>
		</div>

		<div class="col-span-12 lg:col-span-6  grid lg:items-end justify-center lg:justify-end text-center lg:text-right">
			<div>
<?php if (has_nav_menu('footerPrivacy')) : ?>
				
			<nav aria-label="<?php esc_attr_e('Footer Menu', 'bcc'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footerPrivacy',
						'menu_class'     => 'footer-menu flex flex-col md:flex-row gap-1 md:gap-3  [&_li:last-child_a]:after:hidden ',
						'depth'          => 1,
						'item_class'  => 'nav-item ',
						'link_class'   => 'default-transition hover:opacity-50 after:ml-3 md:after:content-["/"]'
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<div class="text-center lg:text-right pt-10 md:py-4">
						<p><?php the_field('credit_text', 'option'); ?> <a href="<?php the_field('credit_url', 'option'); ?>" target="_blank" class="hover:opacity-50 default-transition"><?php the_field('credit_author', 'option'); ?></a></p>
					</div>
					<!-- .site-info -->
					 </div>

		</div>
		</div>
	</div>
</div>


</footer><!-- #colophon -->