<?php
/**
 * Partial template About Vision
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<section class="py-10 md:py-30 bg-secondary" id="about-vision">
<div class="container md:px-20 lg:px-10">
  <div class="text-center">
        <h2 class="section-title text-white after:bg-white"><?php the_field('vision_title'); ?></h2>
    </div>

       <?php if (have_rows('keypoints')): ?>

            <div class="container max-w-5xl mx-auto">

                <?php while (have_rows('keypoints')): the_row();

                    // vars
                    $id = get_sub_field('keypoint_id');
                    $title = get_sub_field('keypoint_title');
                    $image = get_sub_field('keypoint_image');
                    $button = get_sub_field('keypoint_button');
                    $modal = get_sub_field('keypoint_modal_content');

                ?>

                    <div class="border-b-[1px] border-white/70 last:border-0  gap-8 flex flex-col md:flex-row items-center md:first:flex-row-reverse md:last:flex-row-reverse first:justify-between last:justify-between md:last:[&_.text-container]:text-right py-15 " >
                        <div class="col-span-6 md:w-1/3 image-container">
                              <img src='<?php echo $image['sizes']['tile-md']; ?>' class='' />
                        </div>

                         <div class="col-span-6 md:w-2/3 text-container">
                               <h4 class="text-white"><?php echo $title; ?></h4>
                                 <p class="text-xl text-white leading-8"><?php echo $modal; ?></p>
                        </div>


                     

                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
</div>
</section>