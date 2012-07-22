<?php get_header(); ?>
			<div id="content" class="wrap clearfix">
                
               <div id="main" class="clearfix col980" role="main">

                    <section id="posts" class="portfolio">
                        <div class="top"></div>
                        <div class="middle">
                            <?php
                                global $wp_query;
                                $term = $wp_query->get_queried_object();
                            ?>
                            <h1 class="archive_title h2">
                                <span><?php if ($term->taxonomy == 'portfolio_category') _e("Portfolio Categorized:", "pamparamtheme");
                                            else _e("Portfolio Technology:", "pamparamtheme"); ?></span> <?php echo $term->name; ?>
                            </h1>
                            <?php
                                $args=array(
                                  'post_type' => 'portfolio',
                                  'posts_per_page' => '-1',
                                  'taxonomy' => $term->taxonomy,
                                  'term' => $term->slug
                                );
                                $wp_query = null;
                                $wp_query = new WP_Query($args); 
                                if ($wp_query->have_posts()): while ( $wp_query->have_posts() ) : $wp_query->the_post();   
                            ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <div class="left">
                                    <header>

                                        <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                            <?php $link = get_post_meta( $post->ID, '_bg_portfolio_link', true);
                                            if ($link):
                                            ?>
                                                <a href="<?php echo $link; ?>">Go to project website →</a>
                                            <?php endif; ?>
                                        </h1>
                                        
                                        
                                        <p class="meta"><?php _e("Posted", "pamparamtheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></p>

                                    </header> <!-- end article header -->

                                    <section class="post_content clearfix">
                                        <?php the_content('<span class="read-more">Continue reading →</span>'); ?>
                                        
                                    </section> <!-- end article section -->

                                    <footer>
                                        <p class="technologies">                              
                                            <?php echo apply_filters( 'taxonomy-images-list-the-terms', '', array(
                                                'after'        => '</span>',
                                                'after_image'  => '',
                                                'before'       => '<span class="tags-title">Technologies:</span> ',
                                                'before_image' => '',
                                                'image_size'   => 'detail',
                                                'post_id'      => $post->ID,
                                                'taxonomy'     => 'portfolio_technology',
                                                ) );
                                            ?>
                                        </p>
                                        <p class="tags"><?php the_terms( $post->ID, 'portfolio_category', '<span class="tags-title">Categories:</span> ', ' ', ' ' ); ?></p>
                                        
                                        <?php $employer = get_post_meta( $post->ID, '_bg_portfolio_employer_link', true);
                                        if ($employer):
                                            $temp = explode('|', $employer);
                                            $name = @$temp[0];
                                            $employer_link = @$temp[1];
                                            $project_link = @$temp[2];
                                            if ($name):
                                        ?>
                                                <div class="employer">
                                                    Project made in 
                                                    <?php if ($employer_link): ?>
                                                        <a href="<?php echo $employer_link; ?>" target="_blank"><?php echo $name; ?></a>
                                                        <?php if ($project_link): ?>
                                                            <a href="<?php echo $project_link; ?>" target="_blank">See more</a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <span><?php echo $name; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </footer> <!-- end article footer -->
                                </div>
                                <div class="right">
                                    <div class="thumb">
                                        <?php the_post_thumbnail('portfolio-thumb-420'); ?>
                                    </div>
                                </div>
                                
                            </article> <!-- end article -->
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