<div class="grid grid-cols-12 gap-2 md:gap-8">
     <?php  if( have_rows('grid_boxes') ): ?>

        <?php 

        $counter = 1;
        while( have_rows('grid_boxes') ): the_row(); 

            // vars
            $image = get_sub_field('box_image');
            $content = get_sub_field('box_name');
            $link = get_sub_field('box_link');


        
            ?>

                <div class="col-span-6 lg:col-span-4"> 
        
                    <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>" class="grid group">
                    <?php endif; ?>

                        <div class='col-start-1 row-start-1 flex items-center z-10 justify-center'>
                            <div class="bg-black/50 text-white text-center py-4 w-[90%] md:w-2/3 border-white border-1 text-xl md:text-2xl group-hover:bg-black font-serif default-transition">
                                <?php echo $content; ?>
                            </div>

                        </div>

                        <img class="col-start-1 row-start-1" src="<?php echo $image['sizes']['tile-md']; ?>" alt="<?php echo $image['alt'] ?>" />

                    <?php if( $link ): ?>
                        </a>
                       
                    <?php endif; ?>

                </div>
                

                
         <?php $counter++; ?>

        <?php endwhile; ?>

    <?php endif; ?>

</div>