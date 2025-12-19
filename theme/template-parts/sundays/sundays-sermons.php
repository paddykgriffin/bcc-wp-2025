<?php
/**
 * Partial template About Sermons Section
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="py-10 md:py-30">
<div class="container md:px-20 lg:px-10">
    <div class="text-center">
         <h2 class="section-title"> <?php the_field('sermons_title'); ?></h2>
    </div>

   <div class="text-center py-10">
         <div class="mb-6 [&_p]:leading-8 [&_p]:text-xl">
             <?php the_field('sermons_content'); ?>
         </div>

            <?php 

                $link = get_field('sermons_link');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

             
                        <a class="btn bg-secondary inline-flex items-center hover:bg-primary default-transition " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                           
                            <span class="mr-3"> <?php echo esc_html($link_title); ?></span>    
                            <span class="material-symbols-outlined text-2xl">
chevron_forward
</span>
                        </a>
               

                <?php endif; ?>
    </div>

   <div class="text-center py-10 hidden">
           <p class="text-xl leading-8"><?php the_field('podcast_content'); ?></p>
    </div>

    <div class="grid grid-cols-12 gap-2 md:gap-6">
            <?php  if( have_rows('podcasts') ): ?>

                        <?php 


                        while( have_rows('podcasts') ): the_row(); 

                            // vars
                        
                            $link = get_sub_field('podcast_url');
                            $title = get_sub_field('podcast_title');
                            $image = get_sub_field('podcast_image');
                            ?>

                                <div class="col-span-6 lg:col-span-4"> 
                        
                                    <?php if( $link ): ?>
                                        <a href="<?php echo $link; ?>" class="block bg-gray-100 default-transition hover:bg-gray-200 px-3 py-10 shadown-2xl text-center" target="_blank">
                                    <?php endif; ?>

                                        <div class="inner">
                                            <h5 class="text-xl md:text-2xl"><?php echo $title; ?></h5>
                                            <img class="size-12 mx-auto" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                        </div>

                                    <?php if( $link ): ?>
                                        </a>
                                    
                                    <?php endif; ?>

                                </div> 

                        <?php endwhile; ?>

                    <?php endif; ?>
    </div>

</div>

</section>