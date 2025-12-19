<?php
/**
 * Partial template About Team
 *
 * @package bcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="py-10 md:py-20 bg-secondary" id="about-team">

<div class="container md:px-20 lg:px-10">
 <div class="grid lg:grid-cols-12 gap-12 items-center pt-10">
            <div class="col-span-6">
                  <h2 class="section-title text-white after:bg-white after:left-0 after:-translate-x-0 "><?php the_field('team_title'); ?></h2>
  <div class="[&_p]:pb-8 [&_p]:text-white [&_p]:text-xl [&_p]:leading-8">
     <?php the_field('team_content'); ?>
  </div>



                 <div class="grid md:grid-cols-12 gap-6">

               
                    <?php 

                    $link = get_field('team_button');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="col-span-6">
                            <a class="btn bg-tertiary border-tertiary border-2 block default-transition hover:bg-primary  hover:border-secondary hover:text-white" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>
                    <?php endif; ?>



                 
                </div>


        </div>
        <div class="col-span-6">

            
                <?php 

                $image = get_field('team_image');

                if( !empty($image) ): ?>


                    <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="section-content-image" />

                <?php endif; ?>

        </div>
    </div>
</div>
</section>