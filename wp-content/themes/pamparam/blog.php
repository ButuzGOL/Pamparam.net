<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

			<div id="content" class="wrap clearfix">
                
                <?php get_sidebar('simple'); ?>
			
				<div id="main" class="col700 right clearfix" role="main">

                    <section id="posts">
                        <div class="top"></div>
                        <div class="middle">
                            <?php
                                global $more;
                                $more = false;
                            
                                $args=array(
                                  'post_type' => 'post',
                                  'paged' => $paged,
                                );
                                $wp_query = null;
                                $wp_query = new WP_Query($args); 
                                if ($wp_query->have_posts()): while ( $wp_query->have_posts() ) : $wp_query->the_post();   
                            ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <header>

                                    <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                                    <p class="meta"><?php _e("Posted", "pamparamtheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "pamparamtheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "pamparamtheme"); ?> <?php the_category(', '); ?>.</p>

                                </header> <!-- end article header -->

                                <section class="post_content clearfix">
                                    <?php the_content('<span class="read-more">Continue reading →</span>'); ?>

                                </section> <!-- end article section -->

                                <footer>

                                    <p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ' ', ''); ?></p>

                                </footer> <!-- end article footer -->

                            </article> <!-- end article -->
                            <?php endwhile; ?>	

                            <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>

                                <?php page_navi(); // use the page navi function ?>

                            <?php } else { // if it is disabled, display regular wp prev & next links ?>
                                <nav class="wp-prev-next">
                                    <ul class="clearfix">
                                        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "pamparamtheme")) ?></li>
                                        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "pamparamtheme")) ?></li>
                                    </ul>
                                </nav>
                            <?php } ?>		

                            <?php else : ?>

                            <article id="post-not-found">
                                <header>
                                    <h1>Not Found</h1>
                                </header>
                                <section class="post_content">
                                    <p>Sorry, but the requested resource was not found on this site.</p>
                                </section>
                                <footer>
                                </footer>
                            </article>

                            <?php endif; ?>
                        </div>
                        <div class="bottom"></div>
                    </section> <!-- end #posts -->
			<?php get_pagenum_link(2); ?>
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>