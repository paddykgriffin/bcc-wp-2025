<?php
/**
 * Template Name: Building Project
 *
 * Template for building project page
 *
 * @package bcc
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>


<section class="pt-30 building md:pt-20 md:pb-12">
    <div class="container">
        <?php
        /* Start the Loop */
        while (have_posts()):
            the_post();

            get_template_part('template-parts/content/content', 'building');

            // If comments are open, or we have at least one comment, load
            // the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile; // End of the loop.
        ?>
    </div>
    <!-- .container -->
</section>
<!-- Introduction -->

<section class="building py-8">
    <div class="container">
        <div class="pb-6">
            <h2 class="building-heading pb-4 lg:pb-0 mb-0">
                <?php the_field('background_title', 'option'); ?>
            </h2>
        </div>
        <div class="grid lg:grid-cols-12 items-center gap-4 md:gap-8">

            <div class="lg:col-span-7">
                <div class="embed-container mb-6 lg:max-w-[640px]">
                    <div class="hidden lg:block">
                        <?php the_field('background_video', 'option'); ?>
                    </div>

                    <div class="block  lg:hidden">
                        <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                                src="https://player.vimeo.com/video/1016484029?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                title="BCC - Building Project"></iframe></div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>



                </div>
                <div class="flex justify-center max-w-[640px]">
                    <button data-modal-open="modal-video"
                        class="btn bg-tertiary hover:bg-secondary hover:cursor-pointer transition duration-300 hidden lg:block">Click
                        to
                        enlarge
                        the video</button>
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="building-text-size">
                    <?php the_field('background_text', 'option'); ?>
                </div>
            </div>


        </div>
        <!-- .grid -->
    </div>
    <!-- .container -->
</section>
<!-- Background -->

<section class="building py-12 lg:py-24 md:pb-12">
    <div class="container">

        <div class="mb-8 lg:mb-16">
            <h2 class="building-heading">
                <?php the_field('building_ft_title', 'option'); ?>
            </h2>

            <p class="lg:max-w-3/4 building-text-size">
                <?php the_field('building_ft_text', 'option'); ?>
            </p>
        </div>
        <!-- end intro -->

        <div class="grid lg:grid-cols-12 lg:gap-12">
            <div class="col-span-6 order-2 lg:order-1">

                <div class="floor-plan">
                    <?php
                    $image = get_field('building_image', 'option');
                    if (!empty($image)): ?>
                        <a class="block overflow-hidden" href="<?php echo esc_url($image['url']); ?>"
                            data-caption="<?php echo esc_attr($image['caption']); ?>">
                            <img class="mx-auto mb-3 lg:h-[400px] hover:scale-125 transition duration-300"
                                src="<?php echo esc_url($image['sizes']['landscape-md']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    <?php else: ?>
                        <img class="size-10" src="<?php echo esc_url(wp_upload_dir()['baseurl']); ?>/default-image.png"
                            alt="Default icon" />
                    <?php endif; ?>
                </div>






                <?php
                $image_ids = get_field('building_gallery', 'option');

                if ($image_ids): ?>
                    <div class="building-gallery grid grid-cols-3 gap-1 mb-6">
                        <?php foreach ($image_ids as $image_id):
                            $full = wp_get_attachment_image_url($image_id, 'full');
                            $thumb = wp_get_attachment_image_url($image_id, 'medium');
                            $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            $caption = wp_get_attachment_caption($image_id);
                            ?>
                            <a class="block overflow-hidden" href="<?php echo esc_url($full); ?>"
                                data-caption="<?php echo esc_attr($caption); ?>">
                                <img class="object-cover block transition duration-300 hover:scale-125"
                                    src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <p class="italic font-light !text-sm text-center">Click to enlarge images</p>

            </div>
            <div class="col-span-6 order-1 lg:order-2">
                <div class="lg:pt-10 pb-10 lg:pb-0 ">
                    <?php while (have_rows('building_features', 'option')):
                        the_row(); ?>

                        <div class="flex items-center gap-6 mb-6">
                            <?php
                            $image = get_sub_field('icon');
                            if (!empty($image)): ?>
                                <img class="mx-auto w-full" src="<?php echo $image['sizes']['tile-md']; ?>"
                                    alt="<?php echo $image['alt']; ?>" />
                            <?php else: ?>
                                <img class="size-10" src="<?php echo wp_upload_dir()['baseurl']; ?>/2026/04/star.svg"
                                    alt="Default icon" />
                            <?php endif; ?>
                            <p class="text-lg !mb-0 !leading-6">
                                <?php the_sub_field('feature_name'); ?>
                            </p>

                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <!-- end grid -->


        <div class="text-center pt-10 border-b border-gray-300 pb-20">
            <h3 class="text-3xl text-gray-600 pb-6 mb-6 font-bold">
                <?php the_field('potential_layout_title', 'option'); ?>
            </h3>
            <div class="grid lg:grid-cols-3 gap-12">
                <?php while (have_rows('potential_layout_repeater', 'option')):
                    the_row(); ?>

                    <div class="text-center">

                        <div class="floor-plan">
                            <?php
                            $image = get_sub_field('floor_plan_image');
                            if (!empty($image)): ?>
                                <a class="block overflow-hidden" href="<?php echo esc_url($image['url']); ?>"
                                    data-caption="<?php echo esc_attr($image['caption']); ?>">
                                    <img class="mx-auto mb-3 h-[400px] hover:scale-125 transition duration-300"
                                        src="<?php echo esc_url($image['sizes']['tile-md']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>" />
                                </a>
                            <?php else: ?>
                                <img class="size-10" src="<?php echo esc_url(wp_upload_dir()['baseurl']); ?>/default-image.png"
                                    alt="Default icon" />
                            <?php endif; ?>

                        </div>



                        <p class="!text-sm italic font-light !mb-0 !leading-6">
                            <?php the_sub_field('floor_plan_label'); ?>
                        </p>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- end potential layout -->

    </div>
    <!-- .container -->
</section>
<!-- Building -->

<section class="building  py-6 pb-12 ">
    <div class="container">
        <div class="text-center pb-10">
            <h2 class="building-heading">
                <?php echo get_field('building_usage_title', 'option'); ?>
            </h2>
            <p class="lg:max-w-2/3 mx-auto !text-2xl">
                <?php echo get_field('building_usage_text', 'option'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php while (have_rows('building_usage_cards', 'option')):
                the_row(); ?>
                <div class="flex flex-col shadow-xl bg-[#F7F7F7] text-center px-6 py-12 border border-gray-100 ">
                    <?php
                    $image = get_sub_field('building_usage_card_icon');
                    if (!empty($image)): ?>
                        <img class="size-12 mx-auto" src="<?php echo $image['sizes']['tile-md']; ?>"
                            alt="<?php echo $image['alt']; ?>" />
                    <?php else: ?>
                        <img class="size-12" src="<?php echo wp_upload_dir()['baseurl']; ?>/2026/04/star.svg"
                            alt="Default icon" />
                    <?php endif; ?>
                    <h4 class="text-2xl text-gray-600 font-bold mt-4 mb-2 pb-2">
                        <?php the_sub_field('building_usage_card_title'); ?>
                    </h4>
                    <p class="!text-base !mb-0 !leading-7 text-gray-500">
                        <?php the_sub_field('building_usage_card_text'); ?>
                    </p>

                </div>
            <?php endwhile; ?>
        </div>
        <!-- .grid -->
    </div>
</section>
<!-- Building Usage -->

<section class="building  py-12">
    <div class="container border-b border-gray-300 pb-12">
        <div class="grid lg:grid-cols-2 items-center gap-12">
            <div class="building-text-size">
                <h2 class="building-heading"><?php echo get_field('building_finance_title', 'option'); ?></h2>
                <?php echo get_field('building_finance_description', 'option'); ?>
            </div>
            <div class="text-center building-text-size">
                <?php echo get_field('building_finance_funds_progress', 'option'); ?>
            </div>
        </div>
    </div>
</section>
<!-- Finance -->

<section class="building py-12">
    <div class="container">
        <div class="text-center">
            <h2 class="building-heading mb-8">
                <?php echo get_field('building_support_title', 'option'); ?>
            </h2>
            <div class="building-text-size">
                <?php echo get_field('building_support_description', 'option'); ?>
            </div>
        </div>

        <div
            class="flex flex-col shadow-xl bg-[#F7F7F7] px-6 md:px-24 py-12 border border-gray-100 md:max-w-2/3 mx-auto my-18 building-fund-card">
            <?php echo get_field('building_support_fund', 'option'); ?>

        </div>




        <div
            class="building-text-size text-center [&_a]:text-tertiary [&_a]:underline [&_strong]:text-tertiary [&_strong]:font-bold [&_a]:hover:text-gray-600">

            <?php echo get_field('building_support_further_support', 'option'); ?>
        </div>



    </div>
</section>
<!-- Support -->




<?php get_template_part('template-parts/custom/custom', 'modal'); ?>
<?php get_footer();