<?php get_header(); ?>

			<div id="content" class="wrap clearfix">
                
                <?php get_sidebar('main'); ?>
			
				<div id="main" class="col700 right clearfix" role="main">

                    <section id="portfolio">
                        <div class="title">
                            Latest Projects <a class="more" href="<?php pamparam_get_page_link_by_slug ('portfolio'); ?>">see all</a>
                        </div>
                        <div class="content clearfix">
                            <?php 
                            $args = array( 'post_type' => 'portfolio');
                            $loop = new WP_Query( $args );
                            if ($loop->have_posts()) :
                            ?>
                                <ul id="slider">
                                <?php
                                    while ( $loop->have_posts() ) : $loop->the_post(); 
                                ?>
                                        <li>
                                            <a href="<?php the_permalink() ?>">
                                                <div class="alltogether">
                                                    <div class="thumb"><?php the_post_thumbnail( 'portfolio-thumb-420' ); ?></div>
                                                    <div class="title"><?php $title = the_title('', '', false); echo substr($title, 0, 25); if (strlen($title) > 25) echo "..."; ?></div>
                                                </div>
                                            </a>
                                        </li>
                                <?php endwhile; ?>
                                </ul>
                            <?php else: ?>
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
                    </section>
                    <div class="line"></div>
                    <section id="posts">
                        <div class="title">
                            Latest Posts <a class="more" href="<?php pamparam_get_page_link_by_slug ('blog'); ?>">see all</a>
                        </div>
                        <div class="top"></div>
                        <div class="middle">
                            <?php
                                 if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <header>

                                    <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                                    <p class="meta"><?php _e("Posted", "pamparamtheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "pamparamtheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "pamparamtheme"); ?> <?php the_category(', '); ?>.</p>
                                    <?php pamparam_social_widget(); ?>
                                </header> <!-- end article header -->

                                <section class="post_content clearfix">
                                    <?php the_content('<span class="read-more">Continue reading →</span>'); ?>

                                </section> <!-- end article section -->

                                <footer>

                                    <p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ' ', ''); ?></p>

                                </footer> <!-- end article footer -->

                            </article> <!-- end article -->

                            <?php endwhile; ?>	
                            <?php if (wp_count_posts()->publish > intval(get_query_var('posts_per_page'))): ?>
                                <a class="next" href="<?php pamparam_get_page_link_by_slug ('blog' , 2); ?>">see more</a>
                            <?php endif; ?>
                            
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