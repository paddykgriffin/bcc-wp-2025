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
			<div class="md:col-span-4 ">
			
				<?php get_template_part('template-parts/layout/footer', 'mailchimp'); ?>


			</div>
			<div class="md:col-span-3 md:col-start-7  ">
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
		<div class="md:col-span-4 md:col-start-10 ">
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


<div class="bg-primary py-10 md:py-20 text-white">
	<div class="container">
		<div class="grid md:grid-cols-12 gap-6">

		<div class="md:col-span-6">

		
<div class="md:text-sm mb-6 text-center md:text-left">
						<?php
			$bcc_blog_info = get_bloginfo('name');
			if (! empty($bcc_blog_info)) :
			?>
			&copy;	<?php echo date("Y"); ?> <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>,
			<?php
			endif;

			/* translators: 1: WordPress link, 2: WordPress. */
			printf(
				'<a class="text-center md:text-left md:text-sm hover:opacity-50 default-transition" href="%1$s">proudly powered by %2$s</a>.',
				esc_url(__('https://wordpress.org/', 'bcc')),
				'WordPress'
			);
			?>
			</div>

				<?php

					$link = get_field('footer_link', 'option');

					if ($link): ?>

						<a class="my-10 md:my-0 block hover:opacity-70 default-transition" href="<?php echo $link; ?>" target="_blank">

							<?php

							$image = get_field('footer_logo', 'option');

							if (!empty($image)): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>

						</a>

					<?php endif; ?>

						<?php if (is_active_sidebar('sidebar-1')) : ?>
			<aside role="complementary" aria-label="<?php esc_attr_e('Footer', 'bcc'); ?>">
				<?php dynamic_sidebar('sidebar-1'); ?>
			</aside>
		<?php endif; ?>
		</div>

		<div class="md:col-span-6  grid md:items-end justify-center md:justify-end text-center md:text-right">
			<div>
<?php if (has_nav_menu('footerPrivacy')) : ?>
				
			<nav aria-label="<?php esc_attr_e('Footer Menu', 'bcc'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footerPrivacy',
						'menu_class'     => 'footer-menu flex flex-col md:flex-row gap-6 md:gap-3  [&_li:last-child_a]:after:hidden ',
						'depth'          => 1,
						'item_class'  => 'nav-item ',
						'link_class'   => 'default-transition hover:opacity-50 after:ml-3 md:after:content-["/"]'
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<div class="text-center md:text-right py-4">
						<p><?php the_field('credit_text', 'option'); ?> <a href="<?php the_field('credit_url', 'option'); ?>" target="_blank" class="hover:opacity-50 default-transition"><?php the_field('credit_author', 'option'); ?></a></p>
					</div>
					<!-- .site-info -->
					 </div>

		</div>
		</div>
	</div>
</div>


</footer><!-- #colophon -->