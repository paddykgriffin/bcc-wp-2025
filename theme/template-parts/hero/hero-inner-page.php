<section class="hero grid hero-inner-page bg-primary h-[40vh] [&_img]:w-full overflow-hidden" >
    <div class="col-start-1 row-start-1 z-10 flex items-center">
        <div class="container text-center">
            <?php the_title( '<h1 class="entry-title lg:pt-15 mb-0 text-5xl text-white text-shadow-md">', '</h1>' ); ?>
        </div>
    </div>
    <div class="col-start-1 row-start-1">
    <?php echo bcc_post_thumbnail($post->ID, 'hero-image'); ?>
    </div>
</section>