<?php
/**
 * Partial template About Children Section
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="py-10 md:py-30 bg-secondary">

<div class="container md:px-20 lg:px-10">
    <div class="text-center">
        <h2 class="section-title text-white after:bg-white"><?php the_field('sundays_children_title'); ?></h2>
    </div>

       <?php if (have_rows('sundays_row_content')): ?>

            <div class="container max-w-5xl mx-auto">

                <?php while (have_rows('sundays_row_content')): the_row();

                    // vars
                  
                    $title = get_sub_field('sundays_row_title');
                     $text = get_sub_field('sundays_row_content');
                    $image = get_sub_field('sundays_row_image');
              

                ?>

                    <div class="border-b-[1px] border-white/70 last:border-0  gap-8 flex flex-col lg:flex-row items-center lg:first:flex-row lg:last:flex-row-reverse lg:first:justify-between lg:last:justify-between lg:last:[&_.text-container]:text-left py-15 " >

                
                        <div class="col-span-6 lg:w-1/2 image-container">
                              <img src='<?php echo $image['sizes']['landscape-md']; ?>' class='' />
                        </div>

                         <div class="col-span-6 lg:w-1/2 text-container">
                               <h4 class="text-white"><?php echo $title; ?></h4>
                                <div class="[&_p]:text-xl [&_p]:text-white [&_p]:leading-8 [&_p]:mb-4">
                                    <?php echo $text; ?>
                                </div>
                        </div>


                     

                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
</div>

</section>