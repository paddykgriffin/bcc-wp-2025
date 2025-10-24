 <article id="post-item-<?php the_ID(); ?>" class="post-wrapper">
     <div class="entry-thumbnail">
         <?php bcc_post_thumbnail(); ?>
     </div>
     <div class="entry-content px-4 py-8 lg:py-8 ">
         <header class="entry-header md:max-w-none">
             <div class="entry-meta pb-4 ">
                 <?php /* bcc_entry_meta(); */ ?>
                 <?php /*bcc_categories(); */ ?>
                 <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<span class="cat-links flex">';
                        $limited_categories = array_slice($categories, 0, 2);
                        foreach ($limited_categories as $category) {
                            echo '<a class="category-link default-transition pr-2" href="' . esc_url(get_category_link($category->term_id)) . '" rel="category tag"><span class="material-symbols-outlined text-[10px] text-(--no1-red) mr-2">inbox_text</span>' . esc_html($category->name) . '</a> ';
                        }
                        echo '</span>';
                    }
                    ?>
                 <?php bcc_tags(); ?>
                 <?php bcc_posted_by(); ?>
             </div>
             <!-- .entry-meta -->

             <?php
                if (is_sticky() && is_home() && !is_paged()) {
                    printf('<span">%s</span>', esc_html_x('Featured', 'post', 'bcc'));
                }
                if (is_singular()):
                    the_title(sprintf('<h2 class="post-title default-transition"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                else:
                    the_title(sprintf('<h2 class="post-title default-transition"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                endif;
                ?>


         </header>
         <!-- .entry-header -->

         <div <?php bcc_content_class('entry-post-content pb-4'); ?>>
             <?php echo get_the_excerpt();
                wp_link_pages(
                    array(
                        'before' => '<div>' . __('Pages:', 'bcc'),
                        'after' => '</div>',
                    )
                ); ?>
         </div>
         <!-- .entry-content -->
         <footer class="entry-footer">
             <div class="entry-meta">
                 <?php bcc_entry_footer(); ?>
             </div>
         </footer>
         <!-- .entry-footer -->
     </div>
 </article>