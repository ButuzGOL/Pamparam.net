<?php get_header(); ?>
			
			<div id="content" class="clearfix wrap">
			
                <?php get_sidebar('simple'); ?>
                
                <div id="main" class="col700 right clearfix" role="main">
				
                    <section id="posts">
                        <div class="top"></div>
                        <div class="middle">
                            <?php if (is_category()) { ?>
                                <h1 class="archive_title h2">
                                    <span><?php _e("Posts Categorized:", "pamparamtheme"); ?></span> <?php single_cat_title(); ?>
                                </h1>
                            <?php } elseif (is_tag()) { ?> 
                                <h1 class="archive_title h2">
                                    <span><?php _e("Posts Tagged:", "pamparamtheme"); ?></span> <?php single_tag_title(); ?>
                                </h1>
                            <?php } elseif (is_author()) { ?>
                                <h1 class="archive_title h2">
                                    <span><?php _e("Posts By:", "pamparamtheme"); ?></span> <?php get_the_author_meta('display_name'); ?>
                                </h1>
                            <?php } elseif (is_day()) { ?>
                                <h1 class="archive_title h2">
                                    <span><?php _e("Daily Archives:", "pamparamtheme"); ?></span> <?php the_time('l, F j, Y'); ?>
                                </h1>
                            <?php } elseif (is_month()) { ?>
                                <h1 class="archive_title h2">
                                    <span><?php _e("Monthly Archives:", "pamparamtheme"); ?></span> <?php the_time('F Y'); ?>
                                </h1>
                            <?php } elseif (is_year()) { ?>
                                <h1 class="archive_title h2">
                                    <span><?php _e("Yearly Archives:", "pamparamtheme"); ?></span> <?php the_time('Y'); ?>
                                </h1>
                            <?php } ?>

                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <header>

                                    <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                                    <p class="meta"><?php _e("Posted", "pamparamtheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "pamparamtheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "pamparamtheme"); ?> <?php the_category(', '); ?>.</p>

                                </header> <!-- end article header -->

                                <section class="post_content excerpt">

                                    <?php the_post_thumbnail( 'post-thumb-880' ); ?>

                                    <?php the_excerpt(); ?>

                                </section> <!-- end article section -->

                                <footer>

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
                                    <h1><?php _e("No Posts Yet", "pamparamtheme"); ?></h1>
                                </header>
                                <section class="post_content">
                                    <p><?php _e("Sorry, What you were looking for is not here.", "pamparamtheme"); ?></p>
                                </section>
                                <footer>
                                </footer>
                            </article>

                            <?php endif; ?>
                        </div>
                        <div class="bottom"></div>
                    </section> <!-- end #posts -->
                    
				</div> <!-- end #main -->
                    
			</div> <!-- end #content -->

<?php get_footer(); ?>