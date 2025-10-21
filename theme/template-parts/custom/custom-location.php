<div class="py-30" id="visit">

    <div class="text-center">
        <h2 class="section-title">Our Location</h2>
    </div>

    <div class="grid grid-cols-12 mt-30 gap-8">
        <div class="col-span-6">
            <h3 class="text-3xl"><?php the_field('address_title'); ?></h3>
           <?php the_field('address_details'); ?>
            <h3 class="pt-10 text-3xl"><?php the_field('directions_title'); ?></h3>
            <?php if( have_rows('directions') ): ?>
                <div class="bcc-location-directions-accordion" id="directionsAccordion">
                    <?php while( have_rows('directions') ): the_row(); 
                        // vars
                        $contentID = get_sub_field('content_id');
                        $contentTitle = get_sub_field('directions_title');
                        $contentDetail = get_sub_field('directions_details');
                        $dataTarget = get_sub_field('data_target');
                        ?>
                        <div class="bg-gray-200 mb-4">
                            <!-- <div class="bcc-location-directions-item-header" id="<?php echo $contentID; ?>">
                               
                            </div> -->
                             <button class="btn px-4 flex justify-between items-center w-full text-left text-gray-500" type="button" data-toggle="collapse" data-target="#<?php echo $dataTarget; ?>" aria-expanded="false" aria-controls="<?php echo $contentTitle; ?>">
                                    <?php echo $contentTitle; ?>
                                    <span class="material-symbols-outlined !text-[36px]">keyboard_arrow_down</span>
                                </button>
                            <div id="<?php echo $dataTarget; ?>" class="location-content p-4 hidden" aria-labelledby="<?php echo $contentID; ?>" data-parent="#directionsAccordion">
                                <p class="">
                                    <?php echo $contentDetail; ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-span-6">
            <?php if( get_field('map') ): ?>
                <div class="relative">
                    <?php
                    // Use an ACF image field
                    // Set the 'return value' option to "array" (this is the default)
                    // This example uses three image sizes, called medium, medium_large, thumbnail
                    $imageobject = get_field('map');
                    if( !empty($imageobject) ):
                        echo '<picture>
                        <source srcset="' . $imageobject['sizes']['tile-md'] .'" media="(min-width: 320px) and (max-width:399px)">
                        <source srcset="' . $imageobject['sizes']['tile-lg'] .'" media="(min-width: 400px)">
                        <img src="' . $imageobject['sizes']['tile-lg'] .'"> </picture>';
                    endif;
                    ?>
                    <a href="<?php the_field('map_link', 'option'); ?>" class="absolute btn bg-secondary text-white right-0 bottom-0" target="_blank">View on Google Maps</a>
                    </div>
            <?php endif; ?>
        </div>
    </div>

</div>