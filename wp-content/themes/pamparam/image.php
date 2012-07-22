<?php get_header(); ?>

			<div id="content" class="clearfix wrap">
			
                <?php // get_sidebar(); // sidebar 1 ?>
                
				<div id="main" class="col890 clearfix">

                    <section id="posts" class="portfolio">
                        <div class="top"></div>
                        <div class="middle">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

                                <header>
                                    <h1 class="h2"> <?php the_title(); ?></h2>
                                </header>

                                <section class="post_content clearfix">
                                    <p class="attachment image"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
                                    <?php if ( !empty($post->post_excerpt) ) echo '<p class="caption">'. the_excerpt() .'</p>'; // this is the "caption" ?>

                                    <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                                </section>
                            </article>

                            <?php endwhile; else: ?>

                            <div class="help">
                                <p>Sorry, no attachments matched your criteria.</p>
                            </div>

                            <?php endif; ?>
                        </div>
                        <div class="bottom"></div>
                    </section> <!-- end #posts -->
                 
  				</div> <!-- end #main -->
  				    
  			</div> <!-- end #content -->

<?php get_footer(); ?>