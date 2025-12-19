<?php
/**
 * Partial template About What Section
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="py-10 md:py-30">

<div class="container md:px-20 lg:px-10">
       <div class="text-center">
        <h2 class="section-title"><?php the_field('sundays_title'); ?></h2>
       </div>


       <div class="grid lg:grid-cols-12 items-center gap-8 md:pt-20">


       <div class="col-span-6">
         <div class="[&_p]:pb-8 [&_p]:text-xl [&_p]:leading-8">
 <?php the_field('sundays_content'); ?>
 </div>
    <?php 

                $link = get_field('sundays_content_button');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_blank';
                    ?>
                    <div class="col-12 col-md-8">
                        <a class="btn btn-lg btn-secondary d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                <?php endif; ?>
       </div>
        <div class="col-span-6">

           <?php 

                $image = get_field('sundays_image');

                if( !empty($image) ): ?>



                <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="section-content-image" />

                <?php endif; ?>

          
             
       </div>
       </div>
                   
</div>

</section>