<section class="hero relative grid hero-inner-page bg-primary h-[30vh] xl:h-[35vh] 2xl:h-[40vh]  overflow-hidden" >
    <div class="col-start-1 row-start-1 z-10 flex items-center">
        <div class="container text-center">
            <?php the_title( '<h1 class="entry-title pt-15 mb-0 text-5xl text-white text-shadow-md">', '</h1>' ); ?>
        </div>
    </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 lg:relative max-w-none lg:max-w-full lg:col-start-1 lg:row-start-1 lg:w-full [&_img]:max-w-none  [&_img]:lg:max-w-full  [&_img]:lg:w-full">
    <?php echo bcc_post_thumbnail($post->ID, 'hero-image'); ?>
    </div>
</section>