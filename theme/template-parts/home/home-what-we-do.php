<?php

/**
 * Template part for displaying what we do section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCC
 */
?>

<section class="bg-secondary py-10 lg:py-20" id="what-we-do">

    <div class="container !max-w-[96rem]">
        <h2 class="section-title text-center text-white after:bg-white">What we do</h2>

        <?php if (have_rows('grid_boxes', 'option')): ?>


            <div class='grid md:grid-cols-12 gap-8 py-10 md:py-20'>


                <?php while (have_rows('grid_boxes', 'option')): the_row();

                    // vars
                    $image = get_sub_field('box_image', 'option');
                    $content = get_sub_field('box_name', 'option');
                    $link = get_sub_field('box_link', 'option');

                ?>

                    <div class="col-span-3">

                        <?php if ($link): ?>
                             <a href="<?php echo $link; ?>" class="grid group">
                            <?php endif; ?>

                            <div class='col-start-1 row-start-1 flex items-center z-10 justify-center'>
                            <div class="bg-black/50 text-white text-center py-4 w-2/3 border-white border-1 text-2xl group-hover:bg-black font-serif default-transition">
                                <?php echo $content; ?>
                            </div>

                        </div>


                            <img class="col-start-1 row-start-1" src="<?php echo $image['sizes']['tile-md']; ?>" alt="<?php echo $image['alt'] ?>" />

                            <?php if ($link): ?>
                            </a>
                            <!-- box end -->

                        <?php endif; ?>

                    </div>
                    <!--col end -->

                <?php endwhile; ?>



            </div>
            <!--grid end -->


        <?php endif; ?>



           <div class="row justify-content-center mt-2 mt-md-5">
            <div class="col text-center">

                <?php 

                $link = get_field('grid_boxes_button','option');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn bg-tertiary hover:bg-primary default-transition" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

            </div>
            <!--col end -->
        </div>
        <!--row end -->
 



    </div>
</section>