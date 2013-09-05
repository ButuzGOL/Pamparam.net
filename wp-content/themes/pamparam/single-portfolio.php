<?php get_header(); ?>
			
			<div id="content" class="wrap clearfix">
			
                <div id="main" class="col980 clearfix" role="main">

                    <section id="posts"  class="portfolio">
                        <div class="top"></div>
                        <div class="middle">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <div class="left">
                                    <header>

                                        <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                            <?php $link = get_post_meta( $post->ID, '_bg_portfolio_link', true);
                                            if ($link):
                                                $is_itunes = (substr($link, 0, 6) == 'itunes') ? true : false;
                                                if ($is_itunes):
                                            ?>  
                                                    <a href="<?php echo substr($link, 7); ?>">Go to itunes →</a>
                                                <?php else: ?>
                                                    <a href="<?php echo $link; ?>">Go to project website →</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </h1>
                                        
                                        <p class="meta"><?php _e("Posted", "pamparamtheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></p>
                                        <?php $is_private = get_post_meta( $post->ID, '_bg_portfolio_is_private', true);
                                            
                                        <?php 
                                        if ($is_private != 'on' || current_user_can('administrator')) { 
                                        	pamparam_social_widget(); 
                                        }
                                       	?>
                                    </header> <!-- end article header -->

                                    <section class="post_content clearfix">
                                        <?php the_content(); ?>
                                    </section> <!-- end article section -->

                                    <footer>
                                        <?php $repo_link = get_post_meta( $post->ID, '_bg_portfolio_repo_link', true);
                                        if ($repo_link):
                                        ?>
                                            <p class="repo">
                                                Code: <a href="<?php echo $repo_link; ?>" target="_blank"><?php echo $repo_link; ?></a>
                                            </p>
                                        <?php endif; ?>
                                        <p class="technologies">                              
                                            <?php echo apply_filters( 'taxonomy-images-list-the-terms', '', array(
                                                'after'        => '</span>',
                                                'after_image'  => '',
                                                'before'       => '<span class="tags-title">Technologies:</span> ',
                                                'before_image' => '',
                                                'image_size'   => 'public',
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
                                    <div class="thumb <?php echo (@$is_itunes) ? 'ipad' : ''; ?>">
                                        <?php the_post_thumbnail('portfolio-thumb-420'); ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="attachments <?php echo (@$is_itunes) ? 'ipad' : ''; ?>">
                                            <?php
                                            
                                            $args = array(
                                                'post_type' => 'attachment',
                                                'post_mime_type' => 'image',
                                                'post_parent' => $post->ID,
                                                'exclude' => get_post_thumbnail_id()
                                            );
                                            $images = get_posts( $args );
                                            foreach($images as $image):
                                                echo wp_get_attachment_image($image->ID, 'portfolio-attachment-880');
                                            endforeach; ?>
                                        </div>
                                
                            </article> <!-- end article -->

                            <?php //comments_template(); ?>

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
