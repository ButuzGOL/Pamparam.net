<?php get_header(); ?>
			
			<div id="content" class="wrap clearfix">
			
                <?php get_sidebar('simple'); ?>
                
				<div id="main" class="col700 right clearfix" role="main">

                    <section id="posts">
                        <div class="top"></div>
                        <div class="middle">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <header>

                                    <h1 class="single-title"><?php the_title(); ?></h1>

                                    <p class="meta"><?php _e("Posted", "pamparamtheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "pamparamtheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "pamparamtheme"); ?> <?php the_category(', '); ?>.</p>
                                    <?php pamparam_social_widget(); ?>
                                </header> <!-- end article header -->

                                <section class="post_content clearfix">
                                    <?php the_content(); ?>
                                </section> <!-- end article section -->

                                <footer>

                                    <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ' ', '</p>'); ?>

                                </footer> <!-- end article footer -->

                            </article> <!-- end article -->

                            <script type="text/javascript">
                                var disqus_developer = 1; // this would set it to developer mode
                            </script>
                            <?php comments_template(); ?>

                            <?php endwhile; ?>			

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
                    
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>