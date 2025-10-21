<?php
if (is_page('our-team')): // page slug
    $field_object = get_field_object('elders', 'option');
    if (have_rows('elders', 'option')): ?>
        <div class="staff-list">
            <?php if (!empty($field_object['label'])): ?>
                 <h2 class="section-title text-center">
                    <?php echo esc_html($field_object['label']); ?>
                </h2>
            <?php endif; ?>
              <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:py-20">
                <?php while (have_rows('elders', 'option')):
                    the_row(); ?>
                    <div class="staff-list-block">
                        <div class="staff-content">

                            <?php 
                            $image = get_sub_field('photo');
                            if( !empty($image) ): ?>
                            <img class="mx-auto w-full" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>

                           

                           <?php if (!empty(get_sub_field('name'))): ?>
                                <h4 class="text-xl text-center pt-3 pb-0">
                                    <?php the_sub_field('name'); ?>
                                </h4>
                            <?php endif; ?>
                             <?php if (!empty(get_sub_field('job_title'))): ?>
                                <p class="text-center text-xl">
                                    <?php the_sub_field('job_title'); ?>
                                </p>
                            <?php endif; ?>

                         
                        </div>
                       
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
<?php endif;
endif; ?>


<?php
if (is_page('our-team')): // page slug
    $field_object = get_field_object('deacons', 'option');
    if (have_rows('deacons', 'option')): ?>
        <div class="staff-list">
            <?php if (!empty($field_object['label'])): ?>
                <h2 class="section-title text-center">
                    <?php echo esc_html($field_object['label']); ?>
                </h2>
            <?php endif; ?>
             <div class="grid grid-cols-2 lg:grid-cols-5 lg:py-20 gap-8">
                <?php while (have_rows('deacons', 'option')):
                    the_row(); ?>
                    <div class="staff-list-block">
                        <div class="staff-content">

                           <?php 
                            $image = get_sub_field('photo');
                            if( !empty($image) ): ?>
                            <img class="mx-auto w-full" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>


                             <?php if (!empty(get_sub_field('name'))): ?>
                                <h4 class="text-xl text-center pt-3 pb-0">
                                    <?php the_sub_field('name'); ?>
                                </h4>
                            <?php endif; ?>
                             <?php if (!empty(get_sub_field('job_title'))): ?>
                                <p class="text-center text-xl">
                                    <?php the_sub_field('job_title'); ?>
                                </p>
                            <?php endif; ?>

                         
                        </div>
                      
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
<?php endif;
endif; ?>