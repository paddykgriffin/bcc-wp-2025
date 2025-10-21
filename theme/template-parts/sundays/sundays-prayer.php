<?php
/**
 * Partial template About Prayer Section
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="py-10 md:py-30 bg-gray-100">

<div class="container">





       <div class="grid grid-cols-12 items-center gap-8 md:pt-20">


       <div class="col-span-6">
         <div class="[&_p]:pb-8 [&_p]:text-xl [&_p]:leading-8">
             <h2 class="section-title text-left after:left-0 after:-translate-x-0 mb-10"><?php the_field('prayer_title'); ?></h2>
 <?php the_field('prayer_content'); ?>
 </div>
   
       </div>
        <div class="col-span-6">

           <?php 

                $image = get_field('prayer_image');

                if( !empty($image) ): ?>



                <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="section-content-image" />

                <?php endif; ?>

          
             
       </div>
       </div>
</div>

</section>