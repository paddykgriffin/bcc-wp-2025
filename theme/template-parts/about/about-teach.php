<?php
/**
 * Partial template About Teach
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="py-10 md:py-30" id="about-teach">

<div class="container md:px-20 lg:px-10">
  <div class="text-center">
        <h2 class="section-title "><?php the_field('teach_title'); ?></h2>
    </div>

       <div class="grid lg:grid-cols-12 gap-12 items-center pt-10">

        <div class="col-span-6">

            
                <?php 

                $image = get_field('teach_image');

                if( !empty($image) ): ?>


                    <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="section-content-image" />

                <?php endif; ?>

        </div>

            <div class="col-span-6">
  <div class="[&_p]:pb-8 [&_p]:text-xl [&_p]:leading-8">
     <?php the_field('teach_content'); ?>
  </div>
     <div class="pt-5 pb-3">
                    <p class="font-semibold mb-0 text-xl"><?php the_field('who_buttons_title'); ?></p>
                </div>


                 <div class="grid md:grid-cols-12 gap-6">

               
                    <?php 

                    $link = get_field('teach_button_one');

                    if( $link ): 
                        $link_url = $link['url'];
                        //$link_title = $link['title'];
                      //  $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="col-span-6">
                            <a class="btn bg-primary border-primary border-2 block default-transition hover:bg-secondary  hover:border-secondary hover:text-primary" href="<?php echo esc_url($link_url); ?>" target="_blank">Our Beliefs</a>
                        </div>
                    <?php endif; ?>



                    <?php 

                    $link = get_field('teach_button_two');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="col-span-6">
                            <a class="btn border-secondary border-2 block default-transition hover:bg-secondary text-secondary hover:text-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>
                        <?php endif; ?>
                </div>


        </div>
       
    </div>
</div>
</section>